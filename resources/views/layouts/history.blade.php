@extends('layouts.app')

@section('htmlheader_title')
    Coin Base History
@endsection

        <!-- Angular Material CSS now available via Google CDN; version 1.0.7 used here -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/0.11.2/angular-material.min.css">


@yield('scripts')

@section('main-content')
    <div class="container spark-screen" ng-app="angularTable">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Coin Base History</h3></div>
                    <div class="panel-body">
                        <div id="HystoryController">

                            <form class="form-inline">
                                <div class="form-group">
                                    <label >Search</label>
                                    <input type="text" ng-model="search" class="form-control" placeholder="Search">
                                </div>
                            </form>

                            <div class="bs-component" ng-controller="listdata">
                                <table class="table table-striped table-hover">
                                  <thead>
                                    <tr>
                                       <!--   <th>Account Id</th>
                                        <th>Initial Capital ($)</th>
                                        <th>Coin Price ($)</th>
                                        <th>Coins Before Trade (B)</th>
                                        <th>Coins Value Before Trade ($)</th>
                                        <th>Market Order ($)</th>
                                        <th>Commission (%)</th>
                                        <th>Coins Amount ($)</th>
                                        <th>Capital Amount ($)</th>
                                        <th>Total Amount ($)</th>
                                        <th>Benefit (%)</th>
                                        <th>Time</th>-->
                                        <th ng-click="sort('account_id')">Account Id
                                            <span class="glyphicon sort-icon" ng-show="sortKey=='account_id'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                        </th>
                                        <th ng-click="sort('initial_capital')">Initial Capital ($)
                                            <span class="glyphicon sort-icon" ng-show="sortKey=='initial_capital'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                        </th>
                                        <th ng-click="sort('coin_price')">Coin Price ($)
                                            <span class="glyphicon sort-icon" ng-show="sortKey=='coin_price'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                        </th>
                                        <th ng-click="sort('coins')">Coins Before Trade (B)
                                            <span class="glyphicon sort-icon" ng-show="sortKey=='coins'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                        </th>
                                        <th ng-click="sort('coins_value')">Coins Value Before Trade ($)
                                            <span class="glyphicon sort-icon" ng-show="sortKey=='coins_value'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                        </th>
                                        <th ng-click="sort('coin_market_order')">Market Order ($)
                                            <span class="glyphicon sort-icon" ng-show="sortKey=='coin_market_order'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                        </th>
                                        <th ng-click="sort('commission')">Commission (%)
                                            <span class="glyphicon sort-icon" ng-show="sortKey=='commission'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                        </th>
                                        <th ng-click="sort('coins_amount')">Coins Amount ($)
                                            <span class="glyphicon sort-icon" ng-show="sortKey=='coins_amount'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                        </th>
                                        <th ng-click="sort('capital_amount')">Capital Amount ($)
                                            <span class="glyphicon sort-icon" ng-show="sortKey=='capital_amount'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                        </th>
                                        <th ng-click="sort('total_amount')">Total Amount ($)
                                            <span class="glyphicon sort-icon" ng-show="sortKey=='total_amount'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                        </th>
                                        <th ng-click="sort('benefit')">Benefit (%)
                                            <span class="glyphicon sort-icon" ng-show="sortKey=='benefit'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                        </th>
                                        <th ng-click="sort('created_at')">Time
                                            <span class="glyphicon sort-icon" ng-show="sortKey=='created_at'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr ng-repeat="history in historyData|orderBy:sortKey:reverse|filter:search">
                                       <td>@{{history.account_id}}</td>
                                        <td>@{{history.initial_capital}}</td>
                                        <td>@{{history.coin_price}}</td>
                                        <td>@{{history.coins}}</td>
                                        <td>@{{history.coins_value}}</td>
                                        <td>@{{history.coin_market_order}}</td>
                                        <td>@{{history.commission}}</td>
                                        <td>@{{history.coins_amount}}</td>
                                        <td>@{{history.capital_amount}}</td>
                                        <td>@{{history.total_amount}}</td>
                                        <td>@{{history.benefit}}</td>
                                        <td>@{{history.created_at}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Angular.js -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
@endsection
