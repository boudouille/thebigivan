@extends('layouts.app')

{{--{{dd($creator)}}--}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="panel">
                    <div class="panel-heading">
                        <div>Collaborators</div>
                        <div id="div_add_collaborator">
                            <form action="/thebigivan/public/collaborators/store" method="post"
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
                    </div>
                    <div class="panel-body">
                        <p style="font-weight: bold;"><a target="_blank"
                                                         href="users/{{$creator->id}}">{{$creator->email}}
                                - {{$creator->name}}</a></p>
                        @foreach($collaborators as $collaborator)
                            <div class="row">
                                <div class="col-lg-10">
                                    @if(isset($collaborator->user->name))
                                        <a target="_blank"
                                           href="users/{{$collaborator->user->id}}">{{$collaborator->user->email}}
                                            - {{$collaborator->user->name}}</a>
                                    @else
                                        {{$collaborator->email}}
                                    @endif
                                </div>
                                <div class="col-lg-2">
                                    <i onclick="deleteUserProject()" class="fa fa-times delete_col_project"
                                       val="{{$collaborator->email}}"
                                       title="Delete {{$collaborator->email}} from the project" aria-hidden="true"></i>
                                </div>
                            </div>
                        @endforeach
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

                    </div>

                </div>

            </div>
        </div>
    </div>

    <script>
        function deleteUserProject() {
            console.log('ahha');
        }
    </script>


@endsection
