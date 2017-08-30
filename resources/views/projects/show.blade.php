@extends('layouts.app')

{{--{{dd($sites)}}--}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="panel">
                    <div class="panel-heading">
                        <div>Collaborators</div>
                        @if($admin == 1)
                            <div id="div_add_collaborator">
                                <form action="{{route('collaborators.store')}}" method="post"
                                      id="form_add_collaborator">
                                    {{csrf_field()}}
                                    <input type="hidden" name="project_id" value="{{$project->id}}"/>
                                    <div class="input-group">
                                        <input type="email" name="email" class="form-control"
                                               placeholder="Add a collaborator email">
                                        <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="submit">Add</button>
                                    </span>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                    <div class="panel-body">
                        <p style="font-weight: bold; font-size: 1.1em;">
                            <a target="_blank" href="users/{{$creator->id}}">
                                {{$creator->email}} - {{$creator->name}}
                            </a>
                        </p>

                        @include('collaborators.show',['collaborators'=>$admins,'collab_admin'=>1])

                        @if(count($members) > 0)
                            <hr>
                        @endif

                        @include('collaborators.show',['collaborators'=>$members,'collab_admin'=>0])

                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel">
                    <div class="panel-heading">
                        <div style="overflow: auto;">
                            <span style="float: left;">
                                <a href="{{route('projects.index')}}">
                                    <i class="fa fa-caret-square-o-left" aria-hidden="true"></i> Return on the projects page
                                </a>
                            </span>
                            <span id="update_project">
                                <i class="fa fa-cog" aria-hidden="true" id="modify_project"
                                   title="Modify project informations"></i>
                            </span>
                        </div>

                        {{ Form::open(array('url'=>'projects/'.$project->id,'method'=>'put')) }}
                        {{ csrf_field() }}

                        {{ Form::text('name',$project->name,array(
                            'required'=>'required',
                            'readonly'=>'readonly',
                            'id'=>'project_update_name',
                            'class' => 'project_update_input'
                        )) }}
                        {{--<h2>{{$project->name}}</h2>--}}

                        <div>
                            Created at {{date('d/m/Y',strtotime($project->created_at))}} by {{$creator->name}}
                        </div>
                        <hr>

                        {{ Form::textarea('description',$project->description,array(
                            'required' => 'required',
                            'readonly' => 'readonly',
                            'id' => 'project_update_description',
                            'class' => 'project_update_input'
                        )) }}

                        <div align="center">
                            <button type="submit" class="btn btn-success" id="project_update_submit">
                                <i class="fa fa-check" aria-hidden="true"></i> Validate changes
                            </button>
                        </div>


                        {{ Form::close() }}
                    </div>
                    <div class="panel-body">

                        @if($admin)
                            @include('projects.sites.site_create',['project'=>$project])
                        @endif

                        @include('projects.sites.sites_show',['sites'=>$sites])
                    </div>

                </div>

            </div>
        </div>
    </div>

    <script>
        $('document').ready(function () {
            $('.delete_col_project').on('click', function () {

                if (!confirm('Are you sure that you want to delete ' + $(this).attr('name') + ' from the project ?')) {
                    return false;
                }
            });

            var modify_project = 0;
            var name_project = $('#project_update_name').val();
            var description_project = $('#project_update_description').val();

            $('#modify_project').click(function () {
                if (modify_project == 0) {
                    $('#project_update_name').removeAttr('readonly');
                    $('#project_update_description').removeAttr('readonly');
                    $('#project_update_name').css('borderBottom', '1px green solid');
                    $('#project_update_description').css('border', '1px green solid');

                    modify_project = 1;
                }
                else {
                    $('#project_update_name').attr('readonly', 'readonly');
                    $('#project_update_description').attr('readonly', 'readonly');
                    $('#project_update_name').css('borderBottom', '0');
                    $('#project_update_description').css('border', '0');

                    modify_project = 0;
                }
            });


            /// Verify if data change to show the update button

            function verifChange(previousname, newname, previousdescription, newdescription) {
                if (newname == previousname && newdescription == previousdescription) {
                    $('#project_update_submit').hide()
                }
                else {
                    $('#project_update_submit').show();
                }
            }

            $('.project_update_input').on('keypress', function () {
                var name_project_new = $('#project_update_name').val();
                var description_project_new = $('#project_update_description').val();

                verifChange(name_project, name_project_new, description_project, description_project_new)
            });

            $('.project_update_input').on('keyup', function () {
                var name_project_new = $('#project_update_name').val();
                var description_project_new = $('#project_update_description').val();

                verifChange(name_project, name_project_new, description_project, description_project_new)
            });
        });
    </script>


@endsection
