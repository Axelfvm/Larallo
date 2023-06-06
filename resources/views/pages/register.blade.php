@extends('layout.app')

@section('title', 'Register')

@section('content')
    <div class="container bg-white rounded mt-3 p-3">
        <form method="POST" action="{{ route('user.register') }}">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" name="email" id="inputEmail4">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" name="password" id="inputPassword4">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Full Name</label>
                <input type="text" class="form-control" name="fullname" id="inputAddress">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    @include('shared.errors')
@endsection
