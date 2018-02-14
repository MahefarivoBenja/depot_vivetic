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
            $data['css'] = array('css/bootstrap.min',
                'css/bootstrap-reset',
                'theme/font-awesome/css/font-awesome',
                'css/style-responsive',
                'theme/dropzone/css/dropzone',
                'theme/dropzone/css/basic',
                'theme/toastr-master/toastr',
                'css/style'
            );
            $foot['js'] = array(
                'js/jquery',
                'js/bootstrap.min',
                'theme/dropzone/dropzone',
                'js/respond.min',
                'theme/toastr-master/toastr',
                'js/custom_js/custom_dropzone'
            );

            $data['title'] = "DEPOT VIVETIC";
            $data['page'] = "[PRE-PRODUCTION]";
            $this->load->view('header', $data);
            $this->load->view('depot/Depot');
            $this->load->view('footer', $foot);
        }

    }