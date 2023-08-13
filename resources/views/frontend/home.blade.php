@extends('frontend.layouts.master')
@section('title', 'Home Page')

@section('content')


    <!--------------------------------- BANNER SECTION STARTS HERE --------------------------------->
    @include('frontend.home.banner')
    <!--------------------------------- BANNER SECTION END --------------------------------->


    <!--------------------------------- FLASH DEAL SECTION START --------------------------------->
    @include('frontend.home.flash')
    <!--------------------------------- FLASH DEAL SECTION END --------------------------------->


    <!--------------------------------- DISCOVER & TOP-SALE SECTION STARTS HERE --------------------------------->
    @include('frontend.home.discover')
    <!--------------------------------- DISCOVER & TOP-SALE SECTION ENDS HERE --------------------------------->


    <!--------------------------------- POPULAR CATEGORIES SECTION START --------------------------------->
    @include('frontend.home.populer')
    <!--------------------------------- POPULAR CATEGORIES SECTION END --------------------------------->


    <!--------------------------------- HOT DEAL BANNER SECTION START --------------------------------->
    @include('frontend.home.hot-deal')
    <!--------------------------------- HOT DEAL BANNER SECTION END --------------------------------->


    <!--------------------------------- FEATURED PRODUCT SECTION START --------------------------------->
    @include('frontend.home.featured')
    <!--------------------------------- FEATURED PRODUCT SECTION END --------------------------------->


    <!--------------------------------- SPECIAL OFFER SECTION START --------------------------------->
    @include('frontend.home.special')
    <!--------------------------------- SPECIAL OFFER SECTION END --------------------------------->


    <!--------------------------------- PRODUCT SECTION START --------------------------------->
    @include('frontend.home.product')
    <!--------------------------------- PRODUCT SECTION END --------------------------------->


    <!--------------------------------- SEASON SALE SECTION START --------------------------------->
    @include('frontend.home.season')
    <!--------------------------------- SEASON SALE SECTION END --------------------------------->


    <!--------------------------------- BEST SELLER SECTION START --------------------------------->
    @include('frontend.home.best-seller')
    <!--------------------------------- BEST SELLER SECTION END --------------------------------->


    <!--------------------------------- TOP BRANDS SECTION START --------------------------------->
    @include('frontend.home.top-brand')
    <!--------------------------------- TOP BRANDS SECTION END --------------------------------->


    <!--------------------------------- TESTIMONIAL SECTION START --------------------------------->
    @include('frontend.home.testimonial')
    <!--------------------------------- TESTIMONIAL SECTION END --------------------------------->


    <!--------------------------------- BLOG SECTION START --------------------------------->
    @include('frontend.home.blog')
    <!--------------------------------- BLOG SECTION END --------------------------------->


    <!--------------------------------- FEATURES SECTION START --------------------------------->
    @include('frontend.home.features')
    <!--------------------------------- FEATURES SECTION END --------------------------------->

@endsection
