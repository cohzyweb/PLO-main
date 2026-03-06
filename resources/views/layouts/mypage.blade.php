<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    {{-- <link href="https://vjs.zencdn.net/8.22.0/video-js.css" rel="stylesheet" />
    <script src="https://vjs.zencdn.net/8.22.0/video.min.js"></script> --}}
    <title>{{ config('app.name', 'PLOグループ') }}</title>
      <script>
//       (function(d) {
//   var config = {
//     kitId: 'asj2cdd',
//     scriptTimeout: 3000,
//     async: true
//   },
//   h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
// })(document);
</script>
    <link rel="icon" href="favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    @vite(['resources/scss/groupbase.scss', 'resources/js/group.js'])
    {{-- @vite(['resources/css/guest.css']) --}}
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @stack('styles')
  </head>
  
  <body>
    <!-- Header -->
    <x-public.group.header-front />

    <!-- Drawer -->
    <x-public.group.drawer />
    {{ $slot }}
    <!-- Footer -->
    <x-public.group.footer />
    @stack('scripts')
  </body>
</html>
