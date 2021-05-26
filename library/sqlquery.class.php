<?php

class SQLQuery {
    protected $_dbHandle;
    protected $_result;
	protected $_query;
	protected $_table;

	protected $_describe = array();

	protected $_orderBy;
	protected $_order;
	protected $_extraConditions;
	protected $_hO;
	protected $_hM;
	protected $_hMABTM;
	protected $_page;
	protected $_limit;

    /** Connects to database **/
	
    function connect($address, $account, $pwd, $name) {
      	$this->_dbHandle =  mysqli_connect($address, $account, $pwd);
		
        if ($this->_dbHandle) {
            if (mysqli_select_db($this->_dbHandle, $name)) {
                return 1;
            }
            else {
                return 0;
            }
        }
        else {
            return 0;
        }
    }
 
    /** Disconnects from database **/

    function disconnect() {
        if (@mysql_close($this->_dbHandle) != 0) {
            return 1;
        }  else {
            return 0;
        }
    }

    /** Select Query **/

	function where($field, $value) {
		$this->_extraConditions .= '`'.$this->_model.'`.`'.$field.'` = \''.mysql_real_escape_string($value).'\' AND ';
	}

	function like($field, $value) {
		$this->_extraConditions .= '`'.$this->_model.'`.`'.$field.'` LIKE \'%'.mysql_real_escape_string($value).'%\' AND ';
	}

	function showHasOne() {
		$this->_hO = 1;
	}

	function showHMABTM() {
		$this->_hMABTM = 1;
	}

	function setLimit($limit) {
		$this->_limit = $limit;
	}

	function setPage($page) {
		$this->_page = $page;
	}

	function orderBy($orderBy, $order = 'ASC') {
		$this->_orderBy = $orderBy;
		$this->_order = $order;
	}
	//Custom SQL query
	function query($id = NULL, $addCondition = NULL){
		$from = '`'.$this->_table.'` as `'.$this->_model.'` ';
		$conditions = '\'1\'=\'1\'';
		if ($this->_hO == 1 && isset($this->hasOne)) {
			
			foreach ($this->hasOne as $alias => $model) { //alisa = Country, model = Country
				$table = strtolower($model);
				$singularAlias = strtolower($alias);
				$from .= 'LEFT JOIN `'.$table.'` as `'.$alias.'` ';
				$from .= 'ON `'.$this->_model.'`.`'.$singularAlias.'` = `'.$alias.'`.`id`  ';
			}
		}
		if ($id) {
			$conditions .= ' AND '.'`'.$this->_model.'`.`id` = \''.$id.'\'';
		}
		if($addCondition){
			$condition .= ' AND '.$addCondition;
		}
		$this->_query = 'SELECT * FROM '.$from.' WHERE '.$conditions;
		$this->_result = mysqli_query($this->_dbHandle, $this->_query);
		$result = array();
		$table = array();
		$field = array();
		$numOfFields=mysqli_num_fields($this -> _result);
		while ($fieldinfo = mysqli_fetch_field($this->_result)) { 	
			array_push($table, $fieldinfo->table);
			array_push($field, $fieldinfo->name);
		}	
		if (mysqli_num_rows($this->_result) > 0 ) {
			while ($row = mysqli_fetch_row($this->_result)) {
				for ($i = 0; $i < $numOfFields; ++$i) { 
					$tempResults[$table[$i]][$field[$i]] = $row[$i]; // example : tempResults['Item']['id'] = 1;
				}
				if ($this->_hMABTM == 1 && isset($this->hasManyAndBelongsToMany)) {
					foreach ($this->hasManyAndBelongsToMany as $aliasChild => $tableChild) { // aliasChild = Song, tableChild = Song
						$queryChild = '';
						$conditionsChild = '';
						$fromChild = '';
						$tableChild = strtolower($tableChild); //song
						$pluralAliasChild = strtolower($aliasChild);//song
						$singularAliasChild = strtolower($aliasChild); //song
						$sortTables = array($pluralAliasChild,$this->_table); //array("song" => "artist")
						sort($sortTables); //ne thuc su -> artist => song
						$joinTable = implode('_',$sortTables);
						$fromChild .= '`'.$tableChild.'` as `'.$aliasChild.'`,';
						$fromChild .= '`'.$joinTable.'`,';
						$conditionsChild .= '`'.$joinTable.'`.`'.$singularAliasChild.'` = `'.$aliasChild.'`.`id` AND ';
						$conditionsChild .= '`'.$joinTable.'`.`'.strtolower($this->_model).'` = \''.$tempResults[$this->_model]['id'].'\'';
						$fromChild = substr($fromChild,0,-1);
						$queryChild =  'SELECT * FROM '.$fromChild.' WHERE '.$conditionsChild;
						$resultChild = mysqli_query($this->_dbHandle, $queryChild);
	
						$tableChild = array();
						$fieldChild = array();
						$tempResultsChild = array();
						$resultsChild = array();
						if(mysqli_num_rows($resultChild) > 0){
							while ($fieldinfo = mysqli_fetch_field($resultChild)) { 	
								array_push($tableChild, $fieldinfo->table); // Song, artist_song
								array_push($fieldChild, $fieldinfo->name); 
							}
							$numOfFields = mysqli_num_fields($resultChild);
							while ($rowChild = mysqli_fetch_row($resultChild)) {//rowChild là 1 mảng chứa các value
								for ($i = 0; $i < $numOfFields; ++$i) { 
									$tempResultsChild[$tableChild[$i]][$fieldChild[$i]] = $rowChild[$i];  // [song][field] = value
									//tempResultChild là mảng 2 chiều: ("table" => array("field" => value))
								}
								array_push($resultsChild,$tempResultsChild); 	
							}
						
						}
						$tempResults[$aliasChild] = $resultsChild; // mảng 3 chiều // "Song" => resultsChild
						mysqli_free_result($resultChild);
					}
				}
				array_push($result, $tempResults);//trong result có các key là Song và Artist
			}
				
			if (mysqli_num_rows($this->_result) == 1 && $id != null) { 
				mysqli_free_result($this->_result);
				$this->clear();
				return $result[0];
			}
		}	
		mysqli_free_result($this->_result);
		$this->clear();
		return($result);

	}

	function customQuery($query){
		$result = mysqli_query($this->_dbHandle, $query);
		if ($result) {
			return $result;
		}
		else {
			return 0;
		}
	}
    /** Delete an Object **/

	function delete($id=null) {
		if ($id) {
			$query = 'DELETE FROM '.$this->_table.' WHERE `id`=\''. $id .'\'';		
			$this->_result = mysqli_query($this->_dbHandle, $query);
			$this->clear();
			if ($this->_result) {
				return $this->query();
			}
			else if ($this->_result == 0) {
			    /** Error Generation **/
				return -1;
		   }
		} else {
			/** Error Generation **/
			return -1;
		}
		
	}

    /** Saves an Object i.e. Updates/Inserts Query **/

	function save() {
		$query = '';
		if (isset($this->id)) {
			$updates = '';
			foreach ($this->_describe as $field) {
				if ($this->$field) {
					$updates .= '`'.$field.'` = \''.mysql_real_escape_string($this->$field).'\',';
				}
			}

			$updates = substr($updates,0,-1);

			$query = 'UPDATE '.$this->_table.' SET '.$updates.' WHERE `id`=\''.mysql_real_escape_string($this->id).'\'';			
		} else {
			$fields = '';
			$values = '';
			foreach ($this->_describe as $field) {
				if ($this->$field) {
					$fields .= '`'.$field.'`,';
					$values .= '\''.mysql_real_escape_string($this->$field).'\',';
				}
			}
			$values = substr($values,0,-1);
			$fields = substr($fields,0,-1);

			$query = 'INSERT INTO '.$this->_table.' ('.$fields.') VALUES ('.$values.')';
		}
		$this->_result = mysql_query($query, $this->_dbHandle);
		$this->clear();
		if ($this->_result == 0) {
            /** Error Generation **/
			return -1;
        }
	}
 
	/** Clear All Variables **/

	function clear() {
		foreach($this->_describe as $field) {
			$this->$field = null;
		}

		$this->_orderby = null;
		$this->_extraConditions = null;
		$this->_hO = null;
		$this->_hM = null;
		$this->_hMABTM = null;
		$this->_page = null;
		$this->_order = null;
	}

	/** Pagination Count **/

	function totalPages() {
		if ($this->_query && $this->_limit) {
			$pattern = '/SELECT (.*?) FROM (.*)LIMIT(.*)/i';
			$replacement = 'SELECT COUNT(*) FROM $2';
			$countQuery = preg_replace($pattern, $replacement, $this->_query);
			$this->_result = mysql_query($countQuery, $this->_dbHandle);
			$count = mysql_fetch_row($this->_result);
			$totalPages = ceil($count[0]/$this->_limit);
			return $totalPages;
		} else {
			/* Error Generation Code Here */
			return -1;
		}
	}

    /** Get error string **/

    function getError() {
        return mysql_error($this->_dbHandle);
    }
}