@php
  $siteTitle = $settings->seo_site_title ?? 'Eagle High Flyer';
  $siteDesc  = $settings->seo_site_description ?? 'Eagle High Flyer MMA & Combat Sports';

  $seoTitle = $pageTitle ?? $siteTitle;
  $seoDesc  = $pageDesc  ?? $siteDesc;
$seoKeywords = $pageKeywords ?? ($settings->seo_keywords ?? '');

  $ogImg = null;
  if (!empty($pageOgImage)) {
      $ogImg = $pageOgImage;
  } elseif (!empty($settings->seo_default_og_image)) {
      $ogImg = asset('storage/'.$settings->seo_default_og_image);
  }
@endphp

<title>{{ $seoTitle }}</title>
<meta name="description" content="{{ $seoDesc }}">

<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDesc }}">
@if(!empty($seoKeywords))
<meta name="keywords" content="{{ $seoKeywords }}">
@endif

<meta property="og:type" content="website">
@if($ogImg)
<meta property="og:image" content="{{ $ogImg }}">
@endif

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seoTitle }}">
<meta name="twitter:description" content="{{ $seoDesc }}">
@if($ogImg)
<meta name="twitter:image" content="{{ $ogImg }}">
@endif
