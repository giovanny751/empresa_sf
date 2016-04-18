<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Forma_pago extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Forma_pago__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('forma_pago/index', $this->data);
    }
    function consult_forma_pago(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Forma_pago__model->consult_forma_pago($post);
        $this->layout->view('forma_pago/consult_forma_pago', $this->data);
    }
    function save_forma_pago(){
        $post=$this->input->post();
                $id=$this->Forma_pago__model->save_forma_pago($post);
        
                        
        redirect('index.php/Forma_pago/consult_forma_pago', 'location');
    }
    function delete_forma_pago(){
        $post=$this->input->post();
        $this->Forma_pago__model->delete_forma_pago($post);
        redirect('index.php/Forma_pago/consult_forma_pago', 'location');
    }
    function edit_forma_pago(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Forma_pago/consult_forma_pago', 'location');
        $this->data['datos']=$this->Forma_pago__model->edit_forma_pago($this->data['post']);
        $this->layout->view('forma_pago/index', $this->data);
    }
    }
?>
