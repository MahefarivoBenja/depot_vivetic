<?php 
class Server_error extends CI_Controller 
{
 public function __construct() 
 {
    parent::__construct(); 
 } 

 public function index() 
 { 
    $this->load->view('Server_error');//loading in custom error view
 } 
} 