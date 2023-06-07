@extends('layout.app')

@section('title', 'Projects')

@section('content')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

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

        .postit {
            -webkit-box-shadow: -1px 0px 5px 0px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: -1px 0px 5px 0px rgba(0, 0, 0, 0.75);
            box-shadow: -1px 0px 5px 0px rgba(0, 0, 0, 0.75);
        }
    </style>
    <div class="row d-flex justify-content-center">
        @foreach ($projects as $project)
            <div class="col-sm d-flex justify-content-center m-2" style="z-index: {{ $project->id }}">
                <div id="p{{ $project->id }}" style="height: 200px; width: 200px;" class="postit">
                    <div class="topBar p-1">
                        <b>{{ $project->title }}</b>
                    </div>
                    <div class="form">
                        <div contenteditable class=textAria>
                            {{ $project->description }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <script>
        $(function() {
            @foreach ($projects as $project)
                $("#p{{ $project->id }}").draggable({
                    handle: '.topBar',
                });
            @endforeach
        });
    </script>
    @include('shared.toast')
@endsection
