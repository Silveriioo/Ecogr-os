<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include_once('./functions/funtions.php');

    LoginUsuario();
} else {

    echo json_encode(['success' => false, 'message' => 'Requisição está errada ou invalida.']);
}
