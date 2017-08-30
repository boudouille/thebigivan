@if(count($sites) == 0)
    <i>There are no sites in this projects... Create one !</i>
@else
    <ul class="list-group" id="sites_list">
        {{--        {{dd($sites)}}--}}
        @foreach($sites as $site)
            <li class="list-group-item">
                <div class="row">
                    <div class="col-lg-11 site_mini_head">
                        <span class="float: left; padding-left: 10px;">
                            <b style="font-size: 1.1em;"><a href="{{route('sites.show',$site->id)}}">{{$site->name}}</a></b>
                             <span style="font-size: 0.8em;">created by <b>{{$site->creator->name}}</b></span></span>
                        <span style="float: right; font-style: italic; padding-right: 10px;">Modified : {{$site->updated_at->diffForHumans()}}</span>
                    </div>
                    <div class="col-lg-1 site_mini_close">
                        {{ Form::open(array('url'=>'sites/'.$site->id,'method'=>'delete')) }}
                        {{ csrf_field() }}
                        {{ Form::hidden('id',$site->id) }}
                        <button type="submit" class="delete_site_project" name="{{$site->name}}"><i class="fa fa-times" aria-hidden="true"></i></button>
                        {{ Form::close()  }}
                    </div>
                </div>
                <div class="row site_description">
                    <hr>
                    <span style="padding: 15px;">{{$site->description}}</span>
                </div>
            </li>
        @endforeach
    </ul>

@endif

<script>
    $('document').ready(function(){
        $('.delete_site_project').on('click', function () {

            if (!confirm('Are you sure that you want to delete the site : ' + $(this).attr('name') + ' from the project ?')) {
                return false;
            }
        });
    });
</script>