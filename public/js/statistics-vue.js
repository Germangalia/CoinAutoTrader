// Define a custom filter called "searchFor".

Vue.filter('searchFor', function (value, searchString) {

    // The first parameter to this function is the data that is to be filtered.
    // The second is the string we will be searching for.

    var result = [];

    if(!searchString){
        return value;
    }

    searchString = searchString.trim().toLowerCase();

    result = value.filter(function(item){
        if(item.title.toLowerCase().indexOf(searchString) !== -1){
            return item;
        }
    })

    // Return an array with the filtered data.

    return result;
})


var demo = new Vue({
    el: '#main',
    data: {
        searchString: "",

        initialCapital: 0.0,

        // The data model. These items would normally be requested via AJAX,
        // but are hardcoded here for simplicity.

        articles: []
    },

    methods: {

        createData: function() {
            this.article = [
                {
                    "title": "Total Initial Capital",
                    "url": "#",
                    "image": "http://cdn.tutorialzine.com/wp-content/uploads/2016/03/css-variables-100x100.jpg",
                    "value": this.initialCapital
                },
                {
                    "title": "Freebie: 4 Great Looking Pricing Tables",
                    "url": "#",
                    "image": "http://cdn.tutorialzine.com/wp-content/uploads/2016/02/great-looking-pricing-tables-100x100.jpg",
                    "value": ""
                },
                {
                    "title": "20 Interesting JavaScript and CSS Libraries for February 2016",
                    "url": "#",
                    "image": "http://cdn.tutorialzine.com/wp-content/uploads/2016/02/interesting-resources-february-100x100.jpg",
                    "value": ""
                },
                {
                    "title": "Quick Tip: The Easiest Way To Make Responsive Headers",
                    "url": "#",
                    "image": "http://cdn.tutorialzine.com/wp-content/uploads/2016/02/quick-tip-responsive-headers-100x100.png",
                    "value": ""
                },
                {
                    "title": "Learn SQL In 20 Minutes",
                    "url": "#",
                    "image": "http://cdn.tutorialzine.com/wp-content/uploads/2016/01/learn-sql-20-minutes-100x100.png",
                    "value": ""
                },
                {
                    "title": "Creating Your First Desktop App With HTML, JS and Electron",
                    "url": "#",
                    "image": "http://cdn.tutorialzine.com/wp-content/uploads/2015/12/creating-your-first-desktop-app-with-electron-100x100.png",
                    "value": ""
                }
            ]
        },
       totalInitialCapital: function(){
           this.$http.get('/api/statistics/totalInitialCapital', function(data) {
               this.$set('totalInitialCapital', data)
           })
       }
   },
   ready: function() {
      this.totalInitialCapital();
       this.createData()
   }
});
//# sourceMappingURL=statistics-vue.js.map
