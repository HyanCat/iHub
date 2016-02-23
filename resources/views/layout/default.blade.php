<?php
/**
 * This file is part of iHub.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */
?>

@extends('layout.base')

@section('base-title')
	{{ config('app.name') }} -- @yield('title')
@stop

@section('base-style')
	<link href="https://cdn.bootcss.com/semantic-ui/1.12.2/semantic.min.css" rel="stylesheet">
	<link href="https://cdn.bootcss.com/dropzone/4.3.0/min/dropzone.min.css" rel="stylesheet">
	@yield('style')
@stop

@section('base-body')

	@yield('header')

	<div class="body container">
		<div class="main-section container">
			@yield('content')
		</div>
	</div>

	<div class="ui section divider"></div>

	@yield('footer')

	@include('components.footer')

@stop

@section('base-script')
	<script src="https://cdn.bootcss.com/semantic-ui/1.12.2/semantic.min.js"></script>
	<script src="https://cdn.bootcss.com/dropzone/4.3.0/min/dropzone.min.js"></script>
	<script src="https://cdn.bootcss.com/clipboard.js/1.5.8/clipboard.min.js"></script>

	@yield('script')

@stop