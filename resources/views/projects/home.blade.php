{{--If we are concerned about a/many projects--}}

@if(count($projects))

    <h2 align="center">Created by me</h2>
    <div class="row col-md-offset-2">

        @foreach($projects as $project)
{{--            {{dd($project->collaborators()->get())}}--}}
            <div class="col-lg-2 mini_project" onclick="window.location.href = 'projects/{{$project->id}}'">
                <h3>{{$project->name}}</h3>
                <p class="mini_project_info">By : {{$project->creator->name}}</p>
                <p class="mini_project_info">At : {{date('d/m/Y',strtotime($project->created_at))}}</p>
                <p class="mini_project_description">{{$project->description}}</p>
{{--                {{dd($project->collaborators())}}--}}
                <p class="mini_project_info">{{count($project->collaborators()->get())." ".str_plural('collaborator',count($project->collaborators()->get()))}} </p>
                {{--<p class="mini_project_info">{{count($project->collaborators)}} collaborator(s)</p>--}}
            </div>

        @endforeach

    </div>

@endif

{{--{{dd($shared)}}--}}

@if(count($shared))
    <h2 align="center">Shared with me</h2>
    <div class="row col-md-offset-2">

        @foreach($shared as $project)
            <div class="col-lg-2 mini_project" onclick="window.location.href = 'projects/{{$project->id}}'">
                <h3>{{$project->name}}</h3>
                <p class="mini_project_info">By : {{$project->creator->name}}</p>
                <p class="mini_project_info">At : {{date('d/m/Y',strtotime($project->created_at))}}</p>
                <p class="mini_project_description">{{$project->description}}</p>
                <p class="mini_project_info">{{count($project->collaborators()->get())." ".str_plural('collaborator',count($project->collaborators()->get()))}} </p>
            </div>

        @endforeach

    </div>

@endif