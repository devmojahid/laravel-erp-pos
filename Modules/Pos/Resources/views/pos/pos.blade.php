@extends('backend.layouts.master')
@section('title', 'Product List')
@push('css')
    <style>
        #spinner-div {
            position: fixed;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 2;
        }
    </style>
@endpush
@section('content')
    <div id="spinner-div" class="pt-5">
        <div class="spinner-border text-primary" role="status">
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p>{{ Session::get('success') }}</p><br>
                </div>
            @endif
            <div class="pos-header d-flex align-items-center justify-content-between">
                <h5 class="card-title">Welcome To ERP Pos</h5>
                <div>
                    <form class="d-flex">
                        <input class="form-control me-2 mr-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" style="width: 190px;" type="submit">Search
                            Product</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- select -->
                            <div class="form-group">
                                <label>Select A product Category</label>
                                <select class="custom-select" id="categorySelect">
                                    <option value="">All Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Select A User</label>
                                <select class="custom-select">
                                    @forelse ($users as  $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @empty
                                        <option value="">No User Found</option>
                                    @endforelse

                                </select>
                            </div>
                        </div>
                    </div>

                    <div style="width:100%;height:142vh;">
                        <div class="row" id="showProduct">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="pos-price p-2 rounded" style="background:#f3f2f4">
                        <div class="pos-price-details">
                            <div class="d-flex align-items-center justify-content-between mt-1 mb-3">
                                <div>
                                    <h4 class="card-title">Total Items</h4>
                                </div>
                                <div>
                                    <h4 class="card-title" id="totalItems">0</h4>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-1 mb-3">
                                <div>
                                    <h4 class="card-title">Sub Total</h4>
                                </div>
                                <div>
                                    <h4 class="card-title" id="subTotal">0</h4>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-1 mb-3">
                                <div>
                                    <h4 class="card-title">Discount</h4>
                                </div>
                                <div>
                                    <h4 class="card-title" id="discount">0</h4>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-1 mb-3">
                                <div>
                                    <h4 class="card-title">Total</h4>
                                </div>
                                <div>
                                    <h4 class="card-title" id="total">0</h4>
                                </div>
                            </div>

                        </div>
                        <div class="pos-price-btn">
                            <button class="btn btn-block btn-success">Pay</button>
                        </div>
                    </div>
                    <div class="all-table mt-4">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="productTableData">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script>
        $("#spinner-div").show();
        let body = document.querySelector('body');
        body.classList.add('sidebar-collapse');

        $.ajax({
            url: "{{ route('admin.pos.getProducts') }}",
            type: "GET",
            success: function(response) {
                let products = response.data;
                let html = ``;
                products.forEach(product => {
                    html += "<div class='col-md-3 mb-4'>";
                    html += "<div class='card'>";
                    html += "<img src='{{ asset('') }}/" + product.thumbnail +
                        "' class='card-img-top' alt='...'>";
                    html += "<div class='card-body'>";
                    html += "<h5 class='card-title'>" + product.name + "</h5>";
                    html += "<p class='card-text'>" + product.description + "</p>";
                    html +=
                        "<div class='d-flex align-items-center justify-content-between'>";
                    html += "<h4 class='card-title'>$" + product.price + "</h4>";
                    html +=
                        "<button class='btn btn-sm btn-success' id='addProduct' data-id='" +
                        product.id + "' data-title='" + product.name + "' data-price='" +
                        product.price + "'>Add</button>";
                    html += "</div>";
                    html += "</div>";
                    html += "</div>";
                    html += "</div>";

                });
                $("#showProduct").html(html);
            },
            complete: function() {
                $("#spinner-div").hide();
            }

        })

        $("#categorySelect").change(function() {
            $("#spinner-div").show();
            let categoryId = $(this).val();
            $.ajax({
                url: "{{ route('admin.pos.getProducts') }}",
                type: "GET",
                data: {
                    category_id: categoryId
                },
                success: function(response) {
                    let products = response.data;
                    let html = ``;
                    products.forEach(product => {
                        html += "<div class='col-md-3 mb-4'>";
                        html += "<div class='card'>";
                        html += "<img src='{{ asset('') }}/" + product.thumbnail +
                            "' class='card-img-top' alt='...'>";
                        html += "<div class='card-body'>";
                        html += "<h5 class='card-title'>" + product.name + "</h5>";
                        html += "<p class='card-text'>" + product.description + "</p>";
                        html +=
                            "<div class='d-flex align-items-center justify-content-between'>";
                        html += "<h4 class='card-title'>$" + product.price + "</h4>";
                        html +=
                            "<button class='btn btn-sm btn-success' id='addProduct' data-id='" +
                            product.id + "' data-title='" + product.name + "' data-price='" +
                            product.price + "'>Add</button>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";

                    });
                    $("#showProduct").html(html);
                },
                complete: function() {
                    $("#spinner-div").hide();
                }
            })
        });

        let totalItems = 0;
        let subTotal = 0;
        let discount = 0;
        let total = 0;
        let price = 0;
        let totalAmount = 0;

        $(document).on('click', '#addProduct', function() {
            let id = $(this).data('id');
            let title = $(this).data('title');
            let price = $(this).data('price');
            let html = ``;
            html += "<tr>";
            html += "<td>" + title + "</td>";
            html += "<td id='price'>" + price + "</td>";
            html +=
                "<td><input type='number' class='form-control' id='quantity' data-price='" + price +
                "' value='1' min='1' style='width: 70px;'></td>";
            html +=
                "<td><button class='btn btn-sm btn-danger' id='removeProduct' data-id='" +
                id + "'>Remove</button></td>";
            html += "</tr>";
            $("#productTableData").append(html);

            // $("#productTableData tr").each(function() {
            //     totalItems += 1;
            //     subTotal += parseFloat($(this).find('#price').html());
            // });

            totalItems += 1;
            subTotal += parseFloat(price);

            $("#totalItems").html(totalItems);
            $("#subTotal").html(subTotal);
            $("#discount").html(discount);
            $("#total").html(subTotal - discount);
        });

        $(document).on('click', '#removeProduct', function() {
            $(this).parent().parent().remove();
        });

        $(document).on('change', '#quantity', function() {

            let quantity = $(this).val();
            let pricetabledata = $(this).data('price');
            let total = quantity * pricetabledata;
            let pricedata = $(this).parent().parent().find('#price');
            pricedata.html(total);
            // $("#productTableData tr").each(function() {
            //     if ($(this).find('#quantity').val() == 0) {
            //         $(this).remove();
            //     } else {
            //         totalItems += 1;
            //         subTotal += parseFloat($(this).find('#price').html());
            //     }
            // });
            $("#productTableData tr").each(function() {
                totalItems += 1;
                subTotal += parseFloat($(this).find('#price').html());
            });


            // totalItems = 0;
            // subTotal = 0;

            $("#totalItems").html(totalItems);
            $("#subTotal").html(subTotal);
            $("#discount").html(discount);
            $("#total").html(subTotal - discount);
        });
    </script>
@endpush
