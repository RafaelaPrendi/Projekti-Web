function addIcon(kolone) {
    // Adds an element to the document

    var newElement = document.createElement("i");
    newElement.setAttribute('class', 'fas fa - check');
    kolone.appendChild(newElement);
}

//per krijimin automatik te tabeles te faqja e dyte
function createTable() {
    var koha = 8;
    var tabela = document.getElementById("secondTableBody");
    for (var i = 0; i < 9; i++) {
        var rresht = tabela.insertRow(i);

        for (var j = 0; j <= 7; j++) {
            var kolone = rresht.insertCell(j);
            if (j == 0) {
                if (koha < 10)
                    kolone.innerHTML = "0" + koha + ":00";
                else
                    kolone.innerHTML = koha + ":00";
                koha++;
            }

        }
    }
}