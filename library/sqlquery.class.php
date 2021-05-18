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

	function showHasMany() {
		$this->_hM = 1;
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

    /** Describes a Table **/
	function selectAll() {
        $query = 'select * from `' . $this->_table . '`';
        return $this->query($query);
    }

	function select($id) {
        $query = 'select * from `' . $this->_table . '` where `id` = \'' . mysqli_real_escape_string($this->_dbHandle, $id) . '\'';
        return $this->query($query, 1);
    }

	/** Custom SQL Query * */
    function query($query, $singleResult = 0) { // return array
        //query = select *  from 'items'
		$this->_result = mysqli_query($this->_dbHandle, $query);
			
        if (preg_match("/select/i", $query)) {
            $result = array();
            $table = array();
            $field = array();
            $tempResults = array();
            $numOfFields = 0;

            while ($fieldinfo = mysqli_fetch_field($this->_result)) { // fetch từng field/column nhận đc
				
                array_push($table, $fieldinfo->table);
                array_push($field, $fieldinfo->name);
                $numOfFields++;
            }
            while ($row = mysqli_fetch_row($this->_result)) {
                for ($i = 0; $i < $numOfFields; ++$i) { 
                    $table[$i] = trim(ucfirst($table[$i]), "s"); // return Item
                    $tempResults[$table[$i]][$field[$i]] = $row[$i]; // example : tempResults['Item']['id'] = 1;
                }
                if ($singleResult == 1) { // chi muon lay gia tri dau tien tra ve
                    mysqli_free_result($this->_result);
                    return $tempResults;
                }
                array_push($result, $tempResults); // lay het
            }
            mysqli_free_result($this->_result);
            return($result);
        }
    }



	protected function _describe() {
		global $cache;

		$this->_describe = $cache->get('describe'.$this->_table);

		if (!$this->_describe) {
			$this->_describe = array();
			$query = 'DESCRIBE '.$this->_table;
			$this->_result = mysql_query($query, $this->_dbHandle);
			while ($row = mysql_fetch_row($this->_result)) {
				 array_push($this->_describe,$row[0]);
			}

			mysql_free_result($this->_result);
			$cache->set('describe'.$this->_table,$this->_describe);
		}

		foreach ($this->_describe as $field) {
			$this->$field = null;
		}
	}

    /** Delete an Object **/

	function delete() {
		if ($this->id) {
			$query = 'DELETE FROM '.$this->_table.' WHERE `id`=\''.mysql_real_escape_string($this->id).'\'';		
			$this->_result = mysql_query($query, $this->_dbHandle);
			$this->clear();
			if ($this->_result == 0) {
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