<?php
/**
 * This file is part of iHub.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace App\Services;

use Illuminate\Http\UploadedFile;
use OSS\Core\OssException;
use OSS\OssClient;

class OssService
{
	private $accessKey;
	private $accessSecret;
	private $endpoint;
	private $cname;
	private $protocol;

	protected $client;

	public function __construct()
	{
		$ossConfig          = config('oss');
		$this->accessKey    = $ossConfig['access_key'];
		$this->accessSecret = $ossConfig['access_secret'];
		$this->protocol     = $ossConfig['https'] ? 'https://' : 'http://';
		$this->endpoint     = $ossConfig['endpoint'];
		$this->cname        = $ossConfig['cname'];
		$this->bucket       = $ossConfig['bucket'];

		$this->client = new OssClient($this->accessKey, $this->accessSecret, $this->endpoint);
	}

	public function upload(UploadedFile $file)
	{
		$object = md5_file($file->getPathname()) . '.' . $file->getClientOriginalExtension();
		if (config('oss.object_prefix')) {
			$object = path_join(config('oss.object_prefix'), $object);
		}

		try {
			$this->client->uploadFile($this->bucket, $object, $file->getPathname());
		} catch (OssException $e) {
			print $e->getMessage();
		}

		return $this->protocol . path_join(($this->cname ?: $this->endpoint), $object);
	}
}