@extends('backend.layouts.master')
@section('title', 'Role Eidt')
@section('content')

    <div class="card card-primary">
        <form action="{{ route('admin.roles.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="userName">Role Name</label>
                    <input type="text" name="name" class="form-control" id="userName" placeholder="Enter Name">
                </div>
                <div class="row">

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body text-left">
                                <div class="shadow-none bg-light p-2 mb-3 rounded border border-3 border-success">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1"
                                            value="option1">
                                        <label for="customCheckbox1" class="custom-control-label">Sellect All</label>
                                    </div>
                                </div>
                                @foreach ($permissions as $permission)
                                    <div class="p-2">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox"
                                                id="peromisson-{{ $permission->id }}" name="permissions[]"
                                                value="{{ $permission->id }}">
                                            <label for="peromisson-{{ $permission->id }}"
                                                class="custom-control-label">{{ $permission->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body text-left">
                                <div class="shadow-none bg-light p-2 mb-3 rounded border border-3 border-success">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1"
                                            value="option1">
                                        <label for="customCheckbox1" class="custom-control-label">Sellect All</label>
                                    </div>
                                </div>
                                <div class="p-2">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1"
                                            value="option1">
                                        <label for="customCheckbox1" class="custom-control-label">Custom Checkbox</label>
                                    </div>
                                </div>
                                <div class="p-2">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1"
                                            value="option1">
                                        <label for="customCheckbox1" class="custom-control-label">Custom Checkbox</label>
                                    </div>
                                </div>
                                <div class="p-2">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1"
                                            value="option1">
                                        <label for="customCheckbox1" class="custom-control-label">Custom Checkbox</label>
                                    </div>
                                </div>
                                <div class="p-2">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1"
                                            value="option1">
                                        <label for="customCheckbox1" class="custom-control-label">Custom Checkbox</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create User</button>
            </div>
        </form>
    </div>
@endsection
