@extends('layouts.app')



@section('content')
    <div class="col-lg-12 ">
        <h1><i class="fa fa-users"></i> User Administration
            <a href="{{url('user/add')}}" class="btn btn-success pull-right">{{trans('admin.add')}}</a>
        </h1>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th>{!! trans('admin.name') !!}</th>
                    <th>{!! trans('admin.email') !!}</th>
                    <th>{!! trans('admin.date-create') !!}</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>

                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                        <td>
                            <a href="{{url('/user/edit/'.$user->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                            {{ Form::open(['url' => route('user-delete',$user->id) , 'method' => 'DELETE']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop