@extends('layouts.app')

@section('htmlheader_title')
    Coin Base Acounts
@endsection

@yield('scripts')

@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                {!! Form::open(array('action' => 'AccountsController@createAccount')) !!}
                <div class="form-group">
                    <label for="usr">Title :</label>
                    <input type="text" class="form-control" id="title">
                    <label for="usr">Initial capital ($):</label>
                    <input type="text" class="form-control" id="initial-capital">
                    <label for="usr"></label>
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Create Account</button>

                </div>
                {!! Form::close() !!}

                <div class="panel panel-default">
                    <div class="panel-heading">Coin Base Acounts</div>

                    <div class="panel-body">

                        <div id="live-data"></div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    $(document).ready(function(){
        function fetch_data(){
            $.ajax({
                url:"select.php",
                method:"POST",
                success:function(data){
                    $('#live-data').html(data);
                }
            });
        }
    })
</script>