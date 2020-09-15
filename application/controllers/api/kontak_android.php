<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

use Restserver\Libraries\REST_Controller;

class Kontak_android extends REST_Controller {

    function __construct($config = 'rest') 
    {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get()
    { 
        $kontak = $this->db->get('telepon')->result();
        $this->response(array("result" => $kontak, 200));
    }

}