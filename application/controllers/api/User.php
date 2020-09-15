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
class User extends REST_Controller
{
	
	function __construct($config = 'rest')
	{
		parent::__construct($config);
		$this->load->database();
	}


	function index_get()
	{
		 $kontak = $this->db->get('telepon')->result();
        $this->response(array("result" => $kontak, 200));
	}
	function index_post()
	{	
		$data = array(
			'id' => $this->input->post('id'),
			'nama' => $this->input->post('nama'),
			'nomor' => $this->input->post('nomor'));

		$insert = $this->db->insert('telepon', $data);

		if ($insert) {
			$this->response($data, 200);
		}else{
			$this->response(array('status' => 'fail', 502));
		}
	}
	function index_put()
	{
		$id = $this->put('id');
		$data = array(
			'id' => $this->put('id'),
			'nama' => $this->put('nama'),
			'nomor' => $this->put('nomor'));
		$this->db->where('id', $id);
		$update = $this->db->update('telepon', $data);

		if ($update) {
			$this->response($data, 200);
		}else{
			$this->response(array('status' => 'fail', 502));
		}
	}
	function index_delete()
	{
		$id = $this->delete('id');
		$this->db->where('id', $id);
		$delete = $this->db->delete('telepon');
		 if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}