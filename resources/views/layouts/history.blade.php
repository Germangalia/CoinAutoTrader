@extends('layouts.app')

@section('htmlheader_title')
    Coin Base History
@endsection

@yield('scripts')

@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Coin Base History</h3></div>
                    <div class="panel-body">
                        <div id="HystoryController">

                            <div class="bs-component" ng-controller="listdata">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Account Id</th>
                                        <th>Initial Capital</th>
                                        <th>Coin Price</th>
                                        <th>Coins Before Trade</th>
                                        <th>Coins Value Before Trade</th>
                                        <th>Market Order</th>
                                        <th>Commission</th>
                                        <th>Coins Amount</th>
                                        <th>Capital Amount</th>
                                        <th>Total Amount</th>
                                        <th>Benefit</th>
                                        <th>Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr ng-repeat="history in historyData">
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

@endsection
