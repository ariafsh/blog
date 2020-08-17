@extends('admin.layouts.app')

@section('main-content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="card card-primary  col-lg-10">

                    @if(count($errors) > 0)

                        @foreach($errors->all() as $error)
                            <p class="alert alert-danger"> {{ $error }}</p>
                        @endforeach

                    @endif

                    <div class="card-header">
                        <h3 class="card-title">Publish</h3>
                    </div>
                    <form role="form" action="{{ route('post.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                            </div>

                            <div class="form-group">
                                <label for="subtitle">Sub-Title</label>
                                <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter Sub-Title">
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Slug">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="file" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Select Tags</label>
                                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]">

                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Select Category</label>
                                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="categories[]">

                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Post some Blogs
                                        <small>(Simple and fast)</small>
                                    </h3>
                                </div>
                                <div class="box-body pad">
                                    <textarea class="textarea" placeholder="Place some text here" name="body" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('post.index') }}" class="btn btn-warning">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>

@endsection
