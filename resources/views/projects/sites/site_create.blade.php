<div class="panel-heading">
    <span id="show_site_create">
        <i class="fa fa-plus-square" aria-hidden="true"></i> <b>Add a new website</b>
    </span>
</div>

<div class="panel-body" id="site_create">
    {{  Form::open(array('url' => 'sites', 'method' => 'post')) }}
    {{ csrf_field() }}

    <div class="form-group">
        {{ Form::label('name', 'Name of the website') }}
        {{ Form::text('name', '',
            array(
                'required' => 'required',
                'class'=>'form-control',
                'id'=>'project_name',
                'aria-describedby'=>'site_name_help',
                'placeholder'=>'Enter the website name',
                ))}}
        <small id="site_name_help" class="form-text text-muted">The name will be unique</small>
    </div>

    {{ Form::hidden('project_id', $project->id)}}

    <div class="form-group">
        {{ Form::label('description', 'Description : ')}} <br/>

        {{ Form::textarea('description', '',
            array(
                'required' => 'required',
                'class'=>'form-control',
                'placeholder'=>'Enter a description of the website'
                ))  }}
    </div>

    <div class="form-group">
        {{ Form::button('Create', ['type' => 'submit', 'class'=>'btn btn-primary btn-mini'])}}
    </div>

    {{ Form::close() }}
</div>

<script>
    $(document).ready(function () {
        //Show or hide the project
        $('#show_site_create').click(function () {
            if ($('#show_site_create i').hasClass('fa-plus-square')) {
                $('#site_create').show();
                $('#show_site_create i').removeClass('fa-plus-square');
                $('#show_site_create i').addClass('fa-minus-square');
            }
            else {
                $('#site_create').hide();
                $('#show_site_create i').addClass('fa-plus-square');
                $('#show_site_create i').removeClass('fa-minus-square');
            }

        });
    });

</script>