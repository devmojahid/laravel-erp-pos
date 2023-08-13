@extends('backend.layouts.master')
@section('title', 'Category List')
@include('backend.layouts.partials.datable-common-css')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Category List</h1>
            <a href="{{ route('admin.category.create') }}" class="btn btn-success btn-sm float-right"><i
                    class="fas fa-plus-circle"></i> Add Category</a>
        </div>
    </div>
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="dataTableArea" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SI.</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Featured</th>
                        <th>Parent Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $data)
                        <tr>
                            <td>{{ $index += 1 }}</td>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->status }}</td>
                            <td>{{ $data->featured }}</td>
                            <td>
                                @if ($data->parent_id)
                                    {{ $data->parent->title }}
                                @else
                                    <span class="badge badge-info">No Parent</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.category.show', $data->id) }}" class="btn btn-info btn-sm"><i
                                        class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.category.edit', $data->id) }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-edit"></i></a>
                                {{-- delete post form with icon button --}}
                                <form action="{{ route('admin.category.destroy', $data->id) }}"
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
