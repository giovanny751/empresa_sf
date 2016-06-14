<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ciudad extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Ciudad__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('ciudad/index', $this->data);
    }
    function consult_ciudad(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Ciudad__model->consult_ciudad($post);
        $this->layout->view('ciudad/consult_ciudad', $this->data);
    }
    function save_ciudad(){
        $post=$this->input->post();
                $id=$this->Ciudad__model->save_ciudad($post);
        
                        
        redirect('index.php/Ciudad/consult_ciudad', 'location');
    }
    function delete_ciudad(){
        $post=$this->input->post();
        $this->Ciudad__model->delete_ciudad($post);
        redirect('index.php/Ciudad/consult_ciudad', 'location');
    }
    function edit_ciudad(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Ciudad/consult_ciudad', 'location');
        $this->data['datos']=$this->Ciudad__model->edit_ciudad($this->data['post']);
        $this->layout->view('ciudad/index', $this->data);
    }
    }
?>
