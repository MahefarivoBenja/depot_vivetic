<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Home extends CI_Controller {

        public $idPiece;
        public $urlAttachment;
        public $save_attach;

        function __construct() 
        {
            parent::__construct();

        }
        public function index()
        {
            echo 'xx';
        }

    }