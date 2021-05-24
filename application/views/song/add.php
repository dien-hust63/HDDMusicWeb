<form id = "add_song_form" action="" method="POST" enctype="multipart/form-data">
    <label for="song_name">Name: </label>
    <input type="text" id="song_name" name="song_name"><br>
    <label for="song_file">Song file: </label>
    <input type="file" name="song_file" id="song_file"><br>
    <input type="button" value="add" onclick = "addSong()">
</form>

<script>
    function addSong(){
        document.getElementById("add_song_form").submit();
    }
</script>