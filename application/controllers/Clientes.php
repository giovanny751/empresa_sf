<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Clientes extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Clientes__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('clientes/index', $this->data);
    }
    function consult_clientes(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Clientes__model->consult_clientes($post);
        $this->layout->view('clientes/consult_clientes', $this->data);
    }
    function save_clientes(){
        $post=$this->input->post();
                $id=$this->Clientes__model->save_clientes($post);
        
                        
        redirect('index.php/Clientes/consult_clientes', 'location');
    }
    function delete_clientes(){
        $post=$this->input->post();
        $this->Clientes__model->delete_clientes($post);
        redirect('index.php/Clientes/consult_clientes', 'location');
    }
    function edit_clientes(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Clientes/consult_clientes', 'location');
        $this->data['datos']=$this->Clientes__model->edit_clientes($this->data['post']);
        $this->layout->view('clientes/index', $this->data);
    }
    }
?>
