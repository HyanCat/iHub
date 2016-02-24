<?php
/**
 * This file is part of iHub.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

return [
	'access_key'    => env('OSS_ACCESSKEY'),
	'access_secret' => env('OSS_ACCESSKEY_SECRET'),
	'https'         => env('OSS_ENABLE_HTTPS'),
	'endpoint'      => env('OSS_INTERNAL', false) ? env('OSS_SERVER_INTERNAL') : env('OSS_SERVER'),
	'cname'         => env('OSS_CNAME'),
	'bucket'        => env('OSS_BUCKET'),

	'object_prefix' => env('OSS_OBJECT_PREFIX'),
];