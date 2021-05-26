<form id = 'add_playlist_form' method='post'>
    <label for="playlist_name">Playlist name:</label>
    <input type="text" name='playlist_name'>
    <input type="button" value="add" onclick = "addPlaylist()">
</form>


<script>
    function addPlaylist(){
        document.getElementById("add_playlist_form").submit();
    }
</script>