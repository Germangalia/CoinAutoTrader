/**
 * Created by ggalia84 on 18/05/16.
 */
/**
 * Get History record from User
 */
function getAccounts() {
    var httpRequest = new XMLHttpRequest();
    httpRequest.open('GET', "../api/statistics/getUserAccounts", false);   //false for syncronus
    httpRequest.send();
    return httpRequest.responseText;
}

/**
 * Get History record from Account
 */
function getAccountHistory(id) {
    var httpRequest = new XMLHttpRequest();
    httpRequest.open('GET', "../api/statistics/getAccountHistory/" + id, false);   //false for syncronus
    httpRequest.send();
    return httpRequest.responseText;
}

/**
 * Parser for response of the API and convert in array of objects
 */
function parseResponse (response){
    // JavaScript array of JavaScript objects
    var objects = [];
    for (var i=response.length;i--;) objects = JSON.parse(response);

    return objects;

}

/**
 * Parser for Attributes from objects and convert in array of attributes
 */
function parseAttributes (objects, prop, convert){
    var arr = [];
    for (var i= 0 ; i < objects.length ; i++){
        if(convert == 'number') {
            var number = objects[i][prop];
            arr.push(parseFloat(number));
        }else if(convert == 'date') {
            var date = objects[i][prop];
            arr.push(new Date(date));
        }else if (convert == 'string'){
            arr.push(objects[i][prop]);
        }

    }
    return arr;

}

/**
 * Get the content values from attributes
 */
function getContent(id, objects, prop, convert){
    var arr;
    for (var k= 0 ; k < objects.length ; k++){

        if(objects[k]['account_id'] == id){
            arr = parseAttributes(objects, prop, convert);
        }

    }
    return arr;
}


/**
 * Clean the selection options
 */
function disableButton(id){
    var select = document.getElementById(id);
    select.disabled = true;
}

/**
 * Charge the drop list for select the accounts
 */
function chargeDropList(){
    //document.getElementById("loadgraphic").addEventListener("click", chargeOnLoad);

    disableButton("chargeId");

    var response = getAccounts();
    var objs = parseResponse(response);

    var options= parseAttributes(objs, 'id', 'string');

    var select = document.getElementById("selectNumber");

    for(var i = 0; i < options.length; i++) {
        var opt = document.createElement('option');
        opt.innerHTML = options[i];
        opt.value = options[i];
        select.appendChild(opt);
    }

    chargeOnLoad();
}