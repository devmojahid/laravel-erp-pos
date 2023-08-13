@extends('backend.layouts.master')
@section('title', 'Prodict Create')
@push('css')
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
@endpush
@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Product Create</h1>
            <a href="{{ route('admin.product.index') }}" class="btn btn-success btn-sm float-right"><i
                    class="fas fa-plus-circle"></i> All Product</a>
        </div>
    </div>
    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card card-primary">
            <div class="card-body">
                <div class="form-group">
                    <label for="categoryTitle">Product Name</label>
                    <input type="text" name="name" class="form-control @error('title') is-invalid @enderror"
                        id="productTitle" placeholder="Enter Name">
                </div>
                <div class="form-group" id='slug-group'>
                    <label for="slug">Slug:</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                        name="slug">
                </div>
                <div class="form-group">
                    <label for="description">Discription</label>
                    <textarea name="description" rows="6" cols="1"
                        class="form-control @error('description') is-invalid @enderror"></textarea>

                </div>
                <div class="form-group">
                    <label for="short_description">Sort Discription</label>
                    <textarea name="short_description" rows="3" cols="1"
                        class="form-control @error('short_description') is-invalid @enderror"></textarea>

                </div>
                <div class="row">
                    {{-- parent category  --}}
                    <div class="col-md-6">
                        <label for="parentcat">Parent Category</label>
                        <div class="form-group">
                            <select name="category_id" class="form-control" data-placeholder="Select">
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
                            <label for="categoryImageUpload">Brand</label>
                            <select name="brand_id" class="form-control">
                                <option value="">Select Brand</option>
                                {{-- @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach --}}
                            </select>
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
                {{-- Product  --}}
                <div class="row">
                    {{-- Product atts --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Product Attribute</label>
                            <select name="status" class="custom-select" id="attributeName">
                                <option value="" disabled selected>Select Attribute name</option>
                                @foreach ($products_attributes as $products_attribute)
                                    <option value="{{ $products_attribute->id }}">{{ $products_attribute->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Product Attribute Value --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Product Attribute Value</label>
                            <select name="featured" class="custom-select" id="attributeValue">
                                <option disabled selected>Select Attribute Name First</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- genaral info --}}
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Genaral Settings</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="sku">SKU</label>
                    <input type="text" name="sku" class="form-control" id="sku" placeholder="Enter sku">
                </div>
                <div class="form-group">
                    <label for="barcode">Barcode</label>
                    <input type="text" name="barcode" class="form-control" id="barcode" placeholder="Enter barcode">
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" class="form-control" id="stock" placeholder="Enter stock">
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        {{-- Product Price  --}}
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Product Price</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" class="form-control" id="price"
                        placeholder="Enter Product Price">
                </div>
                <div class="form-group">
                    <label for="sale_price">Sale Price</label>
                    <input type="text" name="sale_price" class="form-control" id="sale_price"
                        placeholder="Enter Product Sale Price">
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        {{-- Product Image Video  --}}
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Product Image Video</h3>
            </div>
            <div class="card-body">

                <div id="thumbnail_preview"></div>
                <div class="form-group">
                    <label for="thumbnailImageUpload">Thumbnail</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="thumbnail" class="custom-file-input" id="thumbnailImageUpload">
                            <label class="custom-file-label" for="thumbnailImageUpload">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>

                <div id="gallery_preview"></div>
                <div class="form-group">
                    <label for="galleryImageUpload">Gallery</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="gallery[]" class="custom-file-input" id="galleryImageUpload"
                                multiple>
                            <label class="custom-file-label" for="galleryImageUpload">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="video">Product Video</label>
                    <input type="text" name="video" class="form-control" id="video" placeholder="Enter video">
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

        $('#productTitle').keyup(function() {
            $('#slug').val(slug_create($('#productTitle').val()));
        });
        $('#slug-group').hide();
        $('#productTitle').keyup(function() {
            $('#slug-group').show();
        });
        $('#productTitle').keyup(function() {
            if ($('#productTitle').val().length == 0) {
                $('#slug-group').hide();
            }
        });

        $('#attributeName').change(function() {
            var attribute_id = $(this).val();
            $.ajax({
                url: "{{ route('admin.product.attribute.value') }}",
                type: "POST",
                data: {
                    attribute_id: attribute_id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    console.log(data.data);
                    var html = '<option value="" disabled selected>Select Attribute Value</option>';
                    $.each(data.data, function(key, value) {
                        html += '<option value="' + value + '">' + value +
                            '</option>';
                    });
                    $('#attributeValue').html(html);
                }
            });
        });

        // $('#addAttribute').click(function() {
        //     var attribute_id = $('#attributeName').val();
        //     var attribute_name = $('#attributeName option:selected').text();
        //     var attribute_value = $('#attributeValue').val();
        //     var attribute_value_name = $('#attributeValue option:selected').text();
        //     var html = '<tr><td><input type="hidden" name="attribute_id[]" value="' + attribute_id +
        //         '">' + attribute_name + '</td><td><input type="hidden" name="attribute_value[]" value="' +
        //         attribute_value + '">' + attribute_value_name + '</td><td><a href="javascript:void(0)" class="btn btn-danger btn-sm removeAttribute"><i class="fas fa-trash"></i></a></td></tr>';
        //     $('#attributeTable').append(html);
        // });

        // $(document).on('click', '.removeAttribute', function() {
        //     $(this).closest('tr').remove();
        // });

        // thumbnailImageUpload Preview
        $('#thumbnailImageUpload').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#thumbnail_preview').html(`<img src="${e.target.result}" class="img-fluid" width="100">`);
            }
            reader.readAsDataURL(this.files[0]);
        });

        // galleryImageUpload Multiple Preview
        $('#galleryImageUpload').change(function() {
            let total_file = document.getElementById("galleryImageUpload").files.length;
            for (let i = 0; i < total_file; i++) {
                $('#gallery_preview').append(
                    `<img src="${URL.createObjectURL(event.target.files[i])}" class="img-fluid" width="100">`);
            }
        });
    </script>
@endpush
