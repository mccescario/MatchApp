@push('head')
<meta name="robots" content="noindex" />
<link href="{{ asset('/vendor/orchid/favicon.svg') }}" sizes="any" type="image/svg+xml" id="favicon" rel="icon">

<!-- For Safari on iOS -->
<meta name="theme-color" content="#21252a">
@endpush

<div class="h2 fw-light d-flex align-items-center">
    {{--
    <x-orchid-icon path="orchid" width="1.2em" height="1.2em" /> --}}
    <img src="/logo.png" height="35" alt="Logo">
    <p class="ms-3 my-0 d-none d-sm-block">
        MatchApp
        <!--<small class="align-top opacity">APP</small>-->
    </p>
</div>