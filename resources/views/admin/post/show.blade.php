@extends('admin.layouts.app')


@section('main-content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Posts</h1>
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
                    @can('posts.create', Auth::user())
                        <a class="offset-lg-5 btn btn-primary" href="{{ route('post.create') }}">Add New Post</a>
                    @endcan
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Slug</th>
                            <th>Create Time</th>
                            <th>Body</th>
                            @can('posts.update', Auth::user())
                            <th>Edit</th>
                            @endcan
                            @can('posts.delete', Auth::user())
                            <th>Delete</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->subtitle }}</td>
                                <td>{{ $post->slug }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->body }}</td>

                                @can('posts.update', Auth::user())
                                    <td><a href="{{ route('post.edit', $post->id) }}"><i class="fa fa-fw fa-edit"></i></a></td>
                                    <td>
                                @endcan

                                 @can('posts.delete', Auth::user())

                                        <form id="delete-form-{{ $post->id }}" method="post" action="{{ route('post.destroy', $post->id )}}" style="display: none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <a href="" onclick="
                                            if(confirm('Are You Sure You Want To Delete This?'))
                                            {
                                                event.preventDefault();document.getElementById('delete-form-{{ $post->id }}').submit();
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
