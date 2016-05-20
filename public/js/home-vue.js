var demo = new Vue({
    el: '#main',
    data: {
        // The layout mode, possible values are "grid" or "list".
        layout: 'grid',

        articles: [{
            "title": "CoinAutoTradeHome",
            "url": "#",
            "image": {
                "large": "/img/home/home.png",
                "small": "/img/home/home-150x150.png"
            }
        },
            {
                "title": "Trade Accounts",
                "url": "/accounts",
                "image": {
                    "large": "/img/home/accounts.png",
                    "small": "/img/home/accounts-150x150.png"
                }
            },
            {
                "title": "Trade History Records",
                "url": "/history",
                "image": {
                    "large": "/img/home/history.png",
                    "small": "/img/home/history-150x150.png"
                }
            },
            {
                "title": "Trade Statistics",
                "url": "/statistics/index",
                "image": {
                    "large": "/img/home/statistics.png",
                    "small": "/img/home/statistics-150x150.png"
                }
            }]

    }
});

//# sourceMappingURL=home-vue.js.map
