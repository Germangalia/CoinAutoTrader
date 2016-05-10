
(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:App" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App.html">App</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_CoinBaseAPI" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/CoinBaseAPI.html">CoinBaseAPI</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_CoinBaseAPI_CoinBaseAccounts" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/CoinBaseAPI/CoinBaseAccounts.html">CoinBaseAccounts</a>                    </div>                </li>                            <li data-name="class:App_CoinBaseAPI_CoinBaseAddresses" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/CoinBaseAPI/CoinBaseAddresses.html">CoinBaseAddresses</a>                    </div>                </li>                            <li data-name="class:App_CoinBaseAPI_CoinBaseAuthentication" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/CoinBaseAPI/CoinBaseAuthentication.html">CoinBaseAuthentication</a>                    </div>                </li>                            <li data-name="class:App_CoinBaseAPI_CoinBaseBuys" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/CoinBaseAPI/CoinBaseBuys.html">CoinBaseBuys</a>                    </div>                </li>                            <li data-name="class:App_CoinBaseAPI_CoinBaseCheckouts" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/CoinBaseAPI/CoinBaseCheckouts.html">CoinBaseCheckouts</a>                    </div>                </li>                            <li data-name="class:App_CoinBaseAPI_CoinBaseDeposits" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/CoinBaseAPI/CoinBaseDeposits.html">CoinBaseDeposits</a>                    </div>                </li>                            <li data-name="class:App_CoinBaseAPI_CoinBaseMarketData" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/CoinBaseAPI/CoinBaseMarketData.html">CoinBaseMarketData</a>                    </div>                </li>                            <li data-name="class:App_CoinBaseAPI_CoinBaseMerchant" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/CoinBaseAPI/CoinBaseMerchant.html">CoinBaseMerchant</a>                    </div>                </li>                            <li data-name="class:App_CoinBaseAPI_CoinBaseNotifications" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/CoinBaseAPI/CoinBaseNotifications.html">CoinBaseNotifications</a>                    </div>                </li>                            <li data-name="class:App_CoinBaseAPI_CoinBaseOrders" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/CoinBaseAPI/CoinBaseOrders.html">CoinBaseOrders</a>                    </div>                </li>                            <li data-name="class:App_CoinBaseAPI_CoinBasePaymentMethods" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/CoinBaseAPI/CoinBasePaymentMethods.html">CoinBasePaymentMethods</a>                    </div>                </li>                            <li data-name="class:App_CoinBaseAPI_CoinBaseSells" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/CoinBaseAPI/CoinBaseSells.html">CoinBaseSells</a>                    </div>                </li>                            <li data-name="class:App_CoinBaseAPI_CoinBaseTransactions" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/CoinBaseAPI/CoinBaseTransactions.html">CoinBaseTransactions</a>                    </div>                </li>                            <li data-name="class:App_CoinBaseAPI_CoinBaseUsers" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/CoinBaseAPI/CoinBaseUsers.html">CoinBaseUsers</a>                    </div>                </li>                            <li data-name="class:App_CoinBaseAPI_CoinBaseWithdrawals" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/CoinBaseAPI/CoinBaseWithdrawals.html">CoinBaseWithdrawals</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Console" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Console.html">Console</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_Console_Commands" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Console/Commands.html">Commands</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Console_Commands_Inspire" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Console/Commands/Inspire.html">Inspire</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:App_Console_Kernel" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Console/Kernel.html">Kernel</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Events" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Events.html">Events</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Events_Event" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Events/Event.html">Event</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Exceptions" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Exceptions.html">Exceptions</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Exceptions_Handler" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Exceptions/Handler.html">Handler</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Http" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http.html">Http</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_Http_Controllers" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Controllers.html">Controllers</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_Http_Controllers_Auth" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Controllers/Auth.html">Auth</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Http_Controllers_Auth_AuthController" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="App/Http/Controllers/Auth/AuthController.html">AuthController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_Auth_PasswordController" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="App/Http/Controllers/Auth/PasswordController.html">PasswordController</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Http_Controllers_PartialsAutoTrader" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Controllers/PartialsAutoTrader.html">PartialsAutoTrader</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Http_Controllers_PartialsAutoTrader_FirstHistoryRecord" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="App/Http/Controllers/PartialsAutoTrader/FirstHistoryRecord.html">FirstHistoryRecord</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_PartialsAutoTrader_GetActiveAccounts" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="App/Http/Controllers/PartialsAutoTrader/GetActiveAccounts.html">GetActiveAccounts</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:App_Http_Controllers_AccountsController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/AccountsController.html">AccountsController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_AutoTraderController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/AutoTraderController.html">AutoTraderController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_Controller" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/Controller.html">Controller</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_HistoryController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/HistoryController.html">HistoryController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_HomeController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/HomeController.html">HomeController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_TestCoinBase" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/TestCoinBase.html">TestCoinBase</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Http_Middleware" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Middleware.html">Middleware</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Http_Middleware_Authenticate" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/Authenticate.html">Authenticate</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_EncryptCookies" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/EncryptCookies.html">EncryptCookies</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_RedirectIfAuthenticated" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/RedirectIfAuthenticated.html">RedirectIfAuthenticated</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_VerifyCsrfToken" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/VerifyCsrfToken.html">VerifyCsrfToken</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Http_Requests" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Requests.html">Requests</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Http_Requests_Request" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Requests/Request.html">Request</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:App_Http_Kernel" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Http/Kernel.html">Kernel</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Jobs" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Jobs.html">Jobs</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Jobs_Job" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Jobs/Job.html">Job</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Providers" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Providers.html">Providers</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Providers_AppServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/AppServiceProvider.html">AppServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_AuthServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/AuthServiceProvider.html">AuthServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_EventServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/EventServiceProvider.html">EventServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_RouteServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/RouteServiceProvider.html">RouteServiceProvider</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:App_AccountsCoinBase" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/AccountsCoinBase.html">AccountsCoinBase</a>                    </div>                </li>                            <li data-name="class:App_TradeCalculator" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/TradeCalculator.html">TradeCalculator</a>                    </div>                </li>                            <li data-name="class:App_TradeHistory" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/TradeHistory.html">TradeHistory</a>                    </div>                </li>                            <li data-name="class:App_User" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/User.html">User</a>                    </div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "App.html", "name": "App", "doc": "Namespace App"},{"type": "Namespace", "link": "App/CoinBaseAPI.html", "name": "App\\CoinBaseAPI", "doc": "Namespace App\\CoinBaseAPI"},{"type": "Namespace", "link": "App/Console.html", "name": "App\\Console", "doc": "Namespace App\\Console"},{"type": "Namespace", "link": "App/Console/Commands.html", "name": "App\\Console\\Commands", "doc": "Namespace App\\Console\\Commands"},{"type": "Namespace", "link": "App/Events.html", "name": "App\\Events", "doc": "Namespace App\\Events"},{"type": "Namespace", "link": "App/Exceptions.html", "name": "App\\Exceptions", "doc": "Namespace App\\Exceptions"},{"type": "Namespace", "link": "App/Http.html", "name": "App\\Http", "doc": "Namespace App\\Http"},{"type": "Namespace", "link": "App/Http/Controllers.html", "name": "App\\Http\\Controllers", "doc": "Namespace App\\Http\\Controllers"},{"type": "Namespace", "link": "App/Http/Controllers/Auth.html", "name": "App\\Http\\Controllers\\Auth", "doc": "Namespace App\\Http\\Controllers\\Auth"},{"type": "Namespace", "link": "App/Http/Controllers/PartialsAutoTrader.html", "name": "App\\Http\\Controllers\\PartialsAutoTrader", "doc": "Namespace App\\Http\\Controllers\\PartialsAutoTrader"},{"type": "Namespace", "link": "App/Http/Middleware.html", "name": "App\\Http\\Middleware", "doc": "Namespace App\\Http\\Middleware"},{"type": "Namespace", "link": "App/Http/Requests.html", "name": "App\\Http\\Requests", "doc": "Namespace App\\Http\\Requests"},{"type": "Namespace", "link": "App/Jobs.html", "name": "App\\Jobs", "doc": "Namespace App\\Jobs"},{"type": "Namespace", "link": "App/Providers.html", "name": "App\\Providers", "doc": "Namespace App\\Providers"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/AccountsCoinBase.html", "name": "App\\AccountsCoinBase", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\AccountsCoinBase", "fromLink": "App/AccountsCoinBase.html", "link": "App/AccountsCoinBase.html#method_getUserRecord", "name": "App\\AccountsCoinBase::getUserRecord", "doc": "&quot;Get the user that owns the account.Return a object&quot;"},
                    {"type": "Method", "fromName": "App\\AccountsCoinBase", "fromLink": "App/AccountsCoinBase.html", "link": "App/AccountsCoinBase.html#method_getHistoryRecords", "name": "App\\AccountsCoinBase::getHistoryRecords", "doc": "&quot;Get the history record associated with the user. Return a colection&quot;"},
            
            {"type": "Class", "fromName": "App\\CoinBaseAPI", "fromLink": "App/CoinBaseAPI.html", "link": "App/CoinBaseAPI/CoinBaseAccounts.html", "name": "App\\CoinBaseAPI\\CoinBaseAccounts", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseAccounts", "fromLink": "App/CoinBaseAPI/CoinBaseAccounts.html", "link": "App/CoinBaseAPI/CoinBaseAccounts.html#method_createAccount", "name": "App\\CoinBaseAPI\\CoinBaseAccounts::createAccount", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseAccounts", "fromLink": "App/CoinBaseAPI/CoinBaseAccounts.html", "link": "App/CoinBaseAPI/CoinBaseAccounts.html#method_balanceAccount", "name": "App\\CoinBaseAPI\\CoinBaseAccounts::balanceAccount", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseAccounts", "fromLink": "App/CoinBaseAPI/CoinBaseAccounts.html", "link": "App/CoinBaseAPI/CoinBaseAccounts.html#method_getAllAccounts", "name": "App\\CoinBaseAPI\\CoinBaseAccounts::getAllAccounts", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseAccounts", "fromLink": "App/CoinBaseAPI/CoinBaseAccounts.html", "link": "App/CoinBaseAPI/CoinBaseAccounts.html#method_getAccountDetails", "name": "App\\CoinBaseAPI\\CoinBaseAccounts::getAccountDetails", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseAccounts", "fromLink": "App/CoinBaseAPI/CoinBaseAccounts.html", "link": "App/CoinBaseAPI/CoinBaseAccounts.html#method_getPrimaryAccountDetails", "name": "App\\CoinBaseAPI\\CoinBaseAccounts::getPrimaryAccountDetails", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseAccounts", "fromLink": "App/CoinBaseAPI/CoinBaseAccounts.html", "link": "App/CoinBaseAPI/CoinBaseAccounts.html#method_setAccountAsPrimary", "name": "App\\CoinBaseAPI\\CoinBaseAccounts::setAccountAsPrimary", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseAccounts", "fromLink": "App/CoinBaseAPI/CoinBaseAccounts.html", "link": "App/CoinBaseAPI/CoinBaseAccounts.html#method_updateAccount", "name": "App\\CoinBaseAPI\\CoinBaseAccounts::updateAccount", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseAccounts", "fromLink": "App/CoinBaseAPI/CoinBaseAccounts.html", "link": "App/CoinBaseAPI/CoinBaseAccounts.html#method_deleteAccount", "name": "App\\CoinBaseAPI\\CoinBaseAccounts::deleteAccount", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\CoinBaseAPI", "fromLink": "App/CoinBaseAPI.html", "link": "App/CoinBaseAPI/CoinBaseAddresses.html", "name": "App\\CoinBaseAPI\\CoinBaseAddresses", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseAddresses", "fromLink": "App/CoinBaseAPI/CoinBaseAddresses.html", "link": "App/CoinBaseAPI/CoinBaseAddresses.html#method_createAddress", "name": "App\\CoinBaseAPI\\CoinBaseAddresses::createAddress", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseAddresses", "fromLink": "App/CoinBaseAPI/CoinBaseAddresses.html", "link": "App/CoinBaseAPI/CoinBaseAddresses.html#method_getAddressForAccount", "name": "App\\CoinBaseAPI\\CoinBaseAddresses::getAddressForAccount", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseAddresses", "fromLink": "App/CoinBaseAPI/CoinBaseAddresses.html", "link": "App/CoinBaseAPI/CoinBaseAddresses.html#method_getAddressInfo", "name": "App\\CoinBaseAPI\\CoinBaseAddresses::getAddressInfo", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseAddresses", "fromLink": "App/CoinBaseAPI/CoinBaseAddresses.html", "link": "App/CoinBaseAPI/CoinBaseAddresses.html#method_getAddressTransactions", "name": "App\\CoinBaseAPI\\CoinBaseAddresses::getAddressTransactions", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\CoinBaseAPI", "fromLink": "App/CoinBaseAPI.html", "link": "App/CoinBaseAPI/CoinBaseAuthentication.html", "name": "App\\CoinBaseAPI\\CoinBaseAuthentication", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseAuthentication", "fromLink": "App/CoinBaseAPI/CoinBaseAuthentication.html", "link": "App/CoinBaseAPI/CoinBaseAuthentication.html#method_apiKeyAuthentication", "name": "App\\CoinBaseAPI\\CoinBaseAuthentication::apiKeyAuthentication", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseAuthentication", "fromLink": "App/CoinBaseAPI/CoinBaseAuthentication.html", "link": "App/CoinBaseAPI/CoinBaseAuthentication.html#method_oAuth2Authentication", "name": "App\\CoinBaseAPI\\CoinBaseAuthentication::oAuth2Authentication", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseAuthentication", "fromLink": "App/CoinBaseAPI/CoinBaseAuthentication.html", "link": "App/CoinBaseAPI/CoinBaseAuthentication.html#method_twoFactorAuthentication", "name": "App\\CoinBaseAPI\\CoinBaseAuthentication::twoFactorAuthentication", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\CoinBaseAPI", "fromLink": "App/CoinBaseAPI.html", "link": "App/CoinBaseAPI/CoinBaseBuys.html", "name": "App\\CoinBaseAPI\\CoinBaseBuys", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseBuys", "fromLink": "App/CoinBaseAPI/CoinBaseBuys.html", "link": "App/CoinBaseAPI/CoinBaseBuys.html#method_getBuys", "name": "App\\CoinBaseAPI\\CoinBaseBuys::getBuys", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseBuys", "fromLink": "App/CoinBaseAPI/CoinBaseBuys.html", "link": "App/CoinBaseAPI/CoinBaseBuys.html#method_getBuyInfo", "name": "App\\CoinBaseAPI\\CoinBaseBuys::getBuyInfo", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseBuys", "fromLink": "App/CoinBaseAPI/CoinBaseBuys.html", "link": "App/CoinBaseAPI/CoinBaseBuys.html#method_buyBitcoins", "name": "App\\CoinBaseAPI\\CoinBaseBuys::buyBitcoins", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\CoinBaseAPI", "fromLink": "App/CoinBaseAPI.html", "link": "App/CoinBaseAPI/CoinBaseCheckouts.html", "name": "App\\CoinBaseAPI\\CoinBaseCheckouts", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseCheckouts", "fromLink": "App/CoinBaseAPI/CoinBaseCheckouts.html", "link": "App/CoinBaseAPI/CoinBaseCheckouts.html#method_getCheckouts", "name": "App\\CoinBaseAPI\\CoinBaseCheckouts::getCheckouts", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseCheckouts", "fromLink": "App/CoinBaseAPI/CoinBaseCheckouts.html", "link": "App/CoinBaseAPI/CoinBaseCheckouts.html#method_createCheckout", "name": "App\\CoinBaseAPI\\CoinBaseCheckouts::createCheckout", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseCheckouts", "fromLink": "App/CoinBaseAPI/CoinBaseCheckouts.html", "link": "App/CoinBaseAPI/CoinBaseCheckouts.html#method_getCheckoutById", "name": "App\\CoinBaseAPI\\CoinBaseCheckouts::getCheckoutById", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseCheckouts", "fromLink": "App/CoinBaseAPI/CoinBaseCheckouts.html", "link": "App/CoinBaseAPI/CoinBaseCheckouts.html#method_getCheckoutsOrders", "name": "App\\CoinBaseAPI\\CoinBaseCheckouts::getCheckoutsOrders", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseCheckouts", "fromLink": "App/CoinBaseAPI/CoinBaseCheckouts.html", "link": "App/CoinBaseAPI/CoinBaseCheckouts.html#method_createOrderForCheckout", "name": "App\\CoinBaseAPI\\CoinBaseCheckouts::createOrderForCheckout", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\CoinBaseAPI", "fromLink": "App/CoinBaseAPI.html", "link": "App/CoinBaseAPI/CoinBaseDeposits.html", "name": "App\\CoinBaseAPI\\CoinBaseDeposits", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseDeposits", "fromLink": "App/CoinBaseAPI/CoinBaseDeposits.html", "link": "App/CoinBaseAPI/CoinBaseDeposits.html#method_getDeposits", "name": "App\\CoinBaseAPI\\CoinBaseDeposits::getDeposits", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseDeposits", "fromLink": "App/CoinBaseAPI/CoinBaseDeposits.html", "link": "App/CoinBaseAPI/CoinBaseDeposits.html#method_getDepositInfo", "name": "App\\CoinBaseAPI\\CoinBaseDeposits::getDepositInfo", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseDeposits", "fromLink": "App/CoinBaseAPI/CoinBaseDeposits.html", "link": "App/CoinBaseAPI/CoinBaseDeposits.html#method_setDepositFounds", "name": "App\\CoinBaseAPI\\CoinBaseDeposits::setDepositFounds", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\CoinBaseAPI", "fromLink": "App/CoinBaseAPI.html", "link": "App/CoinBaseAPI/CoinBaseMarketData.html", "name": "App\\CoinBaseAPI\\CoinBaseMarketData", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseMarketData", "fromLink": "App/CoinBaseAPI/CoinBaseMarketData.html", "link": "App/CoinBaseAPI/CoinBaseMarketData.html#method_getNativeCurrencies", "name": "App\\CoinBaseAPI\\CoinBaseMarketData::getNativeCurrencies", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseMarketData", "fromLink": "App/CoinBaseAPI/CoinBaseMarketData.html", "link": "App/CoinBaseAPI/CoinBaseMarketData.html#method_getExchangeRates", "name": "App\\CoinBaseAPI\\CoinBaseMarketData::getExchangeRates", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseMarketData", "fromLink": "App/CoinBaseAPI/CoinBaseMarketData.html", "link": "App/CoinBaseAPI/CoinBaseMarketData.html#method_getBuyPrice", "name": "App\\CoinBaseAPI\\CoinBaseMarketData::getBuyPrice", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseMarketData", "fromLink": "App/CoinBaseAPI/CoinBaseMarketData.html", "link": "App/CoinBaseAPI/CoinBaseMarketData.html#method_getSellPrice", "name": "App\\CoinBaseAPI\\CoinBaseMarketData::getSellPrice", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseMarketData", "fromLink": "App/CoinBaseAPI/CoinBaseMarketData.html", "link": "App/CoinBaseAPI/CoinBaseMarketData.html#method_getSpotPrice", "name": "App\\CoinBaseAPI\\CoinBaseMarketData::getSpotPrice", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseMarketData", "fromLink": "App/CoinBaseAPI/CoinBaseMarketData.html", "link": "App/CoinBaseAPI/CoinBaseMarketData.html#method_getServerTime", "name": "App\\CoinBaseAPI\\CoinBaseMarketData::getServerTime", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\CoinBaseAPI", "fromLink": "App/CoinBaseAPI.html", "link": "App/CoinBaseAPI/CoinBaseMerchant.html", "name": "App\\CoinBaseAPI\\CoinBaseMerchant", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseMerchant", "fromLink": "App/CoinBaseAPI/CoinBaseMerchant.html", "link": "App/CoinBaseAPI/CoinBaseMerchant.html#method_getMerchant", "name": "App\\CoinBaseAPI\\CoinBaseMerchant::getMerchant", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseMerchant", "fromLink": "App/CoinBaseAPI/CoinBaseMerchant.html", "link": "App/CoinBaseAPI/CoinBaseMerchant.html#method_verifyingMerchantCallbacks", "name": "App\\CoinBaseAPI\\CoinBaseMerchant::verifyingMerchantCallbacks", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\CoinBaseAPI", "fromLink": "App/CoinBaseAPI.html", "link": "App/CoinBaseAPI/CoinBaseNotifications.html", "name": "App\\CoinBaseAPI\\CoinBaseNotifications", "doc": "&quot;Created by PhpStorm.&quot;"},
                    
            {"type": "Class", "fromName": "App\\CoinBaseAPI", "fromLink": "App/CoinBaseAPI.html", "link": "App/CoinBaseAPI/CoinBaseOrders.html", "name": "App\\CoinBaseAPI\\CoinBaseOrders", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseOrders", "fromLink": "App/CoinBaseAPI/CoinBaseOrders.html", "link": "App/CoinBaseAPI/CoinBaseOrders.html#method_getOrders", "name": "App\\CoinBaseAPI\\CoinBaseOrders::getOrders", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseOrders", "fromLink": "App/CoinBaseAPI/CoinBaseOrders.html", "link": "App/CoinBaseAPI/CoinBaseOrders.html#method_getOrderById", "name": "App\\CoinBaseAPI\\CoinBaseOrders::getOrderById", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseOrders", "fromLink": "App/CoinBaseAPI/CoinBaseOrders.html", "link": "App/CoinBaseAPI/CoinBaseOrders.html#method_createOrder", "name": "App\\CoinBaseAPI\\CoinBaseOrders::createOrder", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseOrders", "fromLink": "App/CoinBaseAPI/CoinBaseOrders.html", "link": "App/CoinBaseAPI/CoinBaseOrders.html#method_refundOrder", "name": "App\\CoinBaseAPI\\CoinBaseOrders::refundOrder", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\CoinBaseAPI", "fromLink": "App/CoinBaseAPI.html", "link": "App/CoinBaseAPI/CoinBasePaymentMethods.html", "name": "App\\CoinBaseAPI\\CoinBasePaymentMethods", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBasePaymentMethods", "fromLink": "App/CoinBaseAPI/CoinBasePaymentMethods.html", "link": "App/CoinBaseAPI/CoinBasePaymentMethods.html#method_getPaymentMethods", "name": "App\\CoinBaseAPI\\CoinBasePaymentMethods::getPaymentMethods", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBasePaymentMethods", "fromLink": "App/CoinBaseAPI/CoinBasePaymentMethods.html", "link": "App/CoinBaseAPI/CoinBasePaymentMethods.html#method_getPaymentMethodById", "name": "App\\CoinBaseAPI\\CoinBasePaymentMethods::getPaymentMethodById", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\CoinBaseAPI", "fromLink": "App/CoinBaseAPI.html", "link": "App/CoinBaseAPI/CoinBaseSells.html", "name": "App\\CoinBaseAPI\\CoinBaseSells", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseSells", "fromLink": "App/CoinBaseAPI/CoinBaseSells.html", "link": "App/CoinBaseAPI/CoinBaseSells.html#method_getSells", "name": "App\\CoinBaseAPI\\CoinBaseSells::getSells", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseSells", "fromLink": "App/CoinBaseAPI/CoinBaseSells.html", "link": "App/CoinBaseAPI/CoinBaseSells.html#method_getSellInfo", "name": "App\\CoinBaseAPI\\CoinBaseSells::getSellInfo", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseSells", "fromLink": "App/CoinBaseAPI/CoinBaseSells.html", "link": "App/CoinBaseAPI/CoinBaseSells.html#method_sellBitcoins", "name": "App\\CoinBaseAPI\\CoinBaseSells::sellBitcoins", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\CoinBaseAPI", "fromLink": "App/CoinBaseAPI.html", "link": "App/CoinBaseAPI/CoinBaseTransactions.html", "name": "App\\CoinBaseAPI\\CoinBaseTransactions", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseTransactions", "fromLink": "App/CoinBaseAPI/CoinBaseTransactions.html", "link": "App/CoinBaseAPI/CoinBaseTransactions.html#method_setTransaction", "name": "App\\CoinBaseAPI\\CoinBaseTransactions::setTransaction", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseTransactions", "fromLink": "App/CoinBaseAPI/CoinBaseTransactions.html", "link": "App/CoinBaseAPI/CoinBaseTransactions.html#method_getTransactions", "name": "App\\CoinBaseAPI\\CoinBaseTransactions::getTransactions", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseTransactions", "fromLink": "App/CoinBaseAPI/CoinBaseTransactions.html", "link": "App/CoinBaseAPI/CoinBaseTransactions.html#method_getTransactionInfo", "name": "App\\CoinBaseAPI\\CoinBaseTransactions::getTransactionInfo", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseTransactions", "fromLink": "App/CoinBaseAPI/CoinBaseTransactions.html", "link": "App/CoinBaseAPI/CoinBaseTransactions.html#method_setTransferFoundsToNewAccount", "name": "App\\CoinBaseAPI\\CoinBaseTransactions::setTransferFoundsToNewAccount", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseTransactions", "fromLink": "App/CoinBaseAPI/CoinBaseTransactions.html", "link": "App/CoinBaseAPI/CoinBaseTransactions.html#method_getRequestFounds", "name": "App\\CoinBaseAPI\\CoinBaseTransactions::getRequestFounds", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseTransactions", "fromLink": "App/CoinBaseAPI/CoinBaseTransactions.html", "link": "App/CoinBaseAPI/CoinBaseTransactions.html#method_resendRequest", "name": "App\\CoinBaseAPI\\CoinBaseTransactions::resendRequest", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseTransactions", "fromLink": "App/CoinBaseAPI/CoinBaseTransactions.html", "link": "App/CoinBaseAPI/CoinBaseTransactions.html#method_cancelRequest", "name": "App\\CoinBaseAPI\\CoinBaseTransactions::cancelRequest", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseTransactions", "fromLink": "App/CoinBaseAPI/CoinBaseTransactions.html", "link": "App/CoinBaseAPI/CoinBaseTransactions.html#method_fulfillRequest", "name": "App\\CoinBaseAPI\\CoinBaseTransactions::fulfillRequest", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\CoinBaseAPI", "fromLink": "App/CoinBaseAPI.html", "link": "App/CoinBaseAPI/CoinBaseUsers.html", "name": "App\\CoinBaseAPI\\CoinBaseUsers", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseUsers", "fromLink": "App/CoinBaseAPI/CoinBaseUsers.html", "link": "App/CoinBaseAPI/CoinBaseUsers.html#method_getAuthorizationInfo", "name": "App\\CoinBaseAPI\\CoinBaseUsers::getAuthorizationInfo", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseUsers", "fromLink": "App/CoinBaseAPI/CoinBaseUsers.html", "link": "App/CoinBaseAPI/CoinBaseUsers.html#method_lookupUserInfo", "name": "App\\CoinBaseAPI\\CoinBaseUsers::lookupUserInfo", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseUsers", "fromLink": "App/CoinBaseAPI/CoinBaseUsers.html", "link": "App/CoinBaseAPI/CoinBaseUsers.html#method_getCurrentUser", "name": "App\\CoinBaseAPI\\CoinBaseUsers::getCurrentUser", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseUsers", "fromLink": "App/CoinBaseAPI/CoinBaseUsers.html", "link": "App/CoinBaseAPI/CoinBaseUsers.html#method_updateCurrentUser", "name": "App\\CoinBaseAPI\\CoinBaseUsers::updateCurrentUser", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\CoinBaseAPI", "fromLink": "App/CoinBaseAPI.html", "link": "App/CoinBaseAPI/CoinBaseWithdrawals.html", "name": "App\\CoinBaseAPI\\CoinBaseWithdrawals", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseWithdrawals", "fromLink": "App/CoinBaseAPI/CoinBaseWithdrawals.html", "link": "App/CoinBaseAPI/CoinBaseWithdrawals.html#method_getWithdrawals", "name": "App\\CoinBaseAPI\\CoinBaseWithdrawals::getWithdrawals", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseWithdrawals", "fromLink": "App/CoinBaseAPI/CoinBaseWithdrawals.html", "link": "App/CoinBaseAPI/CoinBaseWithdrawals.html#method_getWithdrawalById", "name": "App\\CoinBaseAPI\\CoinBaseWithdrawals::getWithdrawalById", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\CoinBaseAPI\\CoinBaseWithdrawals", "fromLink": "App/CoinBaseAPI/CoinBaseWithdrawals.html", "link": "App/CoinBaseAPI/CoinBaseWithdrawals.html#method_setWithdrawFounds", "name": "App\\CoinBaseAPI\\CoinBaseWithdrawals::setWithdrawFounds", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Console\\Commands", "fromLink": "App/Console/Commands.html", "link": "App/Console/Commands/Inspire.html", "name": "App\\Console\\Commands\\Inspire", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Console\\Commands\\Inspire", "fromLink": "App/Console/Commands/Inspire.html", "link": "App/Console/Commands/Inspire.html#method_handle", "name": "App\\Console\\Commands\\Inspire::handle", "doc": "&quot;Execute the console command.&quot;"},
            
            {"type": "Class", "fromName": "App\\Console", "fromLink": "App/Console.html", "link": "App/Console/Kernel.html", "name": "App\\Console\\Kernel", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Events", "fromLink": "App/Events.html", "link": "App/Events/Event.html", "name": "App\\Events\\Event", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Exceptions", "fromLink": "App/Exceptions.html", "link": "App/Exceptions/Handler.html", "name": "App\\Exceptions\\Handler", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Exceptions\\Handler", "fromLink": "App/Exceptions/Handler.html", "link": "App/Exceptions/Handler.html#method_report", "name": "App\\Exceptions\\Handler::report", "doc": "&quot;Report or log an exception.&quot;"},
                    {"type": "Method", "fromName": "App\\Exceptions\\Handler", "fromLink": "App/Exceptions/Handler.html", "link": "App/Exceptions/Handler.html#method_render", "name": "App\\Exceptions\\Handler::render", "doc": "&quot;Render an exception into an HTTP response.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/AccountsController.html", "name": "App\\Http\\Controllers\\AccountsController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\AccountsController", "fromLink": "App/Http/Controllers/AccountsController.html", "link": "App/Http/Controllers/AccountsController.html#method_index", "name": "App\\Http\\Controllers\\AccountsController::index", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\AccountsController", "fromLink": "App/Http/Controllers/AccountsController.html", "link": "App/Http/Controllers/AccountsController.html#method_createAccount", "name": "App\\Http\\Controllers\\AccountsController::createAccount", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\AccountsController", "fromLink": "App/Http/Controllers/AccountsController.html", "link": "App/Http/Controllers/AccountsController.html#method_getUserAccounts", "name": "App\\Http\\Controllers\\AccountsController::getUserAccounts", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\AccountsController", "fromLink": "App/Http/Controllers/AccountsController.html", "link": "App/Http/Controllers/AccountsController.html#method_activateAccounts", "name": "App\\Http\\Controllers\\AccountsController::activateAccounts", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\AccountsController", "fromLink": "App/Http/Controllers/AccountsController.html", "link": "App/Http/Controllers/AccountsController.html#method_deleteAccounts", "name": "App\\Http\\Controllers\\AccountsController::deleteAccounts", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers\\Auth", "fromLink": "App/Http/Controllers/Auth.html", "link": "App/Http/Controllers/Auth/AuthController.html", "name": "App\\Http\\Controllers\\Auth\\AuthController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\AuthController", "fromLink": "App/Http/Controllers/Auth/AuthController.html", "link": "App/Http/Controllers/Auth/AuthController.html#method___construct", "name": "App\\Http\\Controllers\\Auth\\AuthController::__construct", "doc": "&quot;Create a new authentication controller instance.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers\\Auth", "fromLink": "App/Http/Controllers/Auth.html", "link": "App/Http/Controllers/Auth/PasswordController.html", "name": "App\\Http\\Controllers\\Auth\\PasswordController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\PasswordController", "fromLink": "App/Http/Controllers/Auth/PasswordController.html", "link": "App/Http/Controllers/Auth/PasswordController.html#method___construct", "name": "App\\Http\\Controllers\\Auth\\PasswordController::__construct", "doc": "&quot;Create a new password controller instance.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/AutoTraderController.html", "name": "App\\Http\\Controllers\\AutoTraderController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\AutoTraderController", "fromLink": "App/Http/Controllers/AutoTraderController.html", "link": "App/Http/Controllers/AutoTraderController.html#method_execute", "name": "App\\Http\\Controllers\\AutoTraderController::execute", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/Controller.html", "name": "App\\Http\\Controllers\\Controller", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/HistoryController.html", "name": "App\\Http\\Controllers\\HistoryController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\HistoryController", "fromLink": "App/Http/Controllers/HistoryController.html", "link": "App/Http/Controllers/HistoryController.html#method_index", "name": "App\\Http\\Controllers\\HistoryController::index", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\HistoryController", "fromLink": "App/Http/Controllers/HistoryController.html", "link": "App/Http/Controllers/HistoryController.html#method_getUserHistory", "name": "App\\Http\\Controllers\\HistoryController::getUserHistory", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/HomeController.html", "name": "App\\Http\\Controllers\\HomeController", "doc": "&quot;Class HomeController&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\HomeController", "fromLink": "App/Http/Controllers/HomeController.html", "link": "App/Http/Controllers/HomeController.html#method___construct", "name": "App\\Http\\Controllers\\HomeController::__construct", "doc": "&quot;Create a new controller instance.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\HomeController", "fromLink": "App/Http/Controllers/HomeController.html", "link": "App/Http/Controllers/HomeController.html#method_index", "name": "App\\Http\\Controllers\\HomeController::index", "doc": "&quot;Show the application dashboard.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers\\PartialsAutoTrader", "fromLink": "App/Http/Controllers/PartialsAutoTrader.html", "link": "App/Http/Controllers/PartialsAutoTrader/FirstHistoryRecord.html", "name": "App\\Http\\Controllers\\PartialsAutoTrader\\FirstHistoryRecord", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\PartialsAutoTrader\\FirstHistoryRecord", "fromLink": "App/Http/Controllers/PartialsAutoTrader/FirstHistoryRecord.html", "link": "App/Http/Controllers/PartialsAutoTrader/FirstHistoryRecord.html#method_makeFirstRecord", "name": "App\\Http\\Controllers\\PartialsAutoTrader\\FirstHistoryRecord::makeFirstRecord", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers\\PartialsAutoTrader", "fromLink": "App/Http/Controllers/PartialsAutoTrader.html", "link": "App/Http/Controllers/PartialsAutoTrader/GetActiveAccounts.html", "name": "App\\Http\\Controllers\\PartialsAutoTrader\\GetActiveAccounts", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\PartialsAutoTrader\\GetActiveAccounts", "fromLink": "App/Http/Controllers/PartialsAutoTrader/GetActiveAccounts.html", "link": "App/Http/Controllers/PartialsAutoTrader/GetActiveAccounts.html#method_getActiveAccounts", "name": "App\\Http\\Controllers\\PartialsAutoTrader\\GetActiveAccounts::getActiveAccounts", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\PartialsAutoTrader\\GetActiveAccounts", "fromLink": "App/Http/Controllers/PartialsAutoTrader/GetActiveAccounts.html", "link": "App/Http/Controllers/PartialsAutoTrader/GetActiveAccounts.html#method_setActiveAccounts", "name": "App\\Http\\Controllers\\PartialsAutoTrader\\GetActiveAccounts::setActiveAccounts", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\PartialsAutoTrader\\GetActiveAccounts", "fromLink": "App/Http/Controllers/PartialsAutoTrader/GetActiveAccounts.html", "link": "App/Http/Controllers/PartialsAutoTrader/GetActiveAccounts.html#method_getAccounts", "name": "App\\Http\\Controllers\\PartialsAutoTrader\\GetActiveAccounts::getAccounts", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/TestCoinBase.html", "name": "App\\Http\\Controllers\\TestCoinBase", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\TestCoinBase", "fromLink": "App/Http/Controllers/TestCoinBase.html", "link": "App/Http/Controllers/TestCoinBase.html#method_testing", "name": "App\\Http\\Controllers\\TestCoinBase::testing", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Http", "fromLink": "App/Http.html", "link": "App/Http/Kernel.html", "name": "App\\Http\\Kernel", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/Authenticate.html", "name": "App\\Http\\Middleware\\Authenticate", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Middleware\\Authenticate", "fromLink": "App/Http/Middleware/Authenticate.html", "link": "App/Http/Middleware/Authenticate.html#method_handle", "name": "App\\Http\\Middleware\\Authenticate::handle", "doc": "&quot;Handle an incoming request.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/EncryptCookies.html", "name": "App\\Http\\Middleware\\EncryptCookies", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/RedirectIfAuthenticated.html", "name": "App\\Http\\Middleware\\RedirectIfAuthenticated", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Middleware\\RedirectIfAuthenticated", "fromLink": "App/Http/Middleware/RedirectIfAuthenticated.html", "link": "App/Http/Middleware/RedirectIfAuthenticated.html#method_handle", "name": "App\\Http\\Middleware\\RedirectIfAuthenticated::handle", "doc": "&quot;Handle an incoming request.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/VerifyCsrfToken.html", "name": "App\\Http\\Middleware\\VerifyCsrfToken", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Requests", "fromLink": "App/Http/Requests.html", "link": "App/Http/Requests/Request.html", "name": "App\\Http\\Requests\\Request", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Jobs", "fromLink": "App/Jobs.html", "link": "App/Jobs/Job.html", "name": "App\\Jobs\\Job", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/AppServiceProvider.html", "name": "App\\Providers\\AppServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\AppServiceProvider", "fromLink": "App/Providers/AppServiceProvider.html", "link": "App/Providers/AppServiceProvider.html#method_boot", "name": "App\\Providers\\AppServiceProvider::boot", "doc": "&quot;Bootstrap any application services.&quot;"},
                    {"type": "Method", "fromName": "App\\Providers\\AppServiceProvider", "fromLink": "App/Providers/AppServiceProvider.html", "link": "App/Providers/AppServiceProvider.html#method_register", "name": "App\\Providers\\AppServiceProvider::register", "doc": "&quot;Register any application services.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/AuthServiceProvider.html", "name": "App\\Providers\\AuthServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\AuthServiceProvider", "fromLink": "App/Providers/AuthServiceProvider.html", "link": "App/Providers/AuthServiceProvider.html#method_boot", "name": "App\\Providers\\AuthServiceProvider::boot", "doc": "&quot;Register any application authentication \/ authorization services.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/EventServiceProvider.html", "name": "App\\Providers\\EventServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\EventServiceProvider", "fromLink": "App/Providers/EventServiceProvider.html", "link": "App/Providers/EventServiceProvider.html#method_boot", "name": "App\\Providers\\EventServiceProvider::boot", "doc": "&quot;Register any other events for your application.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/RouteServiceProvider.html", "name": "App\\Providers\\RouteServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\RouteServiceProvider", "fromLink": "App/Providers/RouteServiceProvider.html", "link": "App/Providers/RouteServiceProvider.html#method_boot", "name": "App\\Providers\\RouteServiceProvider::boot", "doc": "&quot;Define your route model bindings, pattern filters, etc.&quot;"},
                    {"type": "Method", "fromName": "App\\Providers\\RouteServiceProvider", "fromLink": "App/Providers/RouteServiceProvider.html", "link": "App/Providers/RouteServiceProvider.html#method_map", "name": "App\\Providers\\RouteServiceProvider::map", "doc": "&quot;Define the routes for the application.&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/TradeCalculator.html", "name": "App\\TradeCalculator", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/TradeHistory.html", "name": "App\\TradeHistory", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\TradeHistory", "fromLink": "App/TradeHistory.html", "link": "App/TradeHistory.html#method_getUserRecord", "name": "App\\TradeHistory::getUserRecord", "doc": "&quot;Get the user that owns the history record.Return a object&quot;"},
                    {"type": "Method", "fromName": "App\\TradeHistory", "fromLink": "App/TradeHistory.html", "link": "App/TradeHistory.html#method_getAccountRecord", "name": "App\\TradeHistory::getAccountRecord", "doc": "&quot;Get the account that owns the history record.Return a object&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/User.html", "name": "App\\User", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_getAccountRecords", "name": "App\\User::getAccountRecords", "doc": "&quot;Get the account record associated with the user. Return a colection&quot;"},
                    {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_getHistoryRecords", "name": "App\\User::getHistoryRecords", "doc": "&quot;Get the history record associated with the user. Return a colection&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


