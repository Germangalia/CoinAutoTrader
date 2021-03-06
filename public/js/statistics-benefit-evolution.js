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
/**
 * Charge on load the page
 */
function chargeOnLoad(){
    //Initial listener from buttom and charge droplist.
    //document.getElementById("loadgraphic").addEventListener("click", chargeOnLoad);
    //chargeDropList();
    loadGraphic();

    /**
     * Create and print the chart in canvas HTML
     */
    function makeChart(labels, data) {


        // Create the chart.js data structure using 'labels' and 'data'
        var graphData = {
            labels : labels,
            datasets : [{
                label: "Benefit (%)",
                fill: false,
                lineTension: 0.1,
                backgroundColor: "rgba(75,192,192,0.4)",
                borderColor: "rgba(75,192,192,1)",
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "rgba(75,192,192,1)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(75,192,192,1)",
                pointHoverBorderColor: "rgba(220,220,220,1)",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data                  : data
            }]
        };

        // Get the context of the canvas element we want to select
        var ctx = document.getElementById("myLineChart").getContext("2d");

        // Instantiate a new chart
        var myLineChart = new Chart(ctx, {
            type: 'bar',
            data: graphData
            //options: options
        });
    }


    /**
     * Draw the line chart for the accout
     */
    function drawLineChart(id) {

        var response = null;
        var objs = [];
        var labels = [];
        var data = [];

        response = getAccountHistory(id);
        objs = parseResponse(response);

        labels= parseAttributes(objs, 'created_at', 'date');
        data= parseAttributes(objs, 'benefit', 'number');

        //window.console.log(response);
        //window.console.log(objs);
        //window.console.log(id);
        //window.console.log(labels);

        makeChart(labels, data);
    }

    /**
     * Function to load a graphic
     */
    function loadGraphic(){
        var id = document.getElementById("selectNumber").value;
        drawLineChart(id);
    }

}


//chargeOnLoad();
//# sourceMappingURL=statistics-benefit-evolution.js.map
