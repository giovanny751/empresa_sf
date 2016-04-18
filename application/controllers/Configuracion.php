<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Configuracion extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Configuracion__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('configuracion/index', $this->data);
    }
    function consult_configuracion(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Configuracion__model->consult_configuracion($post);
        $this->layout->view('configuracion/consult_configuracion', $this->data);
    }
    function save_configuracion(){
        $post=$this->input->post();
                $id=$this->Configuracion__model->save_configuracion($post);
        
                        
        redirect('index.php/Configuracion/consult_configuracion', 'location');
    }
    function delete_configuracion(){
        $post=$this->input->post();
        $this->Configuracion__model->delete_configuracion($post);
        redirect('index.php/Configuracion/consult_configuracion', 'location');
    }
    function edit_configuracion(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Configuracion/consult_configuracion', 'location');
        $this->data['datos']=$this->Configuracion__model->edit_configuracion($this->data['post']);
        $this->layout->view('configuracion/index', $this->data);
    }
    }
?>
