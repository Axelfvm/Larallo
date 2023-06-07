@extends('layout.app')

@section('title', 'Project Make')

@section('content')

    <div class="container bg-white rounded mt-3 p-3">
        <form method="POST" action="{{ route('projects.make') }}">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>
                <div class="form-group col-md-6">
                    <label for="type">Type</label>
                    <select class="form-control" name="type" id="type">
                        <option>Private</option>
                        <option>Public</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" name="password" id="inputPassword4">
            </div>
            <button type="submit" class="btn btn-primary">Make</button>
        </form>
    </div>

    @include('shared.toast')

@endsection
