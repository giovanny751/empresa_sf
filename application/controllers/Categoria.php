<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categoria extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Categoria__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('categoria/index', $this->data);
    }
    function consult_categoria(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Categoria__model->consult_categoria($post);
        $this->layout->view('categoria/consult_categoria', $this->data);
    }
    function save_categoria(){
        $post=$this->input->post();
                $id=$this->Categoria__model->save_categoria($post);
        
                        
        redirect('index.php/Categoria/consult_categoria', 'location');
    }
    function delete_categoria(){
        $post=$this->input->post();
        $i=$this->Categoria__model->delete_categoria($post);
        if($i>0){
            $this->session->set_flashdata(array('message' => 'No se puede eliminar la categoria porque tiene productos asociados', 'message_type' => 'warning'));
        }
        redirect('index.php/Categoria/consult_categoria', 'location');
    }
    function edit_categoria(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Categoria/consult_categoria', 'location');
        $this->data['datos']=$this->Categoria__model->edit_categoria($this->data['post']);
        $this->layout->view('categoria/index', $this->data);
    }
    }
?>
