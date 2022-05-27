<?php


class Contato {

    private $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:dbname=crud-php;hostname=localhost", "root", "");
    }

    public function insere($email, $nome = '') {
        if($this->existeEmail($email) == false) {
            $sql = "INSERT INTO contatos (nome, email) VALUES (:nome, :email)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->execute();
        } else {
            return false;
        }
    }

    public function getInfo($id) {
        $sql = "SELECT * FROM contatos WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return $sql->fetch();
        } else {
            echo "Erro ao buscar as informações";
        }
    }

    public function getAll() {
        $sql = "SELECT * FROM contatos";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return array();
        }
    }

    public function editar($nome, $email, $id) {
            if($this->existeEmail($email) == false) {
                $sql = "UPDATE contatos SET nome = :nome, email = :email WHERE id = :id";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(':nome', $nome);
                $sql->bindValue(':email', $email);
                $sql->bindValue(':id', $id);
                $sql->execute();

                return true;
            } else {
                echo "O e-mail ja existe em base!";
            }
    }

    public function deletar($id) {
            $sql = "DELETE FROM contatos WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
        
    }

    private function existeEmail($email) {
        $sql = "SELECT * FROM contatos WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}