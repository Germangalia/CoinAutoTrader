/**
 * Created by ggalia84 on 26/05/16.
 */

//TODO change IP in production
var socket = io('http://localhost:3000');

/**
 * Socket.io for actualize bitcoin price
 */
socket.on("bitcoin-price-channel:App\\Events\\ShouldBroadcastBitcoinPrice", function(message){
    // Reload the bitcoin price everytime we load fire/bitcoin-price rout
    //$('#bitcoin-price').text(parseFloat(message.data.bitcoinprice));
    //window.alert(message.data.bitcoinprice);
    document.getElementById("bitcoin-price").innerHTML = message.data.bitcoinprice;
});


/**
 * Get Bitcoin price from API
 */
function getBitcoinPrice() {
    var httpRequest = new XMLHttpRequest();
    httpRequest.open('GET', "../api/statistics/getBitcoinPrice", false);   //false for syncronus
    httpRequest.send();
    return httpRequest.responseText;
}

/**
 * Parser for response of the API and convert in array of objects
 * @param response
 */
function parseResponseBitcoinPrice(response){
    var text = response.split('<',1);
    return text;
}


/**
 * Insert value from object to HTML
 * @param text
 */
function insertHtmlBitcoinPrice(text){
    document.getElementById("bitcoin-price").innerHTML = text;
}


//Ececute functions for first bitcoin price load
var response = getBitcoinPrice();
var text = parseResponseBitcoinPrice(response);
insertHtmlBitcoinPrice(text);