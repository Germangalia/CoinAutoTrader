@extends('layouts.app')

@section('htmlheader_title')
    Coin Base Statistics
@endsection

<link rel=stylesheet href="{{asset('css/app.css')}}" type="text/css">

@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Benefit Evolution</h3></div>
                    <div class="panel-body">
                        <div id="BenefitEvolutionController">

                            <canvas id="myLineChart" width="100%" height="100%"></canvas>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Chart.js -->
    <script src="{{ asset('/js/char.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/statistics-benefit-evolution.js') }}" type="text/javascript"></script>

@endsection