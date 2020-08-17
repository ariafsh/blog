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
                        <h3 class="card-title">Edit Profile</h3>
                    </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">User Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ Auth::user()->name }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email ID</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ Auth::user()->email }}">
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone" value="{{ Auth::user()->phone }}">
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" value="{{ Auth::user()->username }}">
                            </div>

                            <hr>

                        </div>
                        <div class="card-footer">
                            <a href="{{ route('edit') }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('user.index') }}" class="btn btn-warning">Back</a>
                        </div>
                </div>
            </div>
        </section>
    </div>
@endsection
