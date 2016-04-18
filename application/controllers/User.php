<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('User__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('user/index', $this->data);
    }
    function consult_user(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->User__model->consult_user($post);
        $this->layout->view('user/consult_user', $this->data);
    }
    function save_user(){
        $post=$this->input->post();
                $id=$this->User__model->save_user($post);
        
                        
        redirect('index.php/User/consult_user', 'location');
    }
    function delete_user(){
        $post=$this->input->post();
        $this->User__model->delete_user($post);
        redirect('index.php/User/consult_user', 'location');
    }
    function edit_user(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/User/consult_user', 'location');
        $this->data['datos']=$this->User__model->edit_user($this->data['post']);
        $this->layout->view('user/index', $this->data);
    }
    }
?>
