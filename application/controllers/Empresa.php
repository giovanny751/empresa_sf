<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Empresa extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Empresa__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('empresa/index', $this->data);
    }
    function consult_empresa(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Empresa__model->consult_empresa($post);
        $this->layout->view('empresa/consult_empresa', $this->data);
    }
    function save_empresa(){
        $post=$this->input->post();
                $id=$this->Empresa__model->save_empresa($post);
        
                        
        redirect('index.php/Empresa/consult_empresa', 'location');
    }
    function delete_empresa(){
        $post=$this->input->post();
        $this->Empresa__model->delete_empresa($post);
        redirect('index.php/Empresa/consult_empresa', 'location');
    }
    function edit_empresa(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Empresa/consult_empresa', 'location');
        $this->data['datos']=$this->Empresa__model->edit_empresa($this->data['post']);
        $this->layout->view('empresa/index', $this->data);
    }
    }
?>
