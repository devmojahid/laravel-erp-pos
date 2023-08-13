<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function homePageShow() {
        return view("frontend.home");
    }
    public function cartPageShow() {
        $page_title = "Cart Page";
        return view("frontend.cart",compact("page_title"));
    }
    public function accountPageShow() {
        $page_title = "Account Page";
        return view("frontend.account",compact("page_title"));
    }
    public function shopPageShow() {
        $page_title = "Shop Page";
        return view("frontend.shop",compact("page_title"));
    }
    public function loginPageShow() {
        $page_title = "Login Page";
        return view("frontend.auth.login",compact("page_title"));
    }
    public function checkoutPageShow() {
        $page_title = "Checkout Page";
        return view("frontend.checkout",compact("page_title"));
    }
}
