@extends('backend.layouts.master')
@section('title', 'User List')
@include('backend.layouts.partials.datable-common-css')
@section('content')
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="dataTableArea" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SI.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $index => $data)
                        <tr>
                            <td>{{ $index += 1 }}</td>
                            <td>{{ $data->name }}</td>
                            <td>
                                @foreach ($data->roles as $role)
                                    <span class="badge badge-info mr-1">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td>{{ $data->email }}</td>
                            <td>
                                <a href="{{ route('admin.users.show', $data->id) }}" class="btn btn-info btn-sm"><i
                                        class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.users.edit', $data->id) }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-edit"></i></a>
                                {{-- delete post form with icon button --}}
                                <form action="{{ route('admin.users.destroy', $data->id) }}"
                                    id="delete-form-{{ $data->id }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" data-main-id="{{ $data->id }}"
                                        onclick="return confirm('Are you sure?')"
                                        class="btn btn-danger btn-sm delete-btn"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@include('backend.layouts.partials.datable-common-js')
