@extends('frontend.layouts.master')

@section('title', $page_title)

@section('content')
    <!--------------------------------- BANNER SECTION START --------------------------------->
    @include('frontend.layouts.partials.breadcrumb', ['title' => $page_title])
    <!--------------------------------- BANNER SECTION END --------------------------------->


@endsection
