$(function (){
    $(".like-button").click(function (e){
        var type = $(this).attr("data-type") === "song" ? "Song" : "Album";
        var id = $(this).attr("data-id");
        $.post( "?c="+type+"s&a=voteFor"+type, { id: id },
            function( data ) {
                var el = $("."+type.toLowerCase()+"-like-count[data-id='"+id+"']");
                if(el.length > 0) {
                    el.text(Number.parseInt(el.text()) + 1);
                }
                if (data['message'] != "" && data['message'] != null) {
                    $("#message-container").append("<div class=\"alert alert-" + data['message_type']+ "\">" + data['message'] + "</div>");
                }

            }, "json");
        return false;
    })
})

$(function (){
    $(".like-chart-button").click(function (e){
        var type = $(this).attr("data-type") === "song" ? "Song" : "Album";
        var id = $(this).attr("data-id");
        $.post( "?c=Charts&a=voteFor"+type, { id: id },
            function( data ) {
                var el = $("."+type.toLowerCase()+"-like-count[data-id='"+id+"']");
                if(el.length > 0) {
                    el.text(Number.parseInt(el.text()) + 1);
                }
                if (data['message'] != "" && data['message'] != null) {
                    $("#message-container").append("<div class=\"alert alert-" + data['message_type']+ "\">" + data['message'] + "</div>");
                }

                sortTable(type.toLowerCase()+"-table", 2, true, false);

            }, "json");
        return false;
    })
})