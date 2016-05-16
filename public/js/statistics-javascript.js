/**
 * Load items from api
 */
function getContent(url) {
    var httpRequest = new XMLHttpRequest();
    httpRequest.open('GET', url, false);   //false for syncronus
    httpRequest.send();
    return httpRequest.responseText;
}

/**
 * Parser for response of the API and convert in array of objects
 */
function parseResponse (response){
    // JavaScript array of JavaScript objects
    var string = response.split('<',1);
    //var objects = [];
    //window.alert(string);
    //for (var i=string.length;i--;) objects = JSON.parse(string);

    return string;

}

/**
 * Convert String in number value
 */
function parseAttributes (object){
    var number =  parseFloat(object);
    return number;
}

/**
 * Insert number value in html tag by id
 */
function insertValue(tabla, targetRow, targetCell, value) {
        var tableObj = document.getElementById (tabla);
        var selectedRow = tableObj.rows [targetRow];
        var selectedCell = selectedRow.cells [targetCell-1];
        selectedCell.innerHTML = value;
}

/**
 * Actualize the tag
 */
function uploadTag(url, idTable, row, cell){
    var response = getContent(url);
    var object = parseResponse(response);
    var value = parseAttributes(object);
    insertValue(idTable, row, cell,value);
}
//# sourceMappingURL=statistics-javascript.js.map
