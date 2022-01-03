function searchSong() {
    var rawInput = document.getElementById("searchInput");
    var input = toLowerCaseAndNoDiacritics(rawInput.value);
    var table = document.getElementById("songsTable");
    var tableRows = table.getElementsByTagName("tr");

    for (var i = 1; i < tableRows.length; i++) {

        var row = tableRows[i];

        var tdName = row.getElementsByTagName("td")[0];
        var tdArtist = row.getElementsByTagName("td")[1];

        var name = toLowerCaseAndNoDiacritics(tdName.textContent);
        var artist = toLowerCaseAndNoDiacritics(tdArtist.textContent);

        if (name.indexOf(input) > -1 || artist.indexOf(input) > -1) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    }
}

function toLowerCaseAndNoDiacritics(text) {
    return text.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();
}