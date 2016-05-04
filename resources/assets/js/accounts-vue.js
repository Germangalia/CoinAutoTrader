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
            //TODO video min. 20.
            //this.
        },

        removeAccount: function(id) {

            var ConfirmBox = confirm("Are you sure, you want to delete this Account?")

            if(ConfirmBox) this.$http.delete('/api/users/' + id)
        }

    },

    // computed property for form validation state
    computed: {
        validation: function () {
            return {
                title: !!this.newAccount.title.trim(),
                capital: this.newAccount.capital.isNumber()
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