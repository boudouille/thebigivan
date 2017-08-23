@extends('layouts.app')

{{--{{dd($creator)}}--}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading">
                        <h2>{{$project->name}}</h2>
                        <div>
                            Created at {{date('d/m/Y',strtotime($project->created_at))}} by {{$creator->name}}
                        </div>
                        <hr>
                        <div style="text-align: justify; font-size: 0.9em;">
                            {{$project->description}}
                        </div>
                    </div>
                    <div class="panel-body">

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

