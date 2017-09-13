{{ Form::open(array('url'=>$typeName,'method'=>'post', 'class'=>'form_access' )) }}
{{csrf_field()}}
<input type="hidden" name="site_id" value="{{$site}}"/>

<div class="form-group">
    <input type="text" class="form-control form_access_input" placeholder="{{$typeName}}:name" name="name"
           required="required"/>
</div>

@foreach($accessFields as $accessField)
    <div class="form-group">
        <input class="form-control form_access_input"
               @if($accessField->field != 'password')
               type="text"
               @else
               type="password"
               @endif

               placeholder="{{$typeName.':'.strtolower($accessField->field)}}" name="{{$accessField->field}}"

               @if($accessField->default)
               value="{{$accessField->default}}"
               @endif

               @if($accessField->required == 1)
               required="required"
                @endif
        />
    </div>
@endforeach

<button type="button" class="btn btn-default" id="test_access">
    <i class="fa fa-question-circle" aria-hidden="true"></i> Test the connection
</button>
{{ Form::close() }}

<script>
    $('document').ready(function () {
        $('#test_access').click(function () {


            $('#test_access i').removeClass();
            $('#test_access i').addClass('fa');
            $('#test_access i').addClass('fa-spinner');

            $('.form_access_input').prop('readonly', 'readonly');

            if ($('#test_access').attr('type') == 'submit') {

                if( vertifInputRequired() )
                {
                    return true;
                }
            }

            $('#test_access').prop('type', 'button');

            var datas = $('.form_access').serialize();

            console.log(datas);

            function connectionValidation(validation) {
                if (validation == 1) {
                    $('#test_access').removeClass('btn-default');
                    $('#test_access').addClass('btn-success');

                    $('#test_access').prop('type', 'submit');
                    $('#test_access').html('<i class="fa fa-plus-circle"></i> Add access');

                }
                else {
                    $('#test_access').removeClass('btn-default');
                    $('#test_access').addClass('btn-danger');

                    $('#test_access').prop('type', 'button');

                    $('#test_access').html('<i class="fa fa-exclamation-circle"></i> Test the connection');
                }

                $('.form_access_input').prop('readonly', '');
            }

            $.ajax({
                url: '{{$connectionRoute}}',
                type: 'POST',
                dataType: 'html',
                data: datas,

                success: function (validation, statut) {
                    connectionValidation(validation);
                },

                error: function (resultat, statut, erreur) {
                    console.log('Erreur AJAX');
                }
            });
        });

        $('.form_access_input').on('keyup', function () {
            $('#test_access').removeClass();
            $('#test_access').addClass('btn');
            $('#test_access').addClass('btn-default');

            $('#test_access').html('<i class="fa fa-question-circle"></i> Test the connection');
        });

        function vertifInputRequired() {
            var notRenseigned = 0;

            jQuery.each($('.form_access_input'), function (i, val) {

                if ($(this).attr('required') == 'required') {
                    var valueInput = $(this).val();

                    if (valueInput == '') {
                        $(this).css('border', '1px red solid');

                        notRenseigned = 1;
                    }
                }
            });

            if(notRenseigned == 1) {
                return false;
            }
            else {
                return true;
            }
        }
    });
</script>