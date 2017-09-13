{{--{{dd($site)}}--}}

<div class="row" id="mysql_scripts_bloc">

    @if(isset($site->mysqlAccesses))
        @foreach($site->mysqlAccesses as $mysql)
            <div class="row access_item">
                <div class="col-lg-4 access_item_blocname">
                    <div class="row">
                        <div class="col-lg-2 access_item_blocname_img">
                            <img src="https://orig01.deviantart.net/1000/f/2008/353/c/1/mysql_dock_icon_by_presto_x.png"
                                 width="80%"/>
                        </div>
                        <div class="col-lg-8 access_item_blocname_name">
                            {{$mysql->name}}
                        </div>
                        <div class="col-lg-1 access_item_moderate">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                        </div>
                        <div class="col-lg-1 access_item_moderate">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>


                <div class="col-lg-8 access_item_scripts">
                    <div  class="row">
                        <div class="col-lg-2" id="add_script_btn_{{$mysql->id}}">
                            <button id="create_script_{{$mysql->id}}" class="btn btn-default create_script"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add a script</button>
                        </div>

                        <div class="col-lg-10 box_script" id="box_script_{{$mysql->id}}">
                            <div class="col-lg-6">
                                <div class="row mysql_script_close">
                                    <div class="col-lg-10">Add a new script - {{$mysql->name}}</div>
                                    <div class="col-lg-2" style="text-align: right;">
                                        <i class="fa fa-times box_script_close" aria-hidden="true" id="box_script_close_{{$mysql->id}}"></i>
                                    </div>
                                </div>
                                {{ Form::open(array('url'=>'mysqlscripts','method'=>'post')) }}
                                {{csrf_field()}}
                                <input type="hidden" value="{{$mysql->id}}" name="mysql_access_id" />
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="script:name"/>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="script" placeholder="script:script"></textarea>
                                </div>

                                <button type="submit" class="btn btn-default"><i class="fa fa-plus-square"></i> Add</button>
                                {{ Form::close() }}
                            </div>
                        </div>
                        <div class="col-lg-10" style="overflow-x: visible;">
                            @foreach($mysql->mysqlScripts as $script)
                                <button class="btn btn-success" onclick="window.location.href='{{route('mysqlscript_execute',$script->id)}}'">{{$script->name}}</button>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>
</div>
@endforeach


@endif

</div>


<script>
    $('document').ready(function () {
        $('.create_script').click(function () {
            var AccessId = this.id.substr(14);

            $('#add_script_btn_'+AccessId).hide();
            $('#box_script_'+AccessId).show();
        });

        $('.box_script_close').click(function(){
            var AccessId = this.id.substr(17);

            $('#box_script_'+AccessId).hide();
            $('#add_script_btn_'+AccessId).show();
        });
    });
</script>
