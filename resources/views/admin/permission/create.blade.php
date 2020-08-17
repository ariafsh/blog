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
                        <h3 class="card-title">Permission</h3>
                    </div>
                    <form role="form" action="{{ route('permission.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Permission</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Permission">
                            </div>
                            <div class="form-group">
                                <label for="for">Permission For</label>
                                <select name="for" id="for" class="form-control">
                                    <option selected disable>Select Permission For</option>
                                    <option value="user">User</option>
                                    <option value="post">Post</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('permission.index') }}" class="btn btn-warning">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
