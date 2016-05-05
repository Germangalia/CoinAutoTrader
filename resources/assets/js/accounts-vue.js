/**
 * Created by ggalia84 on 4/05/16.
 */
var vm = new Vue({
    el: '#AccountsController',

    data: {
      success: false
    },

    methods: {

        fetchAccounts: function(){
            this.$http.get('/api/user-accounts', function(data) {
                this.$set('accounts', data)
            })
        },

        activateAccount: function(id) {
            this.$http.get('/api/accounts-active/' + id)

            this.fetchAccounts()
        },

        removeAccount: function(id) {

            var ConfirmBox = confirm("Are you sure, you want to delete this Account?")

            if(ConfirmBox) this.$http.get('/api/accounts-delete/' + id)

            this.fetchAccounts()
        }

    },

    // computed property for form validation state
    computed: {
        validation: function () {
            return {
                title: !!this.title.trim(),
                capital: this.capital.isNumber()
            }
        },
        isValid: function () {
            var validation = this.validation
            return Object.keys(validation).every(function (key) {
                return validation[key]
            })
        }

    },

    ready: function() {
        this.fetchAccounts()

    }
});