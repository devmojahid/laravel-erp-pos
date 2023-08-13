@extends('frontend.layouts.master')

@section('title', $page_title)

@section('content')
    <!--------------------------------- BANNER SECTION START --------------------------------->
    @include('frontend.layouts.partials.breadcrumb', ['title' => $page_title])
    <!--------------------------------- BANNER SECTION END --------------------------------->



    <!--------------------------------- CART SECTION START --------------------------------->
    <div class="tab-section py-120">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tab-nav">
                        <button class="single-nav active" data-tab="cartTab">
                            <span class="txt">Shopping Cart</span>
                            <span class="sl-no">01</span>
                        </button>
                        <button class="single-nav" data-tab="checkOutTab" disabled>
                            <span class="txt">Check Out</span>
                            <span class="sl-no">02</span>
                        </button>
                        <button class="single-nav" data-tab="orderCompletedTab" disabled>
                            <span class="txt">Order Completed</span>
                            <span class="sl-no">03</span>
                        </button>
                    </div>
                    <div class="tab-contents">
                        <div class="single-tab active" id="cartTab">
                            <div class="table-wrap revel-table">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="product-img">
                                                        <img src="{{ asset('frontend') }}/assets/images/feat-product-1.jpg"
                                                            alt="Image">
                                                    </div>
                                                </td>
                                                <td><a href="shop-details.html" class="product-name">White short Checkered
                                                    </a></td>
                                                <td><span class="price-txt">$<span class="main-price">460</span></span></td>
                                                <td>
                                                    <div class="product-count cart-product-count">
                                                        <div class="quantity rapper-quantity">
                                                            <input type="number" min="1" max="100"
                                                                step="1" value="1" readonly>
                                                            <div class="quantity-nav">
                                                                <div class="quantity-button quantity-down">
                                                                    <i class="fa-solid fa-minus"></i>
                                                                </div>
                                                                <div class="quantity-button quantity-up">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="price-txt">$<span class="total-price">460</span></span>
                                                </td>
                                                <td><button class="cart-delete"><i
                                                            class="fa-light fa-trash-can"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="product-img">
                                                        <img src="{{ asset('frontend') }}/assets/images/feat-product-2.jpg"
                                                            alt="Image">
                                                    </div>
                                                </td>
                                                <td><a href="shop-details.html" class="product-name">White short Checkered
                                                    </a></td>
                                                <td><span class="price-txt">$<span class="main-price">320</span></span></td>
                                                <td>
                                                    <div class="product-count cart-product-count">
                                                        <div class="quantity rapper-quantity">
                                                            <input type="number" min="1" max="100"
                                                                step="1" value="1" readonly>
                                                            <div class="quantity-nav">
                                                                <div class="quantity-button quantity-down">
                                                                    <i class="fa-solid fa-minus"></i>
                                                                </div>
                                                                <div class="quantity-button quantity-up">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="price-txt">$<span class="total-price">320</span></span>
                                                </td>
                                                <td><button class="cart-delete"><i
                                                            class="fa-light fa-trash-can"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="product-img">
                                                        <img src="{{ asset('frontend') }}/assets/images/feat-product-3.jpg"
                                                            alt="Image">
                                                    </div>
                                                </td>
                                                <td><a href="shop-details.html" class="product-name">White short Checkered
                                                    </a></td>
                                                <td><span class="price-txt">$<span class="main-price">123</span></span></td>
                                                <td>
                                                    <div class="product-count cart-product-count">
                                                        <div class="quantity rapper-quantity">
                                                            <input type="number" min="1" max="100"
                                                                step="1" value="2" readonly>
                                                            <div class="quantity-nav">
                                                                <div class="quantity-button quantity-down">
                                                                    <i class="fa-solid fa-minus"></i>
                                                                </div>
                                                                <div class="quantity-button quantity-up">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="price-txt">$<span class="total-price">246</span></span>
                                                </td>
                                                <td><button class="cart-delete"><i
                                                            class="fa-light fa-trash-can"></i></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="btn-box">
                                <a href="shop.html" class="def-btn">Continue Shopping</a>
                                <button class="def-btn" id="cartUpdate" disabled>Update Cart</button>
                            </div>
                            <div class="cart-total-panel">
                                <h3 class="title">Cart Total</h3>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="sub-title">Choose Shipping Mode:</h4>
                                            <div class="shipping-mode">
                                                <div class="form-check">
                                                    <input class="form-check-input shipping-check" type="radio"
                                                        name="shippingMode" id="storePickup" checked>
                                                    <span class="sub-input"><i class="fa-regular fa-check"></i></span>
                                                    <label class="form-check-label" for="storePickup">
                                                        Store pickup (in 20 minutes) - FREE
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input shipping-check" type="radio"
                                                        name="shippingMode" id="homeDelivery">
                                                    <span class="sub-input"><i class="fa-regular fa-check"></i></span>
                                                    <label class="form-check-label" for="homeDelivery">
                                                        Delivery at home (2 - 4 day) - $2.00 <span>1206 Sussex Court,
                                                            Killeen, TX - 76541</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="calculate-area">
                                                <ul>
                                                    <li>Sub Total <span class="price-txt">$<span
                                                                class="sub-total">1026</span></span></li>
                                                    <li>Shipping <span class="price-txt" id="shippingFee"><span
                                                                class="text-success">Free</span></span></li>
                                                    <li class="total-price-wrap">Total <span class="price-txt">$<span
                                                                id="totalPrice">1026</span></span></li>
                                                </ul>
                                                <button class="def-btn tab-next-btn" id="proceedToCheckout">Proceed to
                                                    checkout <i class="fa-light fa-cart-circle-check"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-tab" id="checkOutTab">
                            <div class="row">
                                <div class="col-xl-8 col-lg-7 col-md-6">
                                    <div class="billing-details">
                                        <h3 class="title">Billing Details</h3>
                                        <form class="form-row">
                                            <div class="form-col-5">
                                                <input type="text" class="form-control" placeholder="First Name"
                                                    required>
                                            </div>
                                            <div class="form-col-5">
                                                <input type="text" class="form-control" placeholder="Last Name"
                                                    required>
                                            </div>
                                            <div class="form-col-5">
                                                <input type="email" class="form-control" placeholder="Email Address"
                                                    required>
                                            </div>
                                            <div class="form-col-5">
                                                <input type="tel" class="form-control" placeholder="Phone" required>
                                            </div>
                                            <div class="form-col-5">
                                                <select name="country" required="" class="form-control select wide">
                                                    <option value="" disabled="" selected="" hidden="">
                                                        Select country</option>
                                                    <option value="AF">Afghanistan</option>
                                                    <option value="ZM">Zambia</option>
                                                    <option value="ZW">Zimbabwe</option>
                                                </select>
                                            </div>
                                            <div class="form-col-5">
                                                <input type="text" class="form-control" placeholder="Town/City"
                                                    required>
                                            </div>
                                            <div class="form-col-10">
                                                <input type="text" class="form-control" placeholder="Address"
                                                    required>
                                            </div>
                                            <div class="form-col-5">
                                                <input type="text" class="form-control" placeholder="Appartments"
                                                    required>
                                            </div>
                                            <div class="form-col-5">
                                                <input type="text" class="form-control" placeholder="Post Code"
                                                    required>
                                            </div>
                                            <div class="form-col-10">
                                                <div class="check-wrap">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="shipDifferentAddress">
                                                        <span class="sub-input"><i class="fa-regular fa-check"></i></span>
                                                        <label class="form-check-label" for="shipDifferentAddress">
                                                            Ship To Different Address
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="saveInformation">
                                                        <span class="sub-input"><i class="fa-regular fa-check"></i></span>
                                                        <label class="form-check-label" for="saveInformation">
                                                            Save This Information For Next Time
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-col-10" id="shippingAddress">
                                                <h3 class="title">Shipping Address</h3>
                                                <div class="form-row">
                                                    <div class="form-col-5">
                                                        <input type="text" class="form-control"
                                                            placeholder="First Name" required>
                                                    </div>
                                                    <div class="form-col-5">
                                                        <input type="text" class="form-control"
                                                            placeholder="Last Name" required>
                                                    </div>
                                                    <div class="form-col-10">
                                                        <input type="text" class="form-control" placeholder="Address"
                                                            required>
                                                    </div>
                                                    <div class="form-col-5">
                                                        <input type="text" class="form-control"
                                                            placeholder="Appartments" required>
                                                    </div>
                                                    <div class="form-col-5">
                                                        <input type="text" class="form-control"
                                                            placeholder="Town/City" required>
                                                    </div>
                                                    <div class="form-col-5">
                                                        <input type="text" class="form-control"
                                                            placeholder="Post Code" required>
                                                    </div>
                                                    <div class="form-col-5">
                                                        <input type="text" class="form-control" placeholder="Phone"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-col-10">
                                                <textarea class="form-control textarea" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-5 col-md-6">
                                    <div class="payment-method">
                                        <div class="total-clone">
                                            <ul>
                                                <li>Sub Total <span class="price-txt">$<span
                                                            class="sub-total-2">1026</span></span></li>
                                                <li>Shipping <span class="price-txt" id="shippingFee2"><span
                                                            class="text-success">Free</span></span></li>
                                                <li class="total-price-wrap">Total <span class="price-txt">$<span
                                                            id="totalPrice2">1026</span></span></li>
                                            </ul>
                                        </div>
                                        <div class="payment-option">
                                            <div class="single-payment-card">
                                                <div class="panel-header">
                                                    <div class="left-wrap">
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="credit-card"
                                                                type="checkbox" disabled>
                                                            <span class="sub-input"><i
                                                                    class="fa-regular fa-check"></i></span>
                                                        </div>
                                                        <span class="type">
                                                            Credit Card
                                                        </span>
                                                    </div>
                                                    <span class="icon">
                                                        <img src="{{ asset('frontend') }}/assets/images/credit-card.png"
                                                            alt="credit-card">
                                                    </span>
                                                </div>
                                                <div class="panel-body">
                                                    <form class="credit-card-form">
                                                        <div class="row g-lg-4 g-3">
                                                            <div class="col-12">
                                                                <div class="input-box card-number">
                                                                    <span class="symbol">
                                                                        <img src="{{ asset('frontend') }}/assets/images/visa.png"
                                                                            alt="Card Type">
                                                                    </span>
                                                                    <label>Card Number</label>
                                                                    <input type="text" id="creditCardNumber"
                                                                        placeholder="XXXX XXXX XXXX XXXX">
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="input-box">
                                                                    <label>Expiry date</label>
                                                                    <input type="text" id="datepicker"
                                                                        placeholder="MM/YYYY">
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="input-box">
                                                                    <label>Security code</label>
                                                                    <input type="number" id="securityCode"
                                                                        placeholder="e.g. 123">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="input-box">
                                                                    <label>Enter card holder name</label>
                                                                    <input type="text" id="cardHolderName"
                                                                        placeholder="Card holder">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="single-payment-card">
                                                <div class="panel-header">
                                                    <div class="left-wrap">
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="paypal"
                                                                type="checkbox" disabled>
                                                            <span class="sub-input"><i
                                                                    class="fa-regular fa-check"></i></span>
                                                        </div>
                                                        <span class="type">
                                                            PayPal
                                                        </span>
                                                    </div>
                                                    <span class="icon">
                                                        <img src="{{ asset('frontend') }}/assets/images/paypal.png"
                                                            alt="paypal">
                                                    </span>
                                                </div>
                                                <div class="panel-body">
                                                    <form class="paypal-form">
                                                        <div class="row g-lg-4 g-3">
                                                            <div class="col-12">
                                                                <label>Email or phone no. that used in paypal</label>
                                                                <input type="email" name="paypal-id" id="paypalId"
                                                                    placeholder="Email or mobile number" required>
                                                            </div>
                                                            <div class="col-12">
                                                                <button type="submit" id="confirmPaypal"
                                                                    class="def-btn">Confirm Paypal</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="single-payment-card">
                                                <div class="panel-header">
                                                    <div class="left-wrap">
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="google-pay"
                                                                type="checkbox" disabled>
                                                            <span class="sub-input"><i
                                                                    class="fa-regular fa-check"></i></span>
                                                        </div>
                                                        <span class="type">
                                                            Google Pay
                                                        </span>
                                                    </div>
                                                    <span class="icon">
                                                        <img src="{{ asset('frontend') }}/assets/images/google-pay.png"
                                                            alt="google-pay">
                                                    </span>
                                                </div>
                                                <div class="panel-body">
                                                    <form class="google-pay-form">
                                                        <div class="row g-lg-4 g-3">
                                                            <div class="col-12">
                                                                <label>Email or phone no. that used in google pay</label>
                                                                <input type="email" name="google-Pay-id"
                                                                    id="googlePayId" placeholder="Email or mobile number"
                                                                    required>
                                                            </div>
                                                            <div class="col-12">
                                                                <button type="submit" id="confirmGooglePay"
                                                                    class="def-btn">Confirm Google Pay</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="single-payment-card">
                                                <div class="panel-header">
                                                    <div class="left-wrap">
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="cash"
                                                                type="checkbox" disabled>
                                                            <span class="sub-input"><i
                                                                    class="fa-regular fa-check"></i></span>
                                                        </div>
                                                        <span class="type">
                                                            Cash on delivery
                                                        </span>
                                                    </div>
                                                    <span class="icon">
                                                        <img src="{{ asset('frontend') }}/assets/images/dollar.png"
                                                            alt="cash">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="def-btn palce-order tab-next-btn btn-success" id="palceOrder">Place
                                            Order <i class="fa-light fa-truck-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-tab" id="orderCompletedTab">
                            <div class="check-icon">
                                <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                    <circle class="checkmark__circle" cx="26" cy="26" r="25"
                                        fill="none" />
                                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                </svg>
                            </div>
                            <div class="order-complete-msg">
                                <h2>Your Order Has Been Completed</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--------------------------------- CART SECTION END --------------------------------->

    @push('scripts')
        <script src="{{ asset('frontend') }}/assets/js/cart.js"></script>
    @endpush
@endsection
