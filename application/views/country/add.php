<h1>Country</h1>
<form id = "country_add_form" method="post">
    <input type="text" placeholder="Country name"  name="country">
    <input type="button" value="add" onclick = "countrySubmit()">
</form>
<!-- Sao biến contry lại đc truyền vào trong controller 
do form submit redirect vào chính nó nên nó gọi country/add, lại tạo ra tiếp 1 Countroller
  => và trong CountryController lúc này gọi đc biến _POST -->
<h3>List country :</h3>
<?php 
    $count = 0;
    foreach ($country as $countryitem){
        $count++;
        echo "<div>".$count." ".$countryitem['Country']['name']."</div>";
    }
?>
<script>
    function countrySubmit(){
        document.getElementById("country_add_form").submit();
    }
</script>
	
