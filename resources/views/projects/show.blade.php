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
                        <div><a href="/thebigivan/public/projects"><i class="fa fa-caret-square-o-left"
                                                                      aria-hidden="true"></i> Return on the projects
                                page</a></div>
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
                        @include('projects.sites.sites_show',['sites'=>$sites])

                        @if($admin)
                            @include('projects.sites.site_create',['project'=>$project])
                        @endif

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
        });
    </script>


@endsection
