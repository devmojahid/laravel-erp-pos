@extends('backend.layouts.master')
@section('title', 'Product List')
@include('backend.layouts.partials.datable-common-css')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Product List</h1>
            <a href="{{ route('admin.product.create') }}" class="btn btn-success btn-sm float-right"><i
                    class="fas fa-plus-circle"></i> Add Product</a>
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
                        <th>Parent Product</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $data)
                        <tr>
                            <td>{{ $index += 1 }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->status }}</td>
                            <td>{{ $data->featured }}</td>
                            <td>
                                <span class="badge bg-info">
                                    {{ $data->category->title }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.product.show', $data->id) }}" class="btn btn-info btn-sm"><i
                                        class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.product.edit', $data->id) }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-edit"></i></a>
                                {{-- delete post form with icon button --}}
                                <form action="{{ route('admin.product.destroy', $data->id) }}"
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
