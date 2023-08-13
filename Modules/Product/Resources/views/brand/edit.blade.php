@extends('backend.layouts.master')
@section('title', 'Brand Edit')
@push('css')
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
@endpush
@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Brand Edit</h1>
            <a href="{{ route('admin.brand.index') }}" class="btn btn-success btn-sm float-right"><i
                    class="fas fa-plus-circle"></i> All Brand</a>
        </div>
    </div>
    <form action="{{ route('admin.brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card card-primary">
            <div class="card-body">
                <div class="form-group">
                    <label for="brandTitle">Brand Name</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        id="brandTitle" value="{{ $brand->title }}" placeholder="Enter Name">
                </div>
                <div class="form-group" id='slug-group'>
                    <label for="slug">Slug:</label>
                    <input type="text" value="{{ $brand->slug }}"
                        class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug">
                </div>
                <div class="form-group">
                    <label>Brand Discription</label>
                    <textarea name="description" class="@error('description') is-invalid @enderror" id="description">{{ $brand->description }}</textarea>
                </div>


                <div class="form-group">
                    <label for="categoryImageUpload">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="categoryImageUpload">
                            <label class="custom-file-label" for="categoryImageUpload">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    {{-- brand status --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>brand Status</label>
                            <select name="status" class="custom-select">
                                <option {{ $brand->status == 'active' ? 'selected' : '' }} value="active">Active
                                </option>
                                <option {{ $brand->status == 'inactive' ? 'selected' : '' }} value="inactive">Inactive
                                </option>
                            </select>
                        </div>
                    </div>
                    {{-- brand featured --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Brand Featured</label>
                            <select name="featured" class="custom-select">
                                <option {{ $brand->featured == 'yes' ? 'selected' : '' }} value="yes">Yes</option>
                                <option {{ $brand->featured == 'no' ? 'selected' : '' }} value="no">No</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Meta Details</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="meta_title">Meta Title Name</label>
                    <input type="text" name="meta_title" value="{{ $brand->meta_title }}" class="form-control"
                        placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="meta_description">Meta Discription</label>
                    <textarea name="meta_description" id="meta_description">{{ $brand->meta_description }}</textarea>
                </div>
            </div>
            <!-- /.card-body -->
        </div>

        <button type="submit" class="btn btn-success mb-4 mt-2">Create User</button>
    </form>
@endsection
@push('script')
    <script src="{{ asset('backend/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $('#description').summernote({
            placeholder: 'Write Somthing',
            tabsize: 4,
            height: 180,
        });
        $('#meta_description').summernote({
            placeholder: 'Write Somthing',
            tabsize: 4,
            height: 180,
        });

        function slug_create(str) {
            var $slug = '';
            var trimmed = $.trim(str);
            $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
            replace(/-+/g, '-').
            replace(/^-|-$/g, '');
            return $slug.toLowerCase();
        }
        $('#brandTitle').keyup(function() {
            $('#slug').val(slug_create($('#brandTitle').val()));
        });
        $('#slug-group').hide();
        $('#brandTitle').keyup(function() {
            $('#slug-group').show();
        });
        $('#brandTitle').keyup(function() {
            if ($('#brandTitle').val().length == 0) {
                $('#slug-group').hide();
            }
        });
    </script>
@endpush
