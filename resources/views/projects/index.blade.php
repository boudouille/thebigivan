@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span id="show_project_create">
                            <i class="fa fa-plus-square" aria-hidden="true"></i> <b>Add a new project</b>
                        </span>
                    </div>

                    <div class="panel-body" id="project_create">
                        {{  Form::open(array('url' => 'projects', 'method' => 'post')) }}
                        {{ csrf_field() }}

                        <div class="form-group">
                            {{ Form::label('name', 'Name of the project') }}
                            {{ Form::text('name', '',
                                array(
                                    'required' => 'required',
                                    'class'=>'form-control',
                                    'id'=>'project_name',
                                    'aria-describedby'=>'project_name_help',
                                    'placeholder'=>'Enter the project name',
                                    ))}}
                            <small id="project_name_help" class="form-text text-muted">The name will be unique</small>
                        </div>

                        <div class="form-group">
                            {{ Form::label('description', 'Description : ')}} <br/>
                            {{ Form::textarea('description', '',
                                array(
                                    'required' => 'required',
                                    'class'=>'form-control',
                                    'placeholder'=>'Enter a description of the project'
                                    ))  }}
                        </div>

                        <div class="form-group">
                            {{ Form::button('Create', ['type' => 'submit', 'class'=>'btn btn-primary btn-mini'])}}
                        </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('projects.home')

    <script>
        $(document).ready(function(){
            //Show or hide the project
            $('#show_project_create').click(function(){
                if($('#show_project_create i').hasClass('fa-plus-square'))
                {
                    $('#project_create').show();
                    $('#show_project_create i').removeClass('fa-plus-square');
                    $('#show_project_create i').addClass('fa-minus-square');
                }
                else
                {
                    $('#project_create').hide();
                    $('#show_project_create i').addClass('fa-plus-square');
                    $('#show_project_create i').removeClass('fa-minus-square');
                }

            });
        });

    </script>
@endsection
