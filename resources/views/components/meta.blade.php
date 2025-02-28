@php
    $page_title = isset($title) ? ($title ?: cache('seo_judul_home')) : cache('seo_judul_home');
    $page_description = isset($description)
        ? ($description ?:
        cache('seo_deskripsi_home'))
        : cache('seo_deskripsi_home');
    $page_keywords = isset($keywords) ? ($keywords ?: cache('seo_keyword_home')) : cache('seo_keyword_home');
    $page_image = isset($image) ? ($image ?: cache('seo_gambar_home')) : cache('seo_gambar_home');
    $page_url = request()->fullUrl();
@endphp

    <title>{{ $page_title }}{{ request()->routeIs(['news.detail','product.detail']) ? ' - ' . cache('app_name') : '' }}</title>
    @env('production')

    <meta name="robots" content="index, follow" >
    @else

    <meta name="robots" content="noindex, nofollow" >
    @endenv
    <meta name="author" content="{{ cache('app_name') }}">
    <!-- Primary Meta Tags -->
    <meta name="title" content="{{ $page_title }}{{ request()->routeIs(['news.detail','product.detail']) ? ' - ' . cache('app_name') : '' }}" />
    <meta name="description" content="{{ $page_description }}" />
    <meta name="keywords" content="{{ $page_keywords }}" />
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page_url }}" />
    <meta property="og:title" content="{{ $page_title }}" />
    <meta property="og:description" content="{{ $page_description }}" />
    <meta property="og:image" content="{{ url($page_image) }}" />
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{ $page_url }}" />
    <meta property="twitter:title" content="{{ $page_title }}" />
    <meta property="twitter:description" content="{{ $page_description }}" />
    <meta property="twitter:image" content="{{ url($page_image) }}" />