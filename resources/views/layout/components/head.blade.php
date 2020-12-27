<head lang="{{ config('app.locale') }}">

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>TopFlop By @Les patrons</title>
	<link rel="shortcut icon" href="{{ asset('img/fav.ico') }}" type="image/x-icon">
	<link rel="icon" href="{{ asset('img/fav.ico') }}" type="image/x-icon">

	<!-- Fonts -->
	<link href="//fonts.googleapis.com/css?family=Yantramanav:100,300,400,500,700,900&amp;subset=devanagari,latin-ext" rel="stylesheet">

	<!-- styles -->
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.7.7/dist/semantic.min.css">
	<link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}">

	<script src="{{ asset('js/app.js') }}" defer></script>

	<noscript>
		<style type="text/css">
			main {
				width: calc(100vw - 410px);
				margin-left: 410px;
			}
			.button-main-menu.style3.open {
				display: none;
			}
		</style>
	</noscript>
</head>
