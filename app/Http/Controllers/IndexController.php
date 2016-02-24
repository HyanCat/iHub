<?php
/**
 * This file is part of iHub.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace App\Http\Controllers;

use App\Services\OssService;
use Illuminate\Support\Facades\Request;

class IndexController extends Controller
{
	public function index()
	{
		return view('pages.index');
	}

	public function upload()
	{
		$file    = Request::file('file');
		$ossFile = app(OssService::class)->upload($file);

		return response(['status_code' => 200, 'message' => ['file' => $ossFile]]);
	}
}