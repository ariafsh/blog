@extends('admin.layouts.app')

@section('main-content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">

            <div class="card">

                <div class="card-header">
                    @can('users.create', Auth::user())
                        <a class="offset-lg-5 btn btn-primary" href="{{ route('user.create') }}">Add New Users</a>
                    @endcan
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Assigned Role</th>
                            <th>Status</th>
                            @can('users.update', Auth::user())
                                <th>Edit</th>
                            @endcan
                            @can('users.delete', Auth::user())
                                <th>Delete</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $user->name }}</td>

                                <td>
                                @foreach($user->roles as $role)
                                    {{ $role->role }} ,
                                    @endforeach
                                </td>

                                <td>{{ $user->status? 'Active' : 'Not Active'}}</td>

                                @can('users.update', Auth::user())
                                    <td><a href="{{ route('user.edit', $user->id) }}"><i class="fa fa-fw fa-edit"></i></a></td>
                                    <td>
                                @endcan

                                        @can('users.delete', Auth::user())

                                    <form id="delete-form-{{ $user->id }}" method="post" action="{{ route('user.destroy', $user->id )}}" style="display: none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a href="" onclick="
                                        if(confirm('Are You Sure You Want To Delete This?'))
                                        {
                                        event.preventDefault();document.getElementById('delete-form-{{ $user->id }}').submit();
                                        }else{
                                        event.preventDefault();
                                        }"><i class="fa fa-fw fa-trash"></i></a>
                                </td>
                                @endcan

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </section>

@endsection
