@extends('backend.layouts.master')
@section('title', 'Brand Create')
@push('css')
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
@endpush
@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Brand Create</h1>
            <a href="{{ route('admin.brand.index') }}" class="btn btn-success btn-sm float-right"><i
                    class="fas fa-plus-circle"></i> All Brand</a>
        </div>
    </div>
    <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card card-primary">
            <div class="card-body">
                <div class="form-group">
                    <label for="brandTitle">Brand Name</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        id="brandTitle" placeholder="Enter Name">
                </div>
                <div class="form-group" id='slug-group'>
                    <label for="slug">Slug:</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                        name="slug">
                </div>
                <div class="form-group">
                    <label for="description">Brand Discription</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"></textarea>

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
                    {{-- Brand status --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Brand Status</label>
                            <select name="status" class="custom-select">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    {{-- Brand featured --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Brand Featured</label>
                            <select name="featured" class="custom-select">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
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
                    <input type="text" name="meta_title" class="form-control" idmeta_title" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="meta_description">Meta Discription</label>
                    <textarea name="meta_description" id="meta_description"></textarea>
                </div>
            </div>
            <!-- /.card-body -->
        </div>

        <button type="submit" class="btn btn-success mb-4 mt-2">Create Brand</button>
    </form>
@endsection
@push('script')
    <script src="{{ asset('backend/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#meta_description').summernote({
                tabsize: 4,
                height: 180,
            });

        });
        $('#description').summernote({
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
