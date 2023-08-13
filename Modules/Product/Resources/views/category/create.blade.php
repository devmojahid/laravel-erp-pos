@extends('backend.layouts.master')
@section('title', 'User Create')
@push('css')
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
@endpush
@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Category Create</h1>
            <a href="{{ route('admin.category.index') }}" class="btn btn-success btn-sm float-right"><i
                    class="fas fa-plus-circle"></i> All Category</a>
        </div>
    </div>
    <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card card-primary">
            <div class="card-body">
                <div class="form-group">
                    <label for="categoryTitle">Category Name</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        id="categoryTitle" placeholder="Enter Name">
                </div>
                <div class="form-group" id='slug-group'>
                    <label for="slug">Slug:</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                        name="slug">
                </div>
                <div class="form-group">
                    <label for="description">Category Discription</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"></textarea>

                </div>
                <div class="row">
                    {{-- parent category  --}}
                    <div class="col-md-6">
                        <label for="parentcat">Parent Category</label>
                        <div class="form-group">
                            <select name="parent_id" class="form-control" data-placeholder="Select">
                                <option value="">No Parent Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @if ($category->children)
                                        @foreach ($category->children as $subCategory)
                                            <option value="{{ $subCategory->id }}">--
                                                {{ $subCategory->title }}</option>
                                            @if ($subCategory->children)
                                                @foreach ($subCategory->children as $subSubCategory)
                                                    <option value="{{ $subSubCategory->id }}">------>
                                                        {{ $subSubCategory->title }}</option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- category iamge  --}}
                    <div class="col-md-6">
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
                    </div>
                </div>
                <div class="row">
                    {{-- Category status --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category Status</label>
                            <select name="status" class="custom-select">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    {{-- Category featured --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category Featured</label>
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

        <button type="submit" class="btn btn-success mb-4 mt-2">Create User</button>
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
        $('#categoryTitle').keyup(function() {
            $('#slug').val(slug_create($('#categoryTitle').val()));
        });
        $('#slug-group').hide();
        $('#categoryTitle').keyup(function() {
            $('#slug-group').show();
        });
        $('#categoryTitle').keyup(function() {
            if ($('#categoryTitle').val().length == 0) {
                $('#slug-group').hide();
            }
        });
    </script>
@endpush
