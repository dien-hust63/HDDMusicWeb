<form id = "add_song_form"  method="POST" enctype="multipart/form-data">
    <label for="song_name">Name: </label>
    <input type="text" id="song_name" name="song_name"><br>
    <label for="song_file">Song file: </label>
    <input type="file" name="song_file" id="song_file"><br>
    <label for="song_image">Image: </label>
    <input type="file" name="song_image" id="song_image"><br>
    <label for="song_genre">Thể loại: </label>
    <select name="song_genre" id="song_genre">
        <?php foreach($genre as $elements): ?>
            <option value= <?php echo $elements['Genre']['id']?> ><?=$elements['Genre']['name'] ?> </option>
        <?php endforeach ?>
    </select>
    <br>
    <label for="song_country">Quốc gia: </label>
    <select name="song_country" id="song_country">
        <?php foreach($country as $elements): ?>
            <option value= <?php echo $elements['Country']['id']?> ><?=$elements['Country']['name'] ?> </option>
        <?php endforeach ?>
    </select>
    <br>
    <label for="song_artist">Ca sĩ:  </label>
    <select name="song_artist" id="song_artist">
        <?php foreach($artist as $elements): ?>
            <option value= <?php echo $elements['Artist']['id']?> ><?=$elements['Artist']['name'] ?> </option>
        <?php endforeach ?>
    </select>
    <br>
    <input type="button" value="add" onclick = "addSong()">
</form>

<script>
    function addSong(){
        document.getElementById("add_song_form").submit();
    }
</script>