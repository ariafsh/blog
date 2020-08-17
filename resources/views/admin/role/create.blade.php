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
                        <h3 class="card-title">Roles</h3>
                    </div>
                    <form role="form" action="{{ route('role.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="role">Role Name</label>
                                <input type="text" class="form-control" id="role" name="role" placeholder="Enter Role">
                            </div>
                            <div>
                                <label for="name">Post Permission</label>
                                @foreach($permissions as $permission)
                                    @if($permission->for == 'post')
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <hr>
                            <div>
                                <label for="name">User Permission</label>
                                @foreach($permissions as $permission)
                                    @if($permission->for == 'user')
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <hr>
                            <div>
                                <label for="name">other Permissions</label>
                                @foreach($permissions as $permission)
                                    @if($permission->for == 'other')
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('role.index') }}" class="btn btn-warning">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
