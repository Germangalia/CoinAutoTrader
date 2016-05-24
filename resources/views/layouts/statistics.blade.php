@extends('layouts.app')

@section('htmlheader_title')
    Coin Base Statistics
@endsection

<link rel=stylesheet href="{{asset('css/app.css')}}" type="text/css">
<link rel=stylesheet href="{{asset('css/style-table-responsive.css')}}" type="text/css">

@yield('scripts')

@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Statistics Index</h3></div>
                    <div class="panel-body">
                        <div class="table-responsive" id="StatisticsController">

                            <!-- VUE.js -->
                            {{--<form id="main" v-cloak>--}}

                                {{--<div class="bar">--}}
                                    {{--<!-- Create a binding between the searchString model and the text field -->--}}

                                    {{--<input type="text" v-model="searchString" placeholder="Enter your search terms" />--}}
                                {{--</div>--}}

                                {{--<ul>--}}
                                    {{--<!-- Render a li element for every entry in the items array. Notice--}}
                                         {{--the custom search filter "searchFor". It takes the value of the--}}
                                         {{--searchString model as an argument. -->--}}

                                    {{--<li v-for="i in articles | searchFor searchString">--}}
                                        {{--<a v-bind:href="i.url"><img v-bind:src="i.image" /></a>--}}
                                        {{--<p>@{{i.title}}</p>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}

                            {{--</form>--}}


                            <!-- REACT.js -->
                            {{--<div id="container">--}}
                                {{--<!-- This element's contents will be replaced with your component. -->--}}
                                {{----}}
                            {{--</div>--}}


                            <!-- Javascript.js -->
                            <table id="statistic-table">
                                <thead>
                                <tr>
                                    <th>UPLOAD</th>
                                    <th>STATISTIC ITEM</th>
                                    <th class="numeric">VALUE</th>
                                    <th class=>UNIT</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><button onclick="uploadTag('../api/statistics/getSumInitialCapital', 'statistic-table', 1, 3)" class="btn btn-primary">Upload</button></td>
                                    <td>Total Initial Capital</td>
                                    <td id="TotatlInitialCapital"></td>
                                    <td class="fa fa-usd"></td>
                                </tr>
                                <tr>
                                    <td><button onclick="uploadTag('../api/statistics/getCapital', 'statistic-table', 2, 3)" class="btn btn-primary">Upload</button></td>
                                    <td>Total Capital Amount</td>
                                    <td id="TotatalCapitalAmount" class="numeric"></td>
                                    <td class="fa fa-usd"></td>
                                </tr>
                                <tr>
                                    <td><button onclick="uploadTag('../api/statistics/getBitcoins', 'statistic-table', 3, 3)" class="btn btn-primary">Upload</button></td>
                                    <td>Total Bitcoins Amount</td>
                                    <td id="TotalBitcoinAmount" class="numeric"></td>
                                    <td class="fa fa-btc"></td>
                                </tr>
                                <tr>
                                    <td><button onclick="uploadTag('../api/statistics/getTotal', 'statistic-table', 4, 3)" class="btn btn-primary">Upload</button></td>
                                    <td>Total Amount</td>
                                    <td id="TotalAmount" class="numeric"></td>
                                    <td class="fa fa-usd"></td>
                                </tr>
                                <tr>
                                    <td><button onclick="uploadTag('../api/statistics/getAvgInitialCapital', 'statistic-table', 5, 3)" class="btn btn-primary">Upload</button></td>
                                    <td>Average Initial Capital</td>
                                    <td id="AverageInitialCapital" class="numeric"></td>
                                    <td class="fa fa-usd"></td>
                                </tr>
                                <tr>
                                    <td><button onclick="uploadTag('../api/statistics/getAvgCapital', 'statistic-table', 6, 3)" class="btn btn-primary">Upload</button></td>
                                    <td>Average Capital Amount</td>
                                    <td id="AverageCapitalAmount" class="numeric"></td>
                                    <td class="fa fa-usd"></td>
                                </tr>
                                <tr>
                                    <td><button onclick="uploadTag('../api/statistics/getAvgBitcoins', 'statistic-table', 7, 3)" class="btn btn-primary">Upload</button></td>
                                    <td>Average Capital Bitcoins</td>
                                    <td id="AverageCapitalBitcoin" class="numeric"></td>
                                    <td class="fa fa-btc"></td>
                                </tr>
                                <tr>
                                    <td><button onclick="uploadTag('../api/statistics/getAvgBenefit', 'statistic-table', 8, 3)" class="btn btn-primary">Upload</button></td>
                                    <td>Average Actual Benefit</td>
                                    <td id="AverageActualBeneficit" class="numeric"></td>
                                    <td>%</td>
                                </tr>
                                <tr>
                                    <td><button onclick="uploadTag('../api/statistics/getAvgTotal', 'statistic-table', 9, 3)" class="btn btn-primary">Upload</button></td>
                                    <td>Average Total Amount</td>
                                    <td id="AverageTotalAmount" class="numeric"></td>
                                    <td class="fa fa-usd"></td>
                                </tr>
                                <tr>
                                    <td><button onclick="uploadTag('../api/statistics/getBitcoinPrice', 'statistic-table', 10, 3)" class="btn btn-primary">Upload</button></td>
                                    <td>Actual Bitcoin Price</td>
                                    <td id="ActualBitcoinPrice" class="numeric"></td>
                                    <td class="fa fa-usd"></td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- VUE.js -->
    {{--<script src="{{ asset('/js/vue.js') }}" type="text/javascript"></script>--}}
    {{--<script src="{{ asset('/js/statistics-vue.js') }}" type="text/javascript"></script>--}}
    <!-- REACT.js -->
    {{--<script src="http://fb.me/react-0.10.0.min.js"></script>--}}
    {{--<script src="{{ asset('/js/statistics-react.js') }}" type="text/javascript"></script>--}}
    <!-- Javascript.js -->
    <script src="{{ asset('/js/statistics-javascript.js') }}" type="text/javascript"></script>

@endsection

