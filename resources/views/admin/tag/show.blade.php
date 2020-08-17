@extends('admin.layouts.app')

@section('main-content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tags</h1>
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
                    <a class="offset-lg-5 btn btn-primary" href="{{ route('tag.create') }}">Add New Tag</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($tags as $tag)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $tag->tag }}</td>
                                <td>{{ $tag->slug }}</td>
                                <td><a href="{{ route('tag.edit', $tag->id) }}"><i class="fa fa-fw fa-edit"></i></a></td>
                                <td>
                                    <form id="delete-form-{{ $tag->id }}" method="post" action="{{ route('tag.destroy', $tag->id )}}" style="display: none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a href="" onclick="
                                        if(confirm('Are You Sure You Want To Delete This?'))
                                        {
                                        event.preventDefault();document.getElementById('delete-form-{{ $tag->id }}').submit();
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
