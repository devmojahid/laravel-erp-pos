@if ($errors->any())
    <div class="alert alert-danger">
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>
@endif


@if (session()->has('success'))
    <div class="alert alert-success">
        <div>
            {{ session()->get('success') }}
        </div>
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger">
        <div>
            {{ session()->get('error') }}
        </div>
    </div>
@endif
