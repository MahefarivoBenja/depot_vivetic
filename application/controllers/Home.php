<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Home extends CI_Controller {

        public $idPiece;
        public $urlAttachment;
        public $save_attach;
        public $id_remontee = 0;
        public $id_piece    = 0;
        public $id_discus   = 0;

        function __construct() 
        {
            parent::__construct();
            $this->load->model('Theme/Theme_Model','Mtheme');
            $this->load->model('Home/Home_Model','Mhome');
            $this->session->set_userdata('ref', 'CLI_');
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
                'css/font-awesome-animation',
                'css/style'
            );
            $foot['js'] = array(
                'js/jquery',
                'js/bootstrap.min',
                'theme/dropzone/dropzone',
                'js/respond.min',
                'theme/toastr-master/toastr',
                'js/custom_js/custom_dropzone',
                'js/custom_js/depot'
            );

            $data['theme'] = $this->Mtheme->get_theme();
            $data['title'] = "DEPOT VIVETIC";
            $data['page']  = "[PRE-PRODUCTION]";
            $this->load->view('header', $data);
            $this->load->view('depot/Depot');
            $this->load->view('footer', $foot);
        }
        public function insert_in_db()
        {
            $nb_liste_file      = count($this->input->post('listFile'));
            $array_remontee     = array();
            $array_piecejonte   = array();
            $array_discuss      = array();
            $return             = array();

            if($nb_liste_file > 0)
            {
                $liste_fichier                      = implode('|', $this->input->post('listFile'));
                $array_piecejonte['nom_fichier']    = $liste_fichier;
            }
            if($this->input->post('comment'))
            {
                $array_remontee['reponse_do']       = $this->input->post('comment');
                $array_piecejonte['commentaire']    = $this->input->post('comment');
                $array_discuss['discussion']        = $this->input->post('comment');
            }
            if($this->input->post('detail'))
            {
                $array_remontee['detail']           = $this->input->post('detail');
            }
            if($this->input->post('quantite'))
            {
                $array_remontee['quantite']         = $this->input->post('quantite');
            }

            $ref =  $this->Mhome->get_last_ref((int)$this->input->post('typologie'));

            $array_remontee['fk_id_typologie']  = $this->input->post('typologie');
            $array_remontee['fk_id_theme']      = $this->input->post('theme');
            $array_remontee['sender']           = 2;
            $array_remontee['alerte']           = 1;
            $array_remontee['id_statut_vv']     = 7;
            $array_remontee['id_statut_do']     = 6;
            $array_remontee['reference']        = $ref;
            $array_remontee['date_remontee']    = date("Y-m-d H:i:s");

            /*insertion remontee*/
            $this->id_remontee = $this->Mhome->insert_remontee($array_remontee);

            /*insertion dans piecejointe*/
            $return['retour'] = 1;
            if($this->id_remontee > 0)
            {
                if( $nb_liste_file > 0)
                {
                    $array_piecejonte['id_remontee']    = $this->id_remontee;
                    $array_piecejonte['date']           = date("Y-m-d H:i:s");
                    $this->id_piece                     = $this->Mhome->insert_piece($array_piecejonte);

                    if($this->id_piece <= 0)
                    {
                        $return['retour'] = 0;
                    }
                }

                $array_discuss['id_remontee']           = $this->id_remontee;
                $array_discuss['id_piece']              = $this->id_piece;
                $array_discuss['type']                  = 2;
                $array_discuss['date_discussion']       = date("Y-m-d H:i:s");
                $this->id_discus                        = $this->Mhome->insert_discussion($array_discuss);

                if( $this->id_discus <= 0)
                {
                    $return['retour'] = 0;
                }
            }
            else
            {
                $return['retour'] = 0;
            }

            if( $return['retour'] == 0)
            {
                $this->Mhome->delete_remontee($this->id_remontee);
            }
            echo json_encode($return);
        }

    }