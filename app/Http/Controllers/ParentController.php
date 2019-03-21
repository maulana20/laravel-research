<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParentController extends Controller
{
	public function printResponse($status, $message = NULL, $content = NULL)
	{
		$response = NULL;
		$response['status'] = $status;
		$response['message'] = $message;
		$response['content'] = $content;
		
		echo json_encode($response);
		exit();
	}
}
