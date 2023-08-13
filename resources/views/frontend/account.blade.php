@extends('frontend.layouts.master')

@section('title', $page_title)

@section('content')
<div class="account py-120">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="account-sidebar">
                    <div class="user">
                        <div class="part-img">
                            <img src="assets/images/user.jpg" alt="Image">
                        </div>
                        <div class="part-txt">
                            <h3>Steven Smith</h3>
                        </div>
                    </div>
                    <div class="nav flex-column" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-dashboard-tab" data-bs-toggle="pill" data-bs-target="#v-pills-dashboard" type="button" role="tab" aria-controls="v-pills-dashboard" aria-selected="true"><span class="icon"><i class="fa-duotone fa-objects-column"></i></span> <span class="txt">Dashboard</span></button>
                        <button class="nav-link" id="v-pills-purchase-tab" data-bs-toggle="pill" data-bs-target="#v-pills-purchase" type="button" role="tab" aria-controls="v-pills-purchase" aria-selected="false"><span class="icon"><i class="fa-duotone fa-file-invoice"></i></span> <span class="txt">Purchase History</span></button>
                        <button class="nav-link" id="v-pills-conversation-tab" data-bs-toggle="pill" data-bs-target="#v-pills-conversation" type="button" role="tab" aria-controls="v-pills-conversation" aria-selected="false"><span class="icon"><i class="fa-duotone fa-messages"></i></span> <span class="txt">Conversation</span></button>
                        <button class="nav-link" id="v-pills-wallet-tab" data-bs-toggle="pill" data-bs-target="#v-pills-wallet" type="button" role="tab" aria-controls="v-pills-wallet" aria-selected="false"><span class="icon"><i class="fa-duotone fa-wallet"></i></span> <span class="txt">My Wallet</span></button>
                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><span class="icon"><i class="fa-duotone fa-user-vneck"></i></span> <span class="txt">Manage Profile</span></button>
                        <a href="register.html" class="nav-link"><span class="icon"><i class="fa-duotone fa-power-off"></i></span> <span class="txt">Log out</span></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab" tabindex="0">
                        <h2 class="account-title">Dashboard</h2>
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Invoice ID</th>
                                            <th>Recipient</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="invoice-id">INV-012-345</span></td>
                                            <td><span class="name">John Doe</span></td>
                                            <td><span class="date">Mar 15, 2022</span></td>
                                            <td><span class="amount">$256</span></td>
                                            <td><span class="status"><span class="paid">Paid</span></span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="invoice-id">INV-012-345</span></td>
                                            <td><span class="name">John Doe</span></td>
                                            <td><span class="date">Mar 15, 2022</span></td>
                                            <td><span class="amount">$256</span></td>
                                            <td><span class="status"><span class="unpaid">Unpaid</span></span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="invoice-id">INV-012-345</span></td>
                                            <td><span class="name">John Doe</span></td>
                                            <td><span class="date">Mar 15, 2022</span></td>
                                            <td><span class="amount">$256</span></td>
                                            <td><span class="status"><span class="paid">Paid</span></span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="invoice-id">INV-012-345</span></td>
                                            <td><span class="name">John Doe</span></td>
                                            <td><span class="date">Mar 15, 2022</span></td>
                                            <td><span class="amount">$256</span></td>
                                            <td><span class="status"><span class="unpaid">Unpaid</span></span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="invoice-id">INV-012-345</span></td>
                                            <td><span class="name">John Doe</span></td>
                                            <td><span class="date">Mar 15, 2022</span></td>
                                            <td><span class="amount">$256</span></td>
                                            <td><span class="status"><span class="paid">Paid</span></span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="invoice-id">INV-012-345</span></td>
                                            <td><span class="name">John Doe</span></td>
                                            <td><span class="date">Mar 15, 2022</span></td>
                                            <td><span class="amount">$256</span></td>
                                            <td><span class="status"><span class="unpaid">Unpaid</span></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-bottom">
                                <div class="part-txt">
                                    <p>Showing 06 from 50 data</p>
                                </div>
                                <div class="pagination">
                                    <button disabled><i class="fa-solid fa-chevron-left"></i></button>
                                    <button class="active">1</button>
                                    <button>2</button>
                                    <button>3</button>
                                    <button><i class="fa-solid fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-purchase" role="tabpanel" aria-labelledby="v-pills-purchase-tab" tabindex="0">
                        <h2 class="account-title">Purchase History</h2>
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Details</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="invoice-id">INV-012-345</span></td>
                                            <td><span class="date">Mar 15, 2022</span></td>
                                            <td>
                                                <div class="details">
                                                    <a href="shop-details.html" class="product-name">Revel eCommerce-Multi vendor</a>
                                                    <span class="invoice">Invoice: <button type="button" data-bs-toggle="modal" data-bs-target="#invoiceModal">48452022</button></span>
                                                </div>
                                            </td>
                                            <td><span class="amount">$256</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="invoice-id">INV-012-345</span></td>
                                            <td><span class="date">Mar 15, 2022</span></td>
                                            <td>
                                                <div class="details">
                                                    <a href="shop-details.html" class="product-name">Revel eCommerce-Multi vendor</a>
                                                    <span class="invoice">Invoice: <button type="button" data-bs-toggle="modal" data-bs-target="#invoiceModal">48452022</button></span>
                                                </div>
                                            </td>
                                            <td><span class="amount">$256</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="invoice-id">INV-012-345</span></td>
                                            <td><span class="date">Mar 15, 2022</span></td>
                                            <td>
                                                <div class="details">
                                                    <a href="shop-details.html" class="product-name">Revel eCommerce-Multi vendor</a>
                                                    <span class="invoice">Invoice: <button type="button" data-bs-toggle="modal" data-bs-target="#invoiceModal">48452022</button></span>
                                                </div>
                                            </td>
                                            <td><span class="amount">$256</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="invoice-id">INV-012-345</span></td>
                                            <td><span class="date">Mar 15, 2022</span></td>
                                            <td>
                                                <div class="details">
                                                    <a href="shop-details.html" class="product-name">Revel eCommerce-Multi vendor</a>
                                                    <span class="invoice">Invoice: <button type="button" data-bs-toggle="modal" data-bs-target="#invoiceModal">48452022</button></span>
                                                </div>
                                            </td>
                                            <td><span class="amount">$256</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="invoice-id">INV-012-345</span></td>
                                            <td><span class="date">Mar 15, 2022</span></td>
                                            <td>
                                                <div class="details">
                                                    <a href="shop-details.html" class="product-name">Revel eCommerce-Multi vendor</a>
                                                    <span class="invoice">Invoice: <button type="button" data-bs-toggle="modal" data-bs-target="#invoiceModal">48452022</button></span>
                                                </div>
                                            </td>
                                            <td><span class="amount">$256</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-bottom">
                                <div class="part-txt">
                                    <p>Showing 05 from 30 data</p>
                                </div>
                                <div class="pagination">
                                    <button disabled><i class="fa-solid fa-chevron-left"></i></button>
                                    <button class="active">1</button>
                                    <button>2</button>
                                    <button>3</button>
                                    <button><i class="fa-solid fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-conversation" role="tabpanel" aria-labelledby="v-pills-conversation-tab" tabindex="0">
                        <h2 class="account-title">Conversations</h2>
                        <div class="conversation-panel">
                            <div class="row g-0">
                                <div class="col-md-8 chat-col">
                                    <div class="chat-area">
                                        <div class="single-msg">
                                            <div class="part-img">
                                                <div class="img">
                                                    <img src="assets/images/avatar.png" alt="image">
                                                </div>
                                                <span>13:57</span>
                                            </div>
                                            <div class="part-txt">
                                                <span>Flag messages where the</span>
                                            </div>
                                        </div>
                                        <div class="single-msg msg-out">
                                            <div class="part-txt">
                                                <span>Bot selected the wrong action</span>
                                            </div>
                                            <div class="part-img">
                                                <div class="img">
                                                    <img src="assets/images/user.jpg" alt="image">
                                                </div>
                                                <span>13:57</span>
                                            </div>
                                        </div>
                                        <div class="single-msg">
                                            <div class="part-img">
                                                <div class="img">
                                                    <img src="assets/images/avatar.png" alt="image">
                                                </div>
                                                <span>13:57</span>
                                            </div>
                                            <div class="part-txt">
                                                <span>Sometimes instead of fla</span>
                                            </div>
                                        </div>
                                        <div class="single-msg msg-out">
                                            <div class="part-txt">
                                                <span>message to come back to</span>
                                            </div>
                                            <div class="part-img">
                                                <div class="img">
                                                    <img src="assets/images/user.jpg" alt="image">
                                                </div>
                                                <span>13:57</span>
                                            </div>
                                        </div>
                                        <div class="single-msg">
                                            <div class="part-img">
                                                <div class="img">
                                                    <img src="assets/images/avatar.png" alt="image">
                                                </div>
                                                <span>13:57</span>
                                            </div>
                                            <div class="part-txt">
                                                <span>What can I do for you?</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="info-area">
                                        <div class="chat-between">
                                            <div class="part-img">
                                                <div class="img">
                                                    <img src="assets/images/avatar.png" alt="image">
                                                </div>
                                                <div class="img">
                                                    <img src="assets/images/user.jpg" alt="image">
                                                </div>
                                            </div>
                                            <div class="part-txt">
                                                <span>Conversations</span>
                                            </div>
                                        </div>
                                        <div class="action">
                                            <h4 class="title">Actions</h4>
                                            <ul>
                                                <li><button>Mark as Reviewed<span><i class="fa-light fa-badge-check"></i></span></button></li>
                                                <li><button>Seve fo Later<span><i class="fa-light fa-bookmark"></i></span></button></li>
                                                <li><button>Delete<span><i class="fa-light fa-trash-can"></i></span></button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-wallet" role="tabpanel" aria-labelledby="v-pills-wallet-tab" tabindex="0">
                        <h2 class="account-title">My Wallet</h2>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="total-balance">
                                    <div class="top">
                                        <h4>Total Balance</h4>
                                        <div class="tags">
                                            <span class="tag tag-up"><i class="fa-light fa-arrow-up-right"></i> $600.99</span>
                                            <span class="tag tag-down"><i class="fa-light fa-arrow-down-left"></i> $700.99</span>
                                        </div>
                                    </div>
                                    <div class="middle">
                                        <h3>$ 7,950.96</h3>
                                    </div>
                                    <div class="btn-box">
                                        <a href="#" class="def-btn">Deposit</a>
                                        <a href="#" class="def-btn">Withdraw</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="chart-panel">
                                    <div class="custom-legend">
                                        <div class="single-legend">income</div>
                                        <div class="single-legend">withdrawals</div>
                                    </div>
                                    <div id="overviewChart"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="table-wrap">
                                    <div class="table-top">
                                        <h4 class="title">Transfer History</h4>
                                        <form class="search-box">
                                            <input type="search" placeholder="Search">
                                            <button type="submit"><i class="fa-regular fa-magnifying-glass"></i></button>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Date</th>
                                                    <th>Transfer type</th>
                                                    <th>Amount</th>
                                                    <th>User</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>INV-012-345</td>
                                                    <td>Jun 21, 2022</td>
                                                    <td>
                                                        <div class="details"><a href="shop-details.html" class="product-name">Revel eCommerce-Multi vendor</a></div>
                                                    </td>
                                                    <td>$256</td>
                                                    <td>Steven Smith</td>
                                                </tr>
                                                <tr>
                                                    <td>INV-012-346</td>
                                                    <td>Apr 09, 2022</td>
                                                    <td>
                                                        <div class="details"><a href="shop-details.html" class="product-name">Revel eCommerce-Multi vendor</a></div>
                                                    </td>
                                                    <td>$123</td>
                                                    <td>Steven Smith</td>
                                                </tr>
                                                <tr>
                                                    <td>INV-012-347</td>
                                                    <td>Mar 15, 2022</td>
                                                    <td>
                                                        <div class="details"><a href="shop-details.html" class="product-name">Revel eCommerce-Multi vendor</a></div>
                                                    </td>
                                                    <td>$174</td>
                                                    <td>Steven Smith</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-bottom">
                                        <div class="part-txt">
                                            <p>Showing 03 from 50 data</p>
                                        </div>
                                        <div class="pagination">
                                            <button disabled><i class="fa-solid fa-chevron-left"></i></button>
                                            <button class="active">1</button>
                                            <button>2</button>
                                            <button>3</button>
                                            <button><i class="fa-solid fa-chevron-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
                        <h2 class="account-title">Manage Profile</h2>
                        <div class="profile-panel">
                            <div class="profile-top">
                                <div class="user">
                                    <div class="part-img">
                                        <img src="assets/images/user.jpg" alt="Image">
                                    </div>
                                    <div class="part-txt">
                                        <span>Steven Smith</span>
                                    </div>
                                </div>
                                <div class="btn-box">
                                    <a href="#" class="def-btn">Upload</a>
                                    <a href="#" class="def-btn">Remove</a>
                                </div>
                            </div>
                            <form>
                                <div class="row g-lg-4 g-3">
                                    <div class="col-sm-6">
                                        <input type="text" placeholder="First Name:">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" placeholder="Last Name:">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="email" placeholder="Email Address:">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="tel" placeholder="Phone:">
                                    </div>
                                    <div class="col-sm-6">
                                        <select name="country" class="select wide">
                                            <option value="*">Country*</option>
                                            <option value="1">England</option>
                                            <option value="2">Bangladesh</option>
                                            <option value="3">India</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" placeholder="Post Code*">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" placeholder="Current Password *">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" placeholder="New Password *">
                                    </div>
                                    <div class="col-12">
                                        <input type="password" placeholder="Confirm Password *">
                                    </div>
                                    <div class="col-12">
                                        <div class="btn-box">
                                            <button class="def-btn">Save Change</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--------------------------------- INVOICE MODAL START --------------------------------->
    <div class="invoice-modal modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="invoiceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="account-title mb-0" id="invoiceModalLabel">Invoice</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="invoice-wrap">
                        <div class="invoice-top d-flex justify-content-between align-items-center">
                            <div class="left">
                                <div class="logo"><img src="assets/images/Logo.html" alt="LOGO"></div>
                                <p>Invoice</p>
                            </div>
                            <div class="right">
                                <table>
                                    <tbody>
                                        <tr>
                                            <th>Date:</th>
                                            <td>17 Aug 2022</td>
                                        </tr>
                                        <tr>
                                            <th>Invoice No:</th>
                                            <td>IVIP48452022</td>
                                        </tr>
                                        <tr>
                                            <th>Order No:</th>
                                            <td>166779322</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="invoice-body">
                            <div class="details">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3>Bill to</h3>
                                        <p>
                                            <span>Jetimpex Inc</span>
                                            <span>915 SE 2 Court,</span>
                                            <span>Ft. Lauderdale,</span>
                                            <span>FL 33301</span>
                                            <span>EIN: 42-1774657</span>
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <h3>Supplier</h3>
                                        <p>
                                            <span>Khorshed Alam</span>
                                            <span>Ruhul amin Complex, Mokimabad,</span>
                                            <span>590573362138</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>Item ID</th>
                                                <th class="text-center">Qty</th>
                                                <th>Description</th>
                                                <th class="text-end">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>35130092</td>
                                                <td class="text-center">1</td>
                                                <td>Revel eCommerce-Multi vendor Ecommerce PSD Template</td>
                                                <td class="text-end"><span class="price">$8.00</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="total ms-auto">
                                    <h5>Invoice Total: <span>USD $8.00</span></h5>
                                    <p>Paid via Skrill</p>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-footer">
                            <span>THANK YOU FOR YOUR BUSINESS!</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="def-btn">Print <i class="fa-regular fa-print"></i></button>
                    <button type="button" class="def-btn">Download <i class="fa-regular fa-download"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
