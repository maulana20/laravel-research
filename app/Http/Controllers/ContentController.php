<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;

class ContentController extends Controller
{
	function index()
	{
		$data = Content::get();
		return $data;
}
