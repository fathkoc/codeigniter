<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Veripay_Controller extends CI_Controller
{
    private $user;

    function __construct()
    {
        parent:: __construct();
        $this->load->model('Veripay_Model');
    }



}


