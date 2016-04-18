<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Garantia extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Garantia__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('garantia/index', $this->data);
    }
    function consult_garantia(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Garantia__model->consult_garantia($post);
        $this->layout->view('garantia/consult_garantia', $this->data);
    }
    function save_garantia(){
        $post=$this->input->post();
                $id=$this->Garantia__model->save_garantia($post);
        
                        
        redirect('index.php/Garantia/consult_garantia', 'location');
    }
    function delete_garantia(){
        $post=$this->input->post();
        $this->Garantia__model->delete_garantia($post);
        redirect('index.php/Garantia/consult_garantia', 'location');
    }
    function edit_garantia(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Garantia/consult_garantia', 'location');
        $this->data['datos']=$this->Garantia__model->edit_garantia($this->data['post']);
        $this->layout->view('garantia/index', $this->data);
    }
    }
?>
