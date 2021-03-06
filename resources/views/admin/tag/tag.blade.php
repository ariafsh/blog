@extends('admin.layouts.app')

@section('main-content')
    <div class="content-wrapper col-lg-10">
        <section class="content">
            <div class="row">
                <div class="card card-primary">

                    @if(count($errors) > 0)

                        @foreach($errors->all() as $error)
                            <p class="alert alert-danger"> {{ $error }}</p>
                        @endforeach

                    @endif

                    <div class="card-header">
                        <h3 class="card-title">Tag</h3>
                    </div>
                    <form role="form" action="{{ route('tag.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="tag">Tag Title</label>
                                <input type="text" class="form-control" id="tag" name="tag" placeholder="Enter tag">
                            </div>

                            <div class="form-group">
                                <label for="slug">Tag Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Slug">
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('tag.index') }}" class="btn btn-warning">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
