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
                    <div class="panel-heading"><h3>Capital Evolution</h3></div>
                    <div class="panel-body">
                        <button id="chargeId" onclick="chargeDropList()" class="btn btn-primary">Upload Accounts</button>
                        <br>
                        <div>

                            <form id="myForm">
                                <lavel>Select a account: </lavel>
                                <select id="selectNumber"></select>

                            </form>
                            <br>
                            <button id="loadgraphic" onclick="chargeOnLoad()" class="btn btn-success btn-block btn-flat">Load Graphic</button>
                        </div>

                        <div id="BenefitEvolutionController">

                            <canvas id="myLineChart" width="100%" height="100%"></canvas>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Chart.js -->
    <script src="{{ asset('/js/Chart.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/statistics-capital-evolution.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}" type="text/javascript"></script>

@endsection