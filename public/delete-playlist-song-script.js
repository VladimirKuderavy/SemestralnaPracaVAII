$(function (){
    $(".delete-playlist-song-button").click(function (e){
        var playlist_id = $(this).attr("playlist-id");
        var song_id = $(this).attr("song-id");
        $.post( "?c=Playlists&a=deletePlaylistSong", { playlist_id: playlist_id, song_id: song_id },
            function( data ) {
                var el = $(".clickable-row[song-id='"+song_id+"']");
                if(el.length > 0) {
                    el.remove();
                }
                if (data['message'] != "") {
                    $("#message-container").append("<div class=\"alert alert-" + data['message_type']+ "\">" + data['message'] + "</div>");
                }

            }, "json");
        return false;
    })
})