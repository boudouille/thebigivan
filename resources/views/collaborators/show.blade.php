@foreach($collaborators as $collaborator)
    <div class="row"
         @if($collab_admin == 1)
         style="font-weight: bold;"
            @endif
    >
        <div class="col-lg-9">
            @if(isset($collaborator->user->name))
                <a target="_blank"
                   href="users/{{$collaborator->user->id}}">{{$collaborator->user->email}}
                    - {{ucwords($collaborator->user->name)}}</a>
            @else
                {{$collaborator->email}}
            @endif
        </div>


        @if($admin && ( (isset($collaborator->user->id) && $collaborator->user->id != $myId) || !isset($collaborator->user->id)))

            {{--Upgrade or downgrade the member / admin--}}
            @if($collab_admin)
                <div class="col-lg-1">
                    {{  Form::open(array('url' => 'collaborators/'.$collaborator->id, 'method' => 'put')) }}
                    {{ csrf_field() }}

                    {{ Form::hidden('collaborator_id', $collaborator->id,
                    array(
                        'required' => 'required',
                        'class'=>'collaborator_id'
                        ))}}

                    <button type="submit" class="downgrade_col_project" title="Downgrade {{$collaborator->email}} to member">
                        <i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i>
                    </button>

                    {{ Form::close() }}
                </div>
            @else
                <div class="col-lg-1">
                    {{  Form::open(array('url' => 'collaborators/'.$collaborator->id, 'method' => 'put')) }}
                    {{ csrf_field() }}

                    {{ Form::hidden('collaborator_id', $collaborator->id,
                    array(
                        'required' => 'required',
                        'class'=>'collaborator_id'
                        ))}}

                    <button type="submit" class="upgrade_col_project" title="Upgrade {{$collaborator->email}} to admin">
                        <i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i>
                    </button>

                    {{ Form::close() }}
                </div>
            @endif


            {{--Delete the user--}}

            <div class="col-lg-1">
                {{  Form::open(array('url' => 'collaborators/'.$collaborator->id, 'method' => 'delete')) }}
                {{ csrf_field() }}

                {{ Form::hidden('collaborator_id', $collaborator->id,
                array(
                    'required' => 'required',
                    'class'=>'collaborator_id'
                    ))}}

                <button type="submit" class="delete_col_project" title="Delete {{$collaborator->email}} from the project">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>

                {{ Form::close() }}
            </div>
        @endif

    </div>
@endforeach