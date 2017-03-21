<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Productos extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Productos__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }

    function index() {
        $this->data['post'] = $this->input->post();
        $this->layout->view('productos/index', $this->data);
    }

    function consult_productos() {
        $post = $this->input->post();
        $this->data['post'] = $this->input->post();
        $this->data['datos'] = $this->Productos__model->consult_productos($post);
        $this->layout->view('productos/consult_productos', $this->data);
    }

    function save_productos() {
        $post = $this->input->post();
        $id = $this->Productos__model->save_productos($post);
        redirect('index.php/Productos/consult_productos', 'location');
    }
    function consultarReferencia() {
        $post = $this->input->post();
        echo $id = $this->Productos__model->consultarReferencia($post);
    }

    function delete_productos() {
        $post = $this->input->post();
        $this->Productos__model->delete_productos($post);
        redirect('index.php/Productos/consult_productos', 'location');
    }

    function edit_productos() {
        $this->data['post'] = $this->input->post();
        if (!isset($this->data['post']['campo']))
            redirect('index.php/Productos/consult_productos', 'location');
        $this->data['datos'] = $this->Productos__model->edit_productos($this->data['post']);
        $this->layout->view('productos/index', $this->data);
    }

}

?>
