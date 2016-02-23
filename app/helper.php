<?php
/**
 * This file is part of iHub.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

if (! function_exists('elixir')) {
	/**
	 * Get the path to a versioned Elixir file.
	 *
	 * @param  string $file
	 * @return string
	 *
	 * @throws \InvalidArgumentException
	 */
	function elixir($file)
	{
		static $manifest = null;

		if (is_null($manifest)) {
			$manifest = json_decode(file_get_contents(base_path('public/build/rev-manifest.json')), true);
		}

		if (isset($manifest[$file])) {
			return '/build/' . $manifest[$file];
		}

		throw new InvalidArgumentException("File {$file} not defined in asset manifest.");
	}
}