@extends('backend.layouts.master')
@section('title', 'User Create')
@push('css')
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
@endpush
@section('content')

    <div class="card card-primary">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="userName">User Name</label>
                    <input type="text" name="name" class="form-control" id="userName" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="userEmail">Email address</label>
                    <input type="email" name="email" class="form-control" id="userEmail" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="userPassword">Password</label>
                    <input type="password" name="password" class="form-control" id="userPassword" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>

                <div class="form-group" data-select2-id="30">
                    <label>Role Assign</label>
                    <div class="select2-purple" data-select2-id="29">
                        <select name="roles[]" class="select2 select2-hidden-accessible" multiple=""
                            data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;"
                            data-select2-id="15" tabindex="-1" aria-hidden="true">
                            @foreach ($roles as $role)
                                <option data-select2-id="{{ $role->id }}" value="{{ $role->name }}">
                                    {{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create User</button>
            </div>
        </form>
    </div>
@endsection
@push('script')
    <script src="{{ asset('backend/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $('.select2').select2()
    </script>
@endpush
