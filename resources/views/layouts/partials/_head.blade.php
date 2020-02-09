<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Free Business Process Documentation Software - {{ config('app.name') }}</title>

<!-- Styles -->
<link rel="stylesheet" href="{{ mix('css/app.css') }}" >
<link rel="icon" type="image/png" href="/favicon.png">
@yield('styles')