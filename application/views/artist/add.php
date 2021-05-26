<form id = "add_artist_form"  method="POST" enctype="multipart/form-data">
    <label for="artist_name">Tên ca sĩ: </label>
    <input type="text" id="artist_name" name="artist_name"><br>
    <label for="artist_age">Tuổi: </label>
    <input type="text" id="artist_age" name="artist_age"><br>
    <label for="artist_hometown">Quê quán: </label>
    <input type="text" id="artist_hometown" name="artist_hometown"><br>
    <label for="artist_country">Quốc gia: </label>
    <select name="artist_country" id="artist_country">
        <?php foreach($country as $elements): ?>
            <option value= <?php echo $elements['Country']['id']?> ><?=$elements['Country']['name'] ?> </option>
        <?php endforeach ?>
    </select>
    <br>
    <label for="artist_image">Ảnh đại diện: </label>
    <input type="file" name="artist_image" id="artist_image"><br>
    <br>
    <input type="button" value="add" onclick = "addArtist()">
</form>

<script>
    function addArtist(){
        document.getElementById("add_artist_form").submit();
    }
</script>