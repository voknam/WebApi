<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

/**
 * 
 */
class Kontak extends REST_Controller
{
	
	public function index_get()
	{
		$id = $this->get('id');
		if ($id === null) {
			$kontak = $this->kontakModel->getKontak();
		}else{
			$kontak = $this->kontakModel->getKontak($id);
		}
		
		if ($kontak) {
			 $this->response([
                    'status' => true,
                    'data' => $kontak
                ], REST_Controller::HTTP_OK);
		}else{
			 $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	// public function index_delete()
	// {
	// 	$id = $this->delete('id');

	// 	if ($id === null) {
	// 		$this->response([
 //                    'status' => false,
 //                    'message' => 'provide an id!'
 //                ], REST_Controller::HTTP_BAD_REQUEST);
	// 	}else{
	// 		if (condition) {
	// 			# code...
	// 		}
	// 	}
	// }
}