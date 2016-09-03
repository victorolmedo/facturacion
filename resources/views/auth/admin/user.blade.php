@extends('layouts.app')

@section('head')
    <link href="{{asset('css/chosen/chosen.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/chosen/chosen-bootstrap.css')}}" rel="stylesheet" />
    <script src="{{asset('/js/chosen/chosen.jquery.min.js')}}"></script>

    <script>
        $(document).ready(function() {
            var configuracion = {disable_search: true, ignore: ":hidden:not(select)", no_results_text: "No results matched" };
            $("#lst_roles").chosen(configuracion);

            $('#ch_reset').change(function() {
                if($(this).is(":checked")) {
                    $('#passwords').slideDown();
                } else {
                    $('#passwords').slideUp();
                }
            });
        });
    </script>
@endsection



@section('content')

        <div class='col-lg-8 col-md-offset-4'>
            <h1><i class='fa fa-user'></i> {{ (!$update?trans('admin.add'):trans('admin.edit'))}}</h1>

                <form class="form-horizontal" role="form" method="POST" action="{{ (!$update? route('user-create') : route('user-update',$user->id) ) }}">
                    {!! csrf_field() !!}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                        <div class="col-md-6">
                            {{ Form::label('', trans('admin.name'), ['class'=>'control-label']) }}
                            {{ Form::text('name', (!$update? old('name'):$user->name), ['id'=> 'name', 'placeholder' => 'Name', 'class' => 'form-control']) }}
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <div class="col-md-6">
                            {{ Form::label('email', trans('admin.email'), ['class'=>'control-label']) }}
                            {{ Form::email('email',(!$update? old('email'):$user->email) , ['placeholder' => 'Email', 'class' => 'form-control']) }}

                            @if ($errors->has('email'))

                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">

                        <div class="col-md-6">
                            {{ Form::label('email', trans('admin.role'), ['class'=>'control-label']) }}
                            <select class="form-control role" id="lst_roles" name="roles[]" multiple="true" data-placeholder="{{trans('admin.role')}}" >
                                <option></option>
                                @foreach($roles as $row)
                                    <option value={{ $row->id }} @if( (!empty($userRole))  && (in_array($row->id, $userRole))) selected @endif>{{ $row->name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('roles'))

                                <span class="help-block">
                                        <strong>{{ $errors->first('roles') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    @if($update)
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input name="reset" id="ch_reset" type="checkbox" value="1" @if(old('reset')) checked @endif>
                                    {{trans('admin.reset-password')}}
                                </label>
                            </div>
                        </div>
                    @endif

                    <div id="passwords" @if($update && old('reset')!= 1) style="display: none;" @endif>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                {{ Form::label('password', trans('admin.password'), ['class'=> 'control-label']) }}
                                {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) }}

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('') ? ' has-error' : '' }}">
                            <div class="col-md-6">

                                {{ Form::label('password_confirmation', trans('admin.password_confirmation'), ['class'=> 'control-label']) }}
                                {{ Form::password('password_confirmation', ['placeholder' => 'Password', 'class' => 'form-control']) }}

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-md-6 ">


                            <button type="submit" class="btn btn-primary pull-right">
                                <i class="fa fa-btn fa-user" style="margin-right: 5px"></i>{{(!$update?trans('admin.add'):trans('admin.edit'))}}
                            </button>
                            <a href="{{url('admin')}}" class="btn btn-default pull-right" style="margin-right: 10px;">{{ trans('admin.cancel')}}</a>
                        </div>
                    </div>
                </form>
        </div>
@stop