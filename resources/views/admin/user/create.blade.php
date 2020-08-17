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
                        <h3 class="card-title">Add Admin</h3>
                    </div>
                    <form role="form" action="{{ route('user.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">User Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                            </div>

                            <div class="form-group">
                                <label for="email">Email ID</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone">
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="status" value="1">Status</label>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group">
                                <label>Assign Role</label>
                                <div class="row">
                                    @foreach($roles as $role)
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="role[]" value="{{ $role->id }}">  {{ $role->role }}</label>
                                            </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('user.index') }}" class="btn btn-warning">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
