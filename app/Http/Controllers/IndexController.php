<?php
/**
 * This file is part of iHub.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace App\Http\Controllers;

class IndexController extends Controller
{
	public function index()
	{

		return app()->version();
	}
}