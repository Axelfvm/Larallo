@extends('layout.app')

@section('title', 'Projects')

@section('content')
    <style>
        @import url(https://fonts.googleapis.com/css?family=Lato);

        .topBar {
            z-index: 1;
            position: absolute;
            width: 200px;
            height: 40px;
            background-color: #f39c12;
        }

        .form {
            margin-top: 40px;
            position: absolute;
            width: 200px;
            height: 160px;
            background-color: #f1c40f;
        }

        .textAria {
            position: absolute;
            border-color: red;
            width: 180px;
            height: 140px;
            position: absolute;
            margin: 10px;
            font-family: 'Lato', sans-serif;
            overflow: hide;
        }

        .textAria:focus {
            outline: 0;
        }
    </style>
    <div class="row">
        @foreach ($projects as $project)
            <div class="col-sm m-2">
                <div style="height: 250px; width: 250px;">
                    <div id="postIt m-2">
                        <div class="topBar p-1">
                            <b>{{ $project->description }}</b>
                        </div>
                        <div class="form">
                            <div contenteditable class=textAria>
                                Hello, <b>Edit Me First</b> Then Drag & Drop me.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @include('shared.toast')
@endsection
