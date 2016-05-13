function drawLineChart() {

    var response = null;
    var objs = [];
    var labels = [];
    var data = [];

    //
    //// Add a helper to format timestamp data
    //Date.prototype.formatMMDDYYYY = function() {
    //    return (this.getMonth() + 1) +
    //        "/" +  this.getDate() +
    //        "/" +  this.getFullYear();
    //};

    function getHistory() {
        var httpRequest = new XMLHttpRequest();
        httpRequest.open('GET', "../api/statistics/getUserHistory", false);   //false for syncronus
        httpRequest.send();
        return httpRequest.responseText;
    }

    function parseResponse (response){
        // JavaScript array of JavaScript objects
        var objects = [];
        for (var i=response.length;i--;) objects = JSON.parse(response);

        return objects;

    }

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

    response = getHistory();
    objs = parseResponse(response);

    labels= parseAttributes(objs, 'created_at', 'date');
    data= parseAttributes(objs, 'benefit', 'number');

    //window.console.log(data);
    //window.console.log(labels);


    function makeChart(labels, data) {


        // Create the chart.js data structure using 'labels' and 'data'
        var graphData = {
            //type: 'line',
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
            data: graphData,
            //options: options
        });
    };

    makeChart(labels, data);
}

drawLineChart();
