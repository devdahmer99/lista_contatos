
<?php
include 'Contato.php';

$contato = new Contato();

if(!empty($_GET['id'])) {
    $id = $_GET['id'];

    $info = $contato->getInfo($id);

    if(empty($info['email'])) {
        header("Location: index.php");
        exit;
    }

} else {
    header('Location: index.php');
    exit;
}
?>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"/>

<h1 class="container-fluid">Editar:</h1><br/><br/>


<form method="POST" action="editar_submit.php" class="container-fluid">
    <input type="hidden" name="id" value="<?php echo $info['id'];?>"/>

    <label for="email" class="form-label"><strong>E-mail:</strong></label></br>
    <input type="email" class="form-control" name="email" id="id" value="<?php echo $info['email'];?>"/>

    <label for="nome" class="form-label">Nome:</label></br>
    <input type="text" class="form-control" name="nome" id="id"/></br></br>

    <input  class="btn btn-primary" type="submit" value="Salvar"/>
</form>