<?php
/**
 * This file is part of iHub.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */
?>

<!DOCTYPE html>
<html lang="zh_CN">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('base-title')</title>

	@yield('base-meta')


	<link href="https://cdn.bootcss.com/normalize/3.0.3/normalize.min.css" rel="stylesheet">


	@yield('base-style')

</head>
<body>

@yield('base-body')

<script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>

@if (config('app.debug'))
	<script type="text/javascript">
		document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>')
	</script>
@endif

@yield('base-script')

</body>
</html>
