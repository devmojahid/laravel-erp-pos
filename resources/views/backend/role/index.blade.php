@extends('backend.layouts.master')
@section('title', 'Roles List')
@include('backend.layouts.partials.datable-common-css')
@section('content')
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="dataTableArea" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SI.</th>
                        <th>Role Name</th>
                        <th>Permissons</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $index => $data)
                        <tr>
                            <td>{{ $index += 1 }}</td>
                            <td>{{ $data->name }}</td>
                            <td>
                                @foreach ($data->permissions as $permission)
                                    <span class="badge badge-info">{{ $permission->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('user show')
                                    <a href="{{ route('admin.users.show', $data->id) }}" class="btn btn-info btn-sm"><i
                                            class="fas fa-eye"></i></a>
                                @endcan
                                @can('user edit')
                                    <a href="{{ route('admin.roles.edit', $data->id) }}" class="btn btn-primary btn-sm"><i
                                            class="fas fa-edit"></i></a>
                                @endcan
                                @can('user delete')
                                    <form action="{{ route('admin.roles.destroy', $data->id) }}" method="POST"
                                        style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')"
                                            class="btn btn-danger btn-sm delete-btn"><i class="fas fa-trash"></i></button>
                                    </form>
                                @endcan
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
