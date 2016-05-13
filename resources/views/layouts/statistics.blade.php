@extends('layouts.app')

@section('htmlheader_title')
    Coin Base Statistics
@endsection

<link rel=stylesheet href="{{asset('css/app.css')}}" type="text/css">

@yield('scripts')

@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Statistics Index</h3></div>
                    <div class="panel-body">
                        <div id="StatisticsController">

                            <form id="main" v-cloak>

                                <div class="bar">
                                    <!-- Create a binding between the searchString model and the text field -->

                                    <input type="text" v-model="searchString" placeholder="Enter your search terms" />
                                </div>

                                <ul class="list">
                                    <!-- Render a li element for every entry in the items array. Notice
                                         the custom search filter "searchFor". It takes the value of the
                                         searchString model as an argument. -->

                                    <li v-for="i in articles | searchFor searchString">
                                        <a v-bind:href="i.url"><img v-bind:src="i.image" /></a>
                                        <p>@{{i.title}}</p>
                                        <div>@{{i.value}}</div>
                                    </li>
                                </ul>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- VUE.js -->
    <script src="{{ asset('/js/vue.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/accounts-vue.js') }}" type="text/javascript"></script>

@endsection

