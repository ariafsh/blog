@extends('admin.layouts.app')

@section('main-content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Permissions</h1>
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
                    <a class="offset-lg-5 btn btn-primary" href="{{ route('permission.create') }}">Add New Permission</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Permission For</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->for }}</td>
                                <td><a href="{{ route('permission.edit', $permission->id) }}"><i class="fa fa-fw fa-edit"></i></a></td>
                                <td>
                                    <form id="delete-form-{{ $permission->id }}" method="post" action="{{ route('permission.destroy', $permission->id )}}" style="display: none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a href="" onclick="
                                        if(confirm('Are You Sure You Want To Delete This?'))
                                        {
                                        event.preventDefault();document.getElementById('delete-form-{{ $permission->id }}').submit();
                                        }else{
                                        event.preventDefault();
                                        }"><i class="fa fa-fw fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </section>

@endsection
