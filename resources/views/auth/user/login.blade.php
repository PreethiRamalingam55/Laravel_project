@extends('layouts.app')
@section('titlePage', 'Login') 
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card">
        <div class="card-body p-5">
            <h5 class="text-center">User Login</h5>
            @include('common.alert')
            <form action="{{ route('user.login') }}" method="post">
                @csrf
                <label for="account_number">Account Number</label>
                <input type="text" name="account_number" id="account_number" class="form-control mb-2">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control mb-2">
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>    
@endsection
