<h1>Country</h1>
<form id = "country_add_form" method="post">
    <input type="text" placeholder="Country name"  name="country">
    <input type="button" value="add" onclick = "addCountry()">
</form>
<!-- Sao biến contry lại đc truyền vào trong controller 
do form submit redirect vào chính nó nên nó gọi country/add, lại tạo ra tiếp 1 Countroller
  => và trong CountryController lúc này gọi đc biến _POST -->
<h3>List country :</h3>
<?php $count = 0; ?>
<?php foreach ($country as $countryitem): ?>
    <?php $count++ ; ?>
    <div id ="country_<?= $countryitem['Country']['id']; ?>">
        <label for="country_name"><?php echo $count." ".$countryitem['Country']['name'] ?></label>
        <input type="button" value="Edit" onclick="editCountry()">
        <input type="button" value="Delete" onclick="deleteCountry(<?php $countryitem['Country']['id']; ?>)">
        
    </div>
<?php endforeach; ?>

<?php require_once(HOME_PAGE)?>
<script>
    function addCountry(){
        document.getElementById("country_add_form").submit();
    }

    //loi
//     function deleteCountry(id){
//         var result = confirm("Want to delete?");
//         if (result) {
//             var element_id = "country_"+ id;
           
//             var xmlhttp = new XMLHttpRequest();
//             xmlhttp.onreadystatechange = function() {
//             if (this.readyState == 4 && this.status == 200) {
//                 document.getElementById("txtHint").innerHTML = this.responseText;
//             }
//             };
//             xmlhttp.open("GET", "gethint.php?q=" + str, true);
//             xmlhttp.send();
//   }
</script>
	
