<div id="add_access_bloc">
    <div id="bloc_show_add_access" align="center">
        <span id="show_add_access">
            <i aria-hidden="true" class="fa fa-plus-square"></i> <b>Add a new access</b>
        </span>
    </div>
    <div id="add_access" class="row">
        <div class="col-lg-4 col-lg-offset-4" style="text-align: center" id="existing_accesses">

            <div id="existing_accesses_bloc">
                @if(count($accessTypes))
                    <select class="selectpicker" data-live-search="true" id="select_access_type"
                            name="select_access_type">
                        <option value="{{0}}">Select an access type</option>
                        @foreach($accessTypes as $accessType)
                            <option data-tokens="{{$accessType->name}}" id="access_type_{{$accessType->id}}" value="{{$accessType->id}}">{{$accessType->name}}</option>
                        @endforeach
                    </select>

                    <br>

                    <div id="ajax_access_fields">

                    </div>
                @else
                    <div><i>There a no existing access type, create one...</i></div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    $('document').ready(function () {
        $('#select_access_type').on('change', function () {
            var typeId = $('#select_access_type').val();
            var typeName = $('#access_type_'+typeId).attr('data-tokens');

            //If the Id type is not passed
            if (typeId == 0) {
                $('#ajax_access_fields').html('');
            }
            else {
                $.ajax({
                    url: '{{route('ajaxSelectFields')}}',
                    type: 'POST',
                    dataType: 'html',
                    data: {'_token':'{{csrf_token()}}','access_type_id':typeId,'access_type_name':typeName, 'site': '{{$site->id}}' },

                    success: function (code_html, statut) {
                        $('#ajax_access_fields').html(code_html)
                    },

                    error: function (resultat, statut, erreur) {
                        console.log('Erreur AJAX');
                    }
                });
            }
            console.log(typeId);
        });
    });

</script>