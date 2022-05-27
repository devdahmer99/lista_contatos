<?php
include 'Contato.php';

$contato = new Contato();
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/estilo.css"/>
    <title>Contatos</title>
</head>
  <body class="container"><br/><br/>
  <h1>Lista de Contatos:</h1><br/><br/>

  <button class=" btn btn-primary" class="add"><a href="adicionar.php">Adicionar Contato</a></button><br/><br/>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">E-mail</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    

    <?php
      $lista = $contato->getAll();
      foreach($lista as $item):
      ?>
    <tr>
      <th scope="row"><?php echo $item['id'];?></th>
      <td><?php echo $item['nome'];?></td>
      <td><?php echo $item['email'];?></td>
      <td>
          <a class="link1"  href="editar.php?id=<?php echo $item['id'];?>" >Editar</a> - <a class="link2" href="excluir.php?id=<?php echo $item['id'];?>">Excluir</a>
      </td>
    </tr>
      <?php endforeach; ?>
  </tbody>
</table> 


</body>
</html>