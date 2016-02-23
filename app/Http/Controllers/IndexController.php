<?php
/**
 * This file is part of iHub.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use OSS\Core\OssException;
use OSS\OssClient;

class IndexController extends Controller
{
	public function index()
	{
		return view('pages.index');
	}

	public function upload()
	{
		$file            = Request::file('file');
		$accessKeyId     = env('OSS_ACCESSKEY');
		$accessKeySecret = env('OSS_ACCESSKEY_SECRET');
		$endpoint        = 'https://' . (env('OSS_INTERNAL', false) ? env('OSS_SERVER_INTERNAL') : env('OSS_SERVER'));
		$bucket          = env('OSS_BUCKET');
		$object          = 'test/test_' . md5_file($file->getPathname()) . '.' . $file->getClientOriginalExtension();
		try {
			$ossClient = new OssClient($accessKeyId, $accessKeySecret, $endpoint);
			$ossClient->uploadFile($bucket, $object, $file->getPathname());
		} catch (OssException $e) {
			print $e->getMessage();
		}

		return response(['message' => $endpoint . '/' . $bucket . '/' . $object]);
	}
}