@extends('layouts.app')

@section('htmlheader_title')
    Coin Base Acounts
@endsection

@yield('scripts')

@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                {!! Form::open(array('url' => 'accounts', 'method' => 'post', 'class' => 'form', 'novalidate' => 'novalidate')) !!}
                <div class="form-group">
                    <label for="usr">Title :</label>
                    <input v-model="newAccount.title" type="text" class="form-control" id="title" name="title">
                    <label for="usr">Initial capital ($):</label>
                    <input v-model="newAccount.capital" type="text" class="form-control" id="initialCapital" name="initialCapital">
                    <label for="usr"></label>
                    <button :disabled="!isValid" type="submit" class="btn btn-primary btn-block btn-flat">Create Account</button>
                </div>
                <div class="alert alert-danger" v-if="!isValid">
                    <ul>
                        <li v-show="!validation.title">Title cannot be empty.</li>
                        <li >Please provide a valid capital amount.</li>
                    </ul>
                </div>
                <div class="alert alert-success" transition="success" v-if="success">The Account is ready to activate.</div>
                {!! Form::close() !!}
                <div class="panel panel-default">
                    <div class="panel-heading">Coin Base Accounts</div>
                    <div class="panel-body">
                        <div id="AccountsController">

                            <table class="table">
                                <thread>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>ACCOUNT</th>
                                    <th>WALLET ADDRESS</th>
                                    <th>INITIAL CAPITAL</th>
                                    <th>BALANCE</th>
                                    <th>ACTIVE</th>
                                    <th></th>
                                </thread>

                                <tbody>
                                <tr v-for="account in accounts">
                                    <td>@{{ account.id }}</td>
                                    <td>@{{ account.name }}</td>
                                    <td>@{{ account.account_id }}</td>
                                    <td>@{{ account.wallet_address }}</td>
                                    <td>@{{ account.initial_capital }}</td>
                                    <td>@{{ account.balance }}</td>
                                    <td>@{{ account.active }}</td>
                                    <td>
                                        <button v-show="!isActive" class="btn btn-success btn-sm" @click="activateAccount(account.id)">Activate/Disable</button>
                                        <button class="btn btn-danger btn-sm" @click="removeAccount(account.id)">Remove</button>
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

@endsection

