<?php

function validate_login($logged_in) {
    $CI = & get_instance();
    if ($logged_in == FALSE) {
        $CI->session->set_flashdata(array('message' => '<strong>Error</strong> Debe Iniciar una Sesion.', 'message_type' => 'danger'));
        redirect('index.php/login', 'location');
    } else {
         $CI->session->userdata('session');
        $CI->db->where('session', $CI->session->userdata('session'));
//        $CI->db->where('usu_usuario', $username);
//        $CI->db->where('usu_contrasena', sha1($pass));
        $datos = $CI->db->get('user');
        $datos = $datos->result();
        if (!count($datos)) {
            $CI->session->set_userdata('logged_in', FALSE);
            $CI->session->sess_destroy();
            $CI->session->set_flashdata(array('message' => '<strong>Error</strong> Ya se encuentra otra session en otro equipo.', 'message_type' => 'danger'));
            redirect('index.php/login', 'location');
        }
    }
}
