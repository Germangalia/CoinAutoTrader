var demo = new Vue({
    el: '#main',
    data: {
        // The layout mode, possible values are "grid" or "list".
        layout: 'grid',

        articles: [{
            "title": "CoinAutoTradeHome",
            "url": "#",
            "image": {
                "large": "/img//home/home.png",
                "small": "/img/home/home-150x150.png"
            }
        },
            {
                "title": "Trade Accounts",
                "url": "/accounts",
                "image": {
                    "large": "/img//home/bank.png",
                    "small": "/img/home/bank-150x150.png"
                }
            },
            {
                "title": "Trade History Records",
                "url": "/history",
                "image": {
                    "large": "/img//home/time.png",
                    "small": "/img/home/time-150x150.png"
                }
            },
            {
                "title": "Trade Statistics",
                "url": "/statistics/index",
                "image": {
                    "large": "/img//home/finances.png",
                    "small": "/img/home/finances-150x150.png"
                }
            }]

    }
});
