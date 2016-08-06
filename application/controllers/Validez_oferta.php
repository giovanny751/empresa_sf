<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Validez_oferta extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Validez_oferta__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('validez_oferta/index', $this->data);
    }
    function consult_validez_oferta(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Validez_oferta__model->consult_validez_oferta($post);
        $this->layout->view('validez_oferta/consult_validez_oferta', $this->data);
    }
    function save_validez_oferta(){
        $post=$this->input->post();
                $id=$this->Validez_oferta__model->save_validez_oferta($post);
        
                        
        redirect('index.php/Validez_oferta/consult_validez_oferta', 'location');
    }
    function delete_validez_oferta(){
        $post=$this->input->post();
        $this->Validez_oferta__model->delete_validez_oferta($post);
        redirect('index.php/Validez_oferta/consult_validez_oferta', 'location');
    }
    function edit_validez_oferta(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Validez_oferta/consult_validez_oferta', 'location');
        $this->data['datos']=$this->Validez_oferta__model->edit_validez_oferta($this->data['post']);
        $this->layout->view('validez_oferta/index', $this->data);
    }
    }
?>
