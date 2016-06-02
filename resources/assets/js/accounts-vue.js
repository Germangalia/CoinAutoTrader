/**
 * Created by ggalia84 on 4/05/16.
 */
var vm = new Vue({
    el: '#AccountsController',

    data: {

        newAccount: {
            name: 'hola',
            initial_capital: '1256'
        },

        success: false
    },

    methods: {

        /**
         * Get user accounts from database
         */
        fetchAccounts: function(){
            this.$http.get('/api/user-accounts', function(data) {
                this.$set('accounts', data)
            })
        },

        /**
         * Add new account to database
         * @constructor
         */
        AddNewAccount: function () {



        },

        /**
         * Activate the user account
         * @param id
         */
        activateAccount: function(id) {
            this.$http.get('/api/accounts-active/' + id)

            this.fetchAccounts()

            //Reload page
            location.reload(true)   //true-> not use cache
        },

        /**
         * Remove the user account
         * @param id
         */
        removeAccount: function(id) {

            var ConfirmBox = confirm("Are you sure, you want to delete this Account?")

            if(ConfirmBox) this.$http.get('/api/accounts-delete/' + id)

            this.fetchAccounts()

            //Reload page
            location.reload(true)   //true-> not use cache
        },

    },

    // computed property for form validation state
    computed: {
        /**
         * Validate the item
         * @returns {{name: boolean, initial_capital: *}}
         */
        validation: function () {
            return {
                name: !!this.newAccount.name.trim(),
                initial_capital: this.newAccount.initial_capital.isNumber()
            }
        },
        /**
         * Check if the item is valid
         * @returns {boolean}
         */
        isValid: function () {
            var validation = this.validation
            return Object.keys(validation).every(function (key) {
                return validation[key]
            })
        }

    },

    /**
     * Execute on load page
     */
    ready: function() {
        this.fetchAccounts()

    }
});