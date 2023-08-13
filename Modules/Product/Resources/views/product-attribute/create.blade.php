@extends('backend.layouts.master')
@section('title', 'Product Attr Create')
@push('css')
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
    <link href="{{ asset('backend/plugins/tag/tag.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Product Attr Create</h1>
            <a href="{{ route('admin.category.index') }}" class="btn btn-success btn-sm float-right"><i
                    class="fas fa-plus-circle"></i> All Product Attr</a>
        </div>
    </div>
    <form action="{{ route('admin.product-attribute.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card card-primary">
            <div class="card-body">
                <div class="form-group">
                    <label for="productAttrTitle">Product Attr Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        id="productAttrTitle" placeholder="Enter Name">
                </div>
                <div class="form-group" id='slug-group'>
                    <label for="slug">Slug:</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                        name="slug">
                </div>
                <div class="form-group">
                    <label for="productAttrTitle">Product Attr Value</label>
                    <input name='value[]' id="productAttrValue" class='' placeholder='write some tags'>
                </div>


            </div>
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
        $('#productAttrTitle').keyup(function() {
            $('#slug').val(slug_create($('#productAttrTitle').val()));
        });
        $('#slug-group').hide();
        $('#productAttrTitle').keyup(function() {
            $('#slug-group').show();
        });
        $('#productAttrTitle').keyup(function() {
            if ($('#productAttrTitle').val().length == 0) {
                $('#slug-group').hide();
            }
        });
    </script>

    <script src="{{ asset('backend/plugins/tag/tag.js') }}"></script>
    <script>
        var input = document.querySelector('#productAttrValue'),
            // init Tagify script on the above inputs
            tagify = new Tagify(input, {
                whitelist: ['css', 'html', 'javascript'],
                maxTags: 999,
                dropdown: {
                    maxItems: 20, // <- mixumum allowed rendered suggestions
                    classname: "tags-look", // <- custom classname for this dropdown, so it could be targeted
                    enabled: 0, // <- show suggestions on focus
                    closeOnSelect: false // <- do not hide the suggestions dropdown once an item has been selected
                }
            })
    </script>
@endpush
