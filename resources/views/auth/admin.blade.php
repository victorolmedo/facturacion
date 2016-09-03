@extends('master.index')

@section('head')
    <link href="{{asset('css/chosen/chosen.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/chosen/chosen-bootstrap.css')}}" rel="stylesheet" />
    <script src="{{asset('/js/chosen/chosen.jquery.min.js')}}"></script>
    <style>
        select.form-control + .chosen-container.chosen-container-single .chosen-single {
            border-radius:0!important;
            height: 41px!important;
            padding: 9px 12px!important;
        }
        .chosen-container-single .chosen-single div b {
            margin-top: 5px;
        }
    </style>
    <script>
        $(document).ready(function() {
            var configuracion = {disable_search: true, ignore: ":hidden:not(select)", no_results_text: "No results matched" };

            $("#lst_resolUser").chosen(configuracion);
            $("#lst_roles").chosen(configuracion);

            $("#add-user").click(function () {
                clear();
                $('#reset-password').hide();
                $('#passwords').show();
                if($('#data-user').is(":visible")) {
                    $('#data-user').slideUp();
                }
                else {
                    $('#data-user').slideDown();
                    getUserResol(null);
                }
            });
            $("#btn_save").click(function () {
                if(validate()) {

                    $.ajax({
                        type: 'POST',
                        url: "{{URL::to('auth/admin/save')}}" ,
                        dataType: 'JSON',
                        data: getData(),
                        beforeSend: function(){
                            $("#loading").show();
                        },
                        success: function (data){
                            $("#loading").hide();
                            if (data.result){
                                $("#edit_message").text("{{trans('admin.save-ok')}}");
                                $("#edit_alert").addClass("alert-success");
                                $("#edit_alert").removeClass("alert-danger");
                                clear();

                                $('#data-user').slideUp();
                                setTimeout(function(){
                                    $("#edit_alert").hide();
                                }, 5000);

                            } else {
                                $("#edit_message").text("{{trans('admin.save-ko')}} " + data.error);
                                $("#edit_alert").removeClass("alert-success");
                                $("#edit_alert").addClass("alert-danger");
                            }
                            $("#edit_alert").show();
                        },

                        error: function(errors){
                            $("#loading").hide();
                            console.log(errors);
                        }
                    });
                }
            });

            $("#btn_cancel").click(function() {
                $('#data-user').slideUp();
                clear();
            });

            $("#tbl_users .edit").click(function() {
               var id= $(this).prev().val();
                $.ajax({
                    type: 'GET',
                    url: "{{URL::to('/user/')}}/"+id ,
                    async:true,
                    dataType: 'JSON',
                    beforeSend: function(){
                        $("#loading").show();
                        $('#reset-password').show();
                        $('#passwords').hide();
                        clear();
                        getUserResol(id);

                    },
                    success: function (data){
                        $("#loading").hide();
                        $('#id').val(data.id);

                        $('#txt_name').val(data.name);
                        $('#txt_email').val(data.email);

                        $.each(data.role_user, function(i,e){
                            $("#lst_roles option[value='" + e.role_id + "']").prop("selected", true);
                        });
                        $('#lst_resolUser').val(data.res_id);

                        $('#lst_roles').trigger("chosen:updated");
                        $('#lst_resolUser').trigger("chosen:updated");
                        $('#txt_password').removeAttr('required');
                        $('#txt_repassword').removeAttr('required');

                        $('#data-user').slideDown();
                    },

                    error: function(errors){
                        console.log(errors);
                        $("#loading").hide();
                    }
                });
            });

            $("#tbl_users .delete").click(function() {
                var id = $(this).prev().prev().val();
                var name = $(this).parent().parent().find('.name').text();
                $('#id_delete').val(id);
                $('#user-delete').text(name);

                $('#modalDelete').modal();
            });

            $("#btn_delete").click(function() {

                $.ajax({
                    type: 'DELETE',
                    url: "{{URL::to('/user/')}}/"+$('#id_delete').val() ,
                    dataType: 'JSON',
                    data: { _token: $("#csrf_token").attr("content")},
                    beforeSend: function(){
                        $("#loading").show();
                    },
                    success: function (data){
                        $("#loading").hide();
                        $('#tr_'+$('#id_delete').val()).remove();
                        $('#modalDelete').modal('toggle');
                    },

                    error: function(errors){
                        $("#loading").hide();
                        console.log(errors);
                    }
                });

            });

            $('#ch_reset').change(function() {
                if($(this).is(":checked")) {
                    $('#passwords').slideDown();
                    $("#txt_password").prop('required',true);
                    $("#txt_repassword").prop('required',true);
                } else {
                    $('#passwords').slideUp();
                    $('#txt_password').removeAttr('required');
                    $('#txt_repassword').removeAttr('required');
                }
            });

            function clear(){

                $('#ch_reset').attr('checked', false);
                $('#txt_name').val('');
                $('#txt_email').val('');
                $('#txt_password').val('');
                $('#txt_repassword').val('');
                $("#txt_email").prop('disabled', false);

                $("#lst_roles option").prop("selected", false);
                $('#lst_roles').trigger("chosen:updated");
                $("#txt_password").prop('required',true);
                $("#txt_repassword").prop('required',true);
                $("#id").val('');
                $("#lst_resolUser").val('');
                $('#lst_resolUser').trigger("chosen:updated");

            }

            function validate(){
                if ($.trim($('#txt_name').val()) == ""){
                    showError("{{ trans(('admin.error-name')) }}");
                    return false;
                }
                if (!validateEmail($.trim($('#txt_email').val()))){
                    showError("{{ trans(('admin.error-email')) }}");
                    return false;
                }

                if ($('#lst_roles').val() == null){
                    showError("{{ trans(('admin.error-rol')) }}");
                    return false;
                }
                if ((($('#ch_reset').is(':checked')) &&($('#reset-password').is(':visible'))) || (!$('#reset-password').is(':visible'))) {
                    if ($.trim($('#txt_password').val()) == ""){
                        showError("{{ trans(('admin.error-password-empty')) }}");
                        return false;
                    }
                    if($('#txt_password').val() != $('#txt_repassword').val()){
                        showError("{{ trans(('admin.error-password')) }}");
                        return false;
                    }
                }
                return true;
            }

            function getData(){
                var resetpas = false;
                if ((($('#ch_reset').is(':checked')) &&($('#reset-password').is(':visible'))) || (!$('#reset-password').is(':visible'))) {
                    resetpas = true;
                }


                var data=  {
                    _token: $("#csrf_token").attr("content"),
                    id:$('#id').val(),
                    name: $('#txt_name').val(),
                    email:$('#txt_email').val(),
                    resolUser:$('#lst_resolUser').val(),
                    password:$('#txt_password').val(),
                    roles:$('#lst_roles').val(),
                    reset:resetpas
                };
                return data;
            }

            function showError(error) {
                $("#lbl_error").html(error);
                $('#modalError').modal({backdrop: 'static'});
            }

            function validateEmail(email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            }

            function getUserResol(id) {
                $.ajax({
                    type: 'GET',
                    url: "{{URL::to('/userResol/')}}/",
                    async: true,
                    data:{user: id},
                    dataType: 'JSON',
                    beforeSend: function () {
                        $("#lst_resolUser").empty();
                        $('#lst_resolUser').append('<option value="">{{trans('admin.unassigned')}}</option>');
                    },
                    success: function (data) {

                        console.log(data);
                        $.each(data, function (i, item) {
                            console.log(i);
                            $('#lst_resolUser').append('<option value="' + item.id + '">' + item.name + '</option>');
                        });

                        $('#lst_resolUser').trigger("chosen:updated");

                    },

                    error: function (errors) {
                        console.log(errors);
                        $("#loading").hide();
                    }
                });
            }



        });
        </script>
@endsection
@section('content')

        <diw class="row">
            <div class="col-md-12">
                <div id="edit_alert" class="alert alert-success alert-dismissable" style="display: none;" >
                    <button type="button" class="close" data-dismiss="alert">{{utf8_encode('×')}}</button>
                    <span id="edit_message"></span>
                </div>
            </div>
        </diw>
        <h3>@role('admin') {{trans('admin.menu')}} @else {{trans('admin.menu-comercial')}} @endrole<i id="add-user" class="fa fa-plus-circle font-size-40 pointer"></i></h3>

        <div id="data-user" style="display: none;">
            @role('admin')
            <?php $class = 'col-xs-3'; ?>
                @else
            <?php $class = 'col-xs-4'; ?>
            @endrole

                {!! Form::hidden('id', '', array('id' => 'id')) !!}
                <div class="row">
                    <div class="{{$class}} form-group">
                        {!! Form::label('txt_name', trans('admin.name')) !!}
                        {!! Form::text('name', '', array('id' => 'txt_name' , 'class' => 'form-control input-text', 'placeholder' => trans('admin.name'), 'required' => 'required', 'title' => '' )) !!}
                    </div>
                    <div class="{{$class}} form-group">
                        {!! Form::label('txt_email', trans('admin.email')) !!}
                        {!! Form::email('email', '', array('id' => 'txt_email' , 'class' => 'form-control input-text', 'placeholder' => trans('admin.email'), 'required' => 'required', 'title' => '' )) !!}
                    </div>
                    <div class="{{$class}} form-group role">
                        {!! Form::label('lst_roles', trans('admin.role')) !!}
                        <select class="form-control role" id="lst_roles" name="roles[]" multiple="true" data-placeholder="{{trans('result.selected')}}" required>
                            <option></option>
                            @foreach($roles as $row)
                                <option value={{ $row->id }}>{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @role('admin')
                        <div class="col-xs-3 form-group role">
                            {!! Form::label('lst_resolUser', trans('admin.user-resol')) !!}
                            <select class="form-control role" id="lst_resolUser" name="resolUser" data-placeholder="{{trans('result.selected')}}" required>
                                <option value="">{{trans('admin.unassigned')}}</option>
                                @foreach($userResol as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endrole
                </div>
                <div id="reset-password" class="row col-xs-12" style="display: none">
                    <div class="checkbox">
                        <label>
                            <input name="ch_reset" id="ch_reset" type="checkbox" value="1">
                            {{trans('admin.reset-password')}}
                        </label>
                    </div>
                </div>
                <div id="passwords"  class="row">
                    <div class="col-xs-4 form-group">
                        {!! Form::label('txt_password', trans('admin.password')) !!}
                        {!! Form::password('password', array('id' => 'txt_password' , 'class' => 'form-control input-text','required' => 'required', 'placeholder' => trans('admin.password') )) !!}
                    </div>
                    <div class="col-xs-4 form-group">
                        {!! Form::label('txt_repassword', trans('admin.re-password')) !!}
                        {!! Form::password('repassword', array('id' => 'txt_repassword' , 'class' => 'form-control input-text','required' => 'required', 'placeholder' => trans('admin.re-password') )) !!}
                    </div>
                </div>
                <div class="row bottom-20">
                    <div class="col-xs-8"></div>
                    <div class="col-xs-4 text-right">
                        {!! Form::submit(trans('admin.save'), array('id'=> 'btn_save', 'class' => 'btn btn-success') ) !!}
                        {!! Form::button(trans('admin.cancel'), array('id'=> 'btn_cancel', 'class' => 'btn btn-default   ') ) !!}
                        </div>
                </div>
        </div>

        <diw class="row">
            <div class="col-xs-8"></div>
            <div class="col-xs-4">
                {!! Form::open(array('url' => Request::url() )) !!}
                {!! Form::text('searchName', '', array('id' => 'txt_searchName' , 'class' => 'form-control input-text', 'placeholder' => trans('admin.search-name'), 'required' => 'required', 'title' => '' )) !!}
                {!! Form::close() !!}
            </div>
        </diw>

        <div id="tbl_users">
            <table class="table">
                <tr>
                    <th>Nombre</th>
                    <th>E-Mail</th>
                    <th>{{utf8_encode('Acción')}}</th>
                </tr>
                @foreach($users as $user)
                    <tr id="tr_{{$user->id}}">
                        <td><span class="name">{{$user->name}}</span></td>
                        <td><span class="e-mail">{{$user->email}}</span></td>
                        <td>
                            {!! Form::hidden(null, $user->id, array('class' => 'id')) !!}
                            <i class="fa fa-pencil-square-o edit"></i>
                            @role('admin') <i class="fa fa-times red delete"></i> @endrole
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $users->appends(['name' => $req->name])->render() !!}
        </div>




    <div class="modal" id="modalDelete">
        <div class="modal-dialog modal-md">
            <div class="modal-content panel-danger" style="border-radius: 0;" >

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::hidden('id_delete', '', array('id' => 'id_delete')) !!}
                                {{trans('admin.deletemsg')}} <span id="user-delete"></span>?
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {!! Form::button(trans('admin.delete'), array('id'=> 'btn_delete', 'class' => 'btn btn-success') ) !!}
                    <button type="button" class="btn btn-default closeModalError" data-dismiss="modal">{{trans('admin.cancel')}}</button>
                </div>
            </div>
        </div>
    </div>

@endsection