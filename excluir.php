<?php 

include 'Contato.php';
$contato = new Contato();

if(!empty($_GET['id'])) {
    $id = $_GET['id'];

    $contato->deletar($id);

    header("Location: index.php");
    
} else { 
    header("Location: index.php");
}