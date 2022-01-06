function searchTable(tableId, inputId) {
    var rawInput = document.getElementById(inputId);
    var input = toLowerCaseAndNoDiacritics(rawInput.value);
    var table = document.getElementById(tableId);
    var tableRows = table.getElementsByTagName("tr");

    for (let i = 1; i < tableRows.length; i++) {

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

function sortTable(tableId, column, isNumber = false) {
    var table = document.getElementById(tableId);
    var rows = table.rows;
    var rowsCount = table.rows.length;
    var change = true;
    var ascendingOrder = true;
    var switchCount = 0;

    do {
        change = false;

        for (let i = 1; i < (rowsCount - 1); i++) {
            var firstElement = rows[i].getElementsByTagName("td")[column];
            var secondElement = rows[i + 1].getElementsByTagName("td")[column];

            if (ascendingOrder) {
                if (!isNumber) {
                    if (firstElement.textContent.toLowerCase() > secondElement.textContent.toLowerCase()) {
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        change = true;
                        switchCount ++;
                    }
                } else {
                    if (Number(firstElement.textContent) > Number(secondElement.textContent)) {
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        change = true;
                        switchCount ++;
                    }
                }
            } else {
                if (!isNumber) {
                    if (firstElement.textContent.toLowerCase() < secondElement.textContent.toLowerCase()) {
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        change = true;
                        switchCount ++;
                    }
                } else {
                    if (Number(firstElement.textContent) < Number(secondElement.textContent)) {
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        change = true;
                        switchCount ++;
                    }
                }
            }
        }

        if (!change) {
            if (switchCount === 0 && ascendingOrder) {
                ascendingOrder = false;
                change = true;
            }
        }

    } while (change);

}