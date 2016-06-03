@extends('layouts.app')

@section('htmlheader_title')
    Coin Base Accounts
@endsection

<link rel=stylesheet href="{{asset('css/style-table-responsive.css')}}" type="text/css">

@yield('scripts')

@include('alert::alert')

@section('main-content')
    <div class="container spark-screen">
        <div class="row">

            <p id="bitcoin-price"></p>

            <div class="col-md-10 col-md-offset-1">

                {!! Form::open(array('url' => 'accounts', 'method' => 'post', 'class' => 'form', 'novalidate' => 'novalidate')) !!}
                <div class="form-group">
                    <label for="usr">Title :</label>
                    <input v-model="newAccount.title" type="text" class="form-control" id="title" name="title">
                    <label for="usr">Initial capital ($):</label>
                    <input v-model="newAccount.capital" type="text" class="form-control" id="initialCapital" name="initialCapital">
                    <label for="usr"></label>
                    <button :disabled="!isValid" type="submit" class="btn btn-primary btn-block btn-flat" id="create-account">Create Account</button>
                </div>
                {{--<div class="alert alert-danger" v-if="!isValid">--}}
                    {{--<ul>--}}
                        {{--<li v-show="!validation.title">Title cannot be empty.</li>--}}
                        {{--<li >Please provide a valid capital amount.</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
                {{--<div class="alert alert-success" transition="success" v-if="success">The Account is ready to activate.</div>--}}
                {!! Form::close() !!}

                <!--
                <div class="alert alert-danger" v-if="!isValid">
                    <ul>
                        <li v-show="!validation.name">Title cannot be empty.</li>
                        <li v-show="!validation.initial_capital">Please provide a valid capital amount.</li>
                    </ul>
                </div>

                <form action="#" @submit.prevent="AddNewAccount" method="POST">
                    <div class="form-group">
                        <label for="name">Account Title</label>
                        <input v-model="newAccount.name" type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="initial_capital">Account Initial Capital</label>
                        <input v-model="newAccount.initial_capital" type="text" id="initial_capital" name="initial_capital" class="form-control">
                    </div>
                    <div class="form-group">
                        <button :disabled="!isValid" class="btn btn-primary" type="submit">Add New Account</button>
                    </div>
                </form>
                -->

                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Coin Base Accounts</h3></div>
                    <div class="panel-body">
                        <div class="table-responsive" id="AccountsController">

                            <table class="table">
                                <thread>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>ACCOUNT</th>
                                    <th>INITIAL CAPITAL ($)</th>
                                    <th>BALANCE ($)</th>
                                    <th>ACTIVE</th>
                                    <th></th>
                                </thread>

                                <tbody>
                                <tr v-for="account in accounts">
                                    <td>@{{ account.id }}</td>
                                    <td>@{{ account.name }}</td>
                                    <td>@{{ account.account_id }}</td>
                                    <td>@{{ account.initial_capital }}</td>
                                    <td>@{{ account.balance }}</td>
                                   <td>@{{ account.active }}</td>
                                    <td>
                                        <button v-show="!isActive" name="activate" id="activate"  class="btn btn-primary btn-block btn-flat" @click="activateAccount(account.id)">Activate/Disable</button>
                                        <button  name="remove" id="remove" class="btn btn-danger btn-block btn-flat" @click="removeAccount(account.id)">Remove</button>
                                    </td>
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
    <script src="{{ asset('/js/vue.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/accounts-vue.js') }}" type="text/javascript"></script>


@endsection

