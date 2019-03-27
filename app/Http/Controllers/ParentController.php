<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

class ParentController extends Controller
{
	public $session = NULL;
	
	public function __construct()
	{
		$this->session = new Session();
	}
	
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
