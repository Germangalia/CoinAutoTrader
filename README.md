[![Build Status](https://travis-ci.org/Germangalia/CoinAutoTrader.svg?branch=master)](https://travis-ci.org/Germangalia/CoinAutoTrader)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Germangalia/CoinAutoTrader/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Germangalia/CoinAutoTrader/?branch=master)
[![StyleCI](https://styleci.io/repos/56528582/shield)](https://styleci.io/repos/56528582)
[![Coverage Status](https://coveralls.io/repos/github/Germangalia/CoinAutoTrader/badge.svg?branch=master)](https://coveralls.io/github/Germangalia/CoinAutoTrader?branch=master)


# Project Title

CoinAuto Trader – The bitcoin automatic trader.


## Description

CoinAutoTrader is a project for the management of bitcoin accounts that has an automatic virtual trader to increase its capital.

This web project is based on Laravel despite having in some of its dividers other frameworks like Vue.js, Angular.js or Chart.js to boost the user’s experience.

The app has a user graphical interface where you can register through a formulary the different accounts that you want to execute for doing the trading activity.


## Installing

To install the project you need to have a special PHP class which is not included with the GitHub repository and allows doing the main calculation functions that the app uses.

In case of having a similar PHP class, what we need to do is a project clone in our computer or in a server and successively including this PHP class as a \APP\Trader\AutoTrader.php


## Running the tests

We can execute the app’s tests using PHPUnit at the terminal:

```

$ phpunit

```


## Built With

* PHP Laravel Framework

* Framework PHP Laravel

* HTML

* Javascript

* CSS

* MySQL

## Dependency, libraries and services

* Admin-LTE

* Llum

* Bootstrap

* JQuery

* ChartJS

* Cron / Schedule

* SQLite

* CoinBase (API)

* Travis-CI

* Scrutinizer

* Coveralls

* StyleCI

* Vue.js

* Angular.js

* Elixir

* Gulp

* Laravel-IDE- Helper

* PHPDocumentor

* Sweet Alert

* Mailgun

* ApiGuard

* Api-Response


## Contributing

Please read [CONTRIBUTING.md] for details in our code of conduct, and the process for submitting pull requests to us.


## Versioning

We use [SemVer] (http://semver.org/) for versioning. For the versions available, see the [tags in this repository] (https://github.com/Germangalia/CoinAutoTrader/tags).


## Author

* **German Galià Beltran** [GermanGalia] (https://github.com/Germangalia)

See also the list of [contributors] ( https://github.com/Germangalia/CoinAutoTrader/contributors) who participated in this project.


## License

This project is licensed under the MIT License - see the [LICENSE.md] (LICENSE.md) file for details


## Change Log

###03/05/2016
* Fix some issues in account's view production.

###02/06/2016
* Improve the project's document.
* Create package of the project with Composer and Packagist. It's not possible becouse the repository hasn't got private files.
* Improve Scheduler and Cron to put in production the backend trader and events.
* Fix some isues in Travis-CI. Put badget in green.
* Implement StyleCI. Put badget in green.


###01/06/2016
* Improve the presentation with Reveal.js

###31/05/2016
* Improve backend tests for check the business logic
* Add Class Diagrams to the project document.
* Add E-R Diagrams for see the database estructure.

###30/05/2016
* Actualize Sami documentation for API.
* Improve the readme.md with change log.


###29/05/2016
* Improve event bitcoin price and implement first load in javascript.


###28/05/2016
* Create new test for check the backend flow.


###27/05/2016
* Add event for load a bitcoin price in all views with socket.io and redis.


###26/05/2016
* Implement Event with Redis and socket.io for update bitcoin price from API.


###25/05/2016
* Fix issues to save first record to database.
* Add Travis-CI badget to the readme repository.
* Configure server to put the project in production.
* Study events with sockets.


###24/05/2016
* Create tests for all page views.
* Create some tests to check routes.php and the most important methods of backend.
* Improve responsive design with css and bootstrap.


###23/05/2016
* Improve Coin Base API Tests


###22/05/2016

* Add new tests to implement necessari methods from CoinBase API.

* Improve the readme.md file.

###21/05/2016

* Change images of landing page and add the gold color in main.css

* Make ModelFactory.php to generate automatic records to database.

* Add comment lines to all javascript functions.

* Refactorize and improve send email from landing page form.

* Improve some tests.

###20/05/2016

* Add 3 new graphics on statistics of capital, bitcoins and total amounts.

* Make and change images of the home page.

###19/05/2016

* Fix some refactorization's issues.

* Improve the accounts id load and disable button on click.


### 18/05/2016

* To generate the project’s presentation with Reveal.js.

* Generate readme.md file.

* Refactoritze all controllers and classes PHP.

* Refactoritze javascript functions for Graphs.

* Actualize all PHP Docs blocks.

### 17/05/2016

* To implement the project´s API.

* To add alerts and methods for the boost of the user’s experience.

* Beginning of the PHP backend code’s refinancing.

### 16/05/2016

* Remade of statistics index page loading data with buttons and javascript.

* To add styles and functions responsive to the app’s charts.

* Added email’s sending functionality with Mailgun for the landing’s contact formulary.

* Added alerts with Sweet Alert for the page of contact.

### 15/05/2016

* Solved graphic and accounts values loading problem.

### 14/05/2016

* Boost of general graphic esthetics with changes in the Landing page and partial blades.

### 13/05/2016

* Presentation page of benefits evolution with added graphic.

### 12/05/2016

* Project’s presentation and documentation structured.

* To search information about Laravel-IDE- Helper and PHPDocumentor for the generation of

PHPdoc documentation.

### 11/05/2016

* Created page with searcher for the most relevant statistics.

### 10/05/2016

* First documentation example of the API with Sami.

* Installation and configuration of Chart.js for graphics.

* Controller for gaining the statistics data of the data base.

### 09/05/2016

* To create presentation with Reveal.js and published in the GitHub’s gh-pages.

* Installed and configured Sami for API’s documentation in PHP.

* Added coveralls badget for testing.

### 08/05/2016

* Data charger in the historical chart done with Angular.js.

* Added search field to the chart.

* Added filters for every chart columns so that they can be ordered ascendant or descendant.

### 07/05/2016

* To implement the controller that does trade functions in backend.

* Created schedule method to do trade actions in backend.

* Beginning of the chart to register the user’s historical with Angular.js.

### 06/05/2016

* Created class for the introduction of the first register at the Historical chart.

* Added a chooser to the home page which looks like a list or an image chart with Vue.js

### 05/05/2016

* New necessary information search for the project.

* Implemented erasing and editing functions to the account chart with Vue.js.

* Done account chart waiting for validations.

### 04/05/2016

* Installed Vue.js with NPM

* Refinancing of Javascripts with Elixir and Gulp.

* Created account chart for each user with Vue.js

### 03/05/2016

* Adding external keys to the model.

* To start the trader’s general controller and creating the associated classes.

* New class to obtain every active account that the data base has.

* To improve the behavior when register the information at the data base from the accounts formulary.

### 02/05/2016

* Improved the data model adding relations between them.

* Created formulary and controller to add trade accounts.

### 27/04/2016

* Implementing and testing of the register page and login. Added fields to the register formulary and saving at the data base.

### 26/04/2016

* Creating the model and preparing the data base for the historical, calculations, users and accounts.

* Boost of the class to create a trading object.

### 25/04/2016

* Created and implemented the class that will do the math calculations to make the trading operations.

### 22/04/2016

* Admin-LTE installation.

* Preparing the tests with Scrutinizer.

* To prepare PHP styles with StyleCI.

* Search of information about editable charts and lists in Laravel.

* To prepare the tests for the API’s results.

### 19/04/2016

* To implement the CoinBaseAuthentication class

* To implement the CoinBaseAddresses class

* To implement the CoinBaseAccounts class

* To Implement the CoinBaseCheckouts class

* To implement the CoinBaseBuys class

* To implement the CoinBaseSells class

* To implement the CoinBaseDeposits class

* To implement the CoinBaseMerchant class

* To implement the CoinBaseOrders class

* To implement the CoinBaseWithdrawals class

* To implement the CoinBaseUsers class

* To implement the CoinBasePaymentMethods class

* To implement the CoinBaseMarketData class

* Test of some CoinBaseAPI’s main methods.

### 18/04/2016

* Laravel installation.

* Beginning GitHub’s repository.

* Llum installation.

* Creating account at CoinBase’s sandbox and first get along with the API.

* Obtaining the key API and the Secret API.

* To install CoinBase libraries in local with: composer require coinbase/coinbase

* Beginning authentication method of the CoinBase API.

### 15/04/2016

* Contents writing and project exposition.

