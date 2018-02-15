<?php
/**
 * Created by PhpStorm.
 * User: 9420
 * Date: 14/02/2018
 * Time: 14:46
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Upload extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->conf['upload_path'] = '../remontee_attachment/depot/';
        $this->conf['allowed_types'] = '*';
        $this->conf['max_filename'] = '255';
        $this->conf['remove_spaces'] = false;
        $this->conf['overwrite'] = false;
        $this->conf['detect_mime'] = false;
        $this->conf['encrypt_name'] = false;
        $this->conf['max_size'] = '1073741';
        $this->load->library('upload', $this->conf);
    }

    public function index()
    {

        if (!$this->upload->do_upload('file'))
        {
            echo "error_upload";

        }
        else
        {
            $res_file = $this->upload->data();
            echo $res_file['file_name'];
        }
    }

    public function delete()
    {

        $path =  $this->conf['upload_path'].$_POST['myfile'];
        unlink($path);
    }
}