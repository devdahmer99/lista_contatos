<?php
include 'Contato.php';
$contato = new Contato();

if(!empty($_POST['email'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $contato->insere($email, $nome);

    header("Location: index.php");
}