/**
 * Created by ggalia84 on 26/05/16.
 */

    //TODO change IP in production
var socket = io('http://localhost:3000');

socket.on("bitcoin-price-channel:App\\Events\\ShouldBroadcastBitcoinPrice", function(message){
    // Reload the bitcoin price everytime we load fire/bitcoin-price route
    window.alert(message);
    $('#bitcoin-price').text(parseFloat(message.data.bitcoin-price));
});
//# sourceMappingURL=event-bitcoin-price.js.map
