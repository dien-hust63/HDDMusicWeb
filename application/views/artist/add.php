<form id = "add_artist_form" method="POST" enctype="multipart/form-data">
    <span>
    <label for="artist_name">Tên ca sĩ: </label>
    <input class="input" type="text" id="artist_name" name="artist_name"><br>
    </span>
    <span>
    <label for="artist_age">Tuổi: </label>
    <input type="text" class="input" id="artist_age" name="artist_age"><br>
    </span>
    <span>
    <label for="artist_hometown">Quê quán: </label>
    <input type="text" class="input" id="artist_hometown" name="artist_hometown"><br>
    </span>
    <span>
    <label for="artist_country">Quốc gia: </label>
    <select class="input" name="artist_country" class="input" id="artist_country">
        <?php foreach($country as $elements): ?>
            <option value= <?php echo $elements['Country']['id']?> ><?=$elements['Country']['name'] ?> </option>
        <?php endforeach ?>
    </select>
    </span>
    <br>
    <span>
    <label for="artist_image">Ảnh đại diện: </label>
    <input type="file" name="artist_image" id="artist_image"><br>
    </span>
    <br>
    <input class="add-btn-form" type="button" value="add" onclick = "addArtist()">
</form>

<script>
    function addArtist(){
        document.getElementById("add_artist_form").submit();
    }
</script>