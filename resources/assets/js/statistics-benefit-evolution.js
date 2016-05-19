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
                label: "Benefit",
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
            type: 'line',
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