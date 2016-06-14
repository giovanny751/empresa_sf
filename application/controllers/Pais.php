<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pais extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Pais__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('pais/index', $this->data);
    }
    function consult_pais(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Pais__model->consult_pais($post);
        $this->layout->view('pais/consult_pais', $this->data);
    }
    function save_pais(){
        $post=$this->input->post();
                $id=$this->Pais__model->save_pais($post);
        
                        
        redirect('index.php/Pais/consult_pais', 'location');
    }
    function delete_pais(){
        $post=$this->input->post();
        $this->Pais__model->delete_pais($post);
        redirect('index.php/Pais/consult_pais', 'location');
    }
    function edit_pais(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Pais/consult_pais', 'location');
        $this->data['datos']=$this->Pais__model->edit_pais($this->data['post']);
        $this->layout->view('pais/index', $this->data);
    }
    }
?>
