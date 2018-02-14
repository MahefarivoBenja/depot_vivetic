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
        $this->conf['upload_path'] = '../remontee_attachment/';
        $this->conf['allowed_types'] = '*';
        $this->conf['max_filename'] = '255';
        $this->conf['remove_spaces'] = true;
        $this->conf['overwrite'] = false;
        $this->conf['encrypt_name'] = false;
        $this->conf['max_size'] = '1073741';
        $this->load->library('upload', $this->conf);
    }

    public function index()
    {
        var_dump($_FILES);
        if (!$this->upload->do_upload('file'))
        {
            echo "1".$this->upload->display_errors();
        }
        else
        {
            $res_file = $this->upload->data();
            var_dump($res_file);
        }
    }
}