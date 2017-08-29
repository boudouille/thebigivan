@if(count($sites) == 0)
    <i>There are no sites in this projects... Create one !</i>
@else
    <ul class="list-group" id="sites_list">
        {{--        {{dd($sites)}}--}}
        @foreach($sites as $site)
            <li class="list-group-item">
                <div class="row">
                    <div class="col-lg-12">
                        <span class="float: left; padding-left: 10px;"><b>{{$site->name}}</b> <span style="font-size: 0.8em;">created by <b>{{$site->creator->name}}</b></span></span>
                        <span style="float: right; font-style: italic; padding-right: 10px;">Modified : {{$site->updated_at->diffForHumans()}}</span>
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
</script>