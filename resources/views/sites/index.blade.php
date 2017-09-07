@extends('layouts.app')

@section('content')

    <div class="row" id="site_header">
        <div class="container" id="site_bloc">
            <div class="row">
                <span id="back_to_project">
                    <a href="{{route('projects.show',$site->project_id)}}">
                        <i class="fa fa-caret-square-o-left" aria-hidden="true"></i> Back to project
                    </a>
                </span>
            </div>
            <div class="row">
                {{ Form::open(array('url'=>'sites/'.$site->id,'method'=>'put')) }}
                {{ csrf_field() }}
                <div class="col-lg-4">
                    <div>
                        {{ Form::text('name',$site->name,array(
                            'required'=>'required',
                            'readonly'=>'readonly',
                            'id'=>'site_update_name',
                            'class' => 'site_update_input'
                        )) }}
                    </div>
                    <p>
                        created by <b>{{$site->creator()->first()->name}}</b> updated
                        at {{date('d/m/Y',strtotime($site->updated_at))}}
                    </p>
                </div>
                <div class="col-lg-7" id="site_description">
                    {{ Form::textarea('description',$site->description,array(
                            'required' => 'required',
                            'readonly' => 'readonly',
                            'id' => 'site_update_description',
                            'class' => 'site_update_input',
                            'size' => '30x5'
                        )) }}
                </div>
                <div class="col-lg-1" id="bloc_modify_site">
                    <button type="button" id="modify_site"><i class="fa fa-cog"></i></button>
                </div>
                {{ Form::close() }}
            </div>
        </div>

        <hr>

        <div class="container" id="add_access_bloc">
            @include('sites.add_access',['site'=>$site])
        </div>

    </div>

    @include('accesses.index',$site)




    <script>
        $('document').ready(function () {

            $('.navbar').css('marginBottom', 0);

            function resize() {
                var heightSiteBloc = $('#site_bloc').height();
                $('#bloc_modify_site').height(heightSiteBloc);
            }

            resize();

            $('window').resize(function () {
                resize();
            });

            //For updating project

            var modify_site = 0;
            var name_site = $('#site_update_name').val();
            var description_site = $('#site_update_description').val();

            $('#modify_site').click(function () {
                if (modify_site == 0) {
                    $('#modify_site').css('color', '#3097D1');

                    $('#site_update_name').removeAttr('readonly');
                    $('#site_update_description').removeAttr('readonly');
                    $('#site_update_name').css('borderBottom', '1px green solid');
                    $('#site_update_description').css('border', '1px green solid');

                    modify_site = 1;
                }
                else {
                    $('#modify_site').css('color', '#000000');
                    $('#site_update_name').attr('readonly', 'readonly');
                    $('#site_update_description').attr('readonly', 'readonly');
                    $('#site_update_name').css('borderBottom', '0');
                    $('#site_update_description').css('border', '0');

                    modify_site = 0;
                }
            });


            /// Verify if data change to show the update button

            function verifChange(previousname, newname, previousdescription, newdescription) {
                if (newname == previousname && newdescription == previousdescription) {
                    $('#modify_site i').removeClass('fa-cog');
                    $('#modify_site i').addClass('fa-check');

                    $('#modify_site').prop('type', 'button');
                }
                else {
                    $('#modify_site i').removeClass('fa-check');
                    $('#modify_site i').addClass('fa-cog');

                    $('#modify_site').prop('type', 'submit');
                }
            }

            $('.site_update_input').on('keypress', function () {
                var name_site_new = $('#site_update_name').val();
                var description_site_new = $('#site_update_description').val();

                verifChange(name_site, name_site_new, description_site, description_site_new)
            });

            $('.site_update_input').on('keyup', function () {
                var name_site_new = $('#site_update_name').val();
                var description_site_new = $('#site_update_description').val();

                verifChange(name_site, name_site_new, description_site, description_site_new)
            });

            //------------------------------------------------------------------------------------//
        });
    </script>
@endsection