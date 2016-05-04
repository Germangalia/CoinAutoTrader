/**
 * Created by ggalia84 on 4/05/16.
 */
var vm = new Vue({
    el: '#AccountsController',

    methods: {

        fetchAccount: function(){
            this.$http.get('/api/user-accounts'), function(data) {
                this.$set('accounts', data)
            }
        }

    },

    ready: function() {
        this.fetchAccounts();

    }
});