{{--If we are concerned about a/many projects--}}

@if(count($projects))
{{--    {{dd($projects)}}--}}
    <div class="row col-md-offset-2">

        @foreach($projects as $project)

            <div class="col-lg-2 mini_project" onclick="window.location.href = 'projects/{{$project->id}}'">
                <h3>{{$project->name}}</h3>
                <p class="mini_project_info">By : {{$project->creator->name}}</p>
                <p class="mini_project_info">At : {{date('d/m/Y',strtotime($project->created_at))}}</p>
                <p class="mini_project_description">{{$project->description}}</p>
                <p class="mini_project_info">{{count($project->collaborators)}} collaborator(s)</p>
            </div>

        @endforeach

    </div>

@endif