<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tiempo_entrega extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Tiempo_entrega__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('tiempo_entrega/index', $this->data);
    }
    function consult_tiempo_entrega(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Tiempo_entrega__model->consult_tiempo_entrega($post);
        $this->layout->view('tiempo_entrega/consult_tiempo_entrega', $this->data);
    }
    function save_tiempo_entrega(){
        $post=$this->input->post();
                $id=$this->Tiempo_entrega__model->save_tiempo_entrega($post);
        
                        
        redirect('index.php/Tiempo_entrega/consult_tiempo_entrega', 'location');
    }
    function delete_tiempo_entrega(){
        $post=$this->input->post();
        $this->Tiempo_entrega__model->delete_tiempo_entrega($post);
        redirect('index.php/Tiempo_entrega/consult_tiempo_entrega', 'location');
    }
    function edit_tiempo_entrega(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Tiempo_entrega/consult_tiempo_entrega', 'location');
        $this->data['datos']=$this->Tiempo_entrega__model->edit_tiempo_entrega($this->data['post']);
        $this->layout->view('tiempo_entrega/index', $this->data);
    }
    }
?>
