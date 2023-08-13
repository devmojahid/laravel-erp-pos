<div class="banner banner-inner">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-9 col-8">
                <div class="breadcrumb-txt">
                    <h1>{{ $title }}</h1>
                    {{-- laravel custom breadcrumb  --}}
                    <ul>
                        <li><a href="{{ route('page.home') }}"><i class="fa-regular fa-house"></i></a></li>
                        <li>/</li>
                        @php
                            $segments = '';
                        @endphp
                        @foreach (request()->segments() as $segment)
                            @php
                                $segments .= '/' . $segment;
                            @endphp
                            <li><a href="{{ $segments }}">
                                    {{ str_replace('-', ' ', ucfirst($segment)) }}
                                </a></li>
                            @if (!$loop->last)
                                <li>/</li>
                            @endif
                        @endforeach
                    </ul>


                </div>
            </div>
            <div class="col-lg-6 col-md-3 col-4">
                <div class="part-img">
                    <img src="{{ asset('frontend') }}/assets/images/breadcrumb-img.png" alt="Image">
                </div>
            </div>
        </div>
    </div>
</div>
