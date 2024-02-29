<?php
    class User extends Conn {
        //Atributos da classe
        public object $conn;
        public array $formData;
        public int $id;
         
        public function list() :array {
            $this->conn = $this->conectar();
            $query = "SELECT u.* FROM usuarios u ORDER BY nome";
            $result = $this->conn->prepare($query);
            $result->execute();
            $retorno = $result->fetchAll();
            //var_dump($retorno);
            return $retorno;
        }

        //Só colocar a tipagem "bool", se no servidor tiver o php 8, caso contrario nao coloca.
        public function insert(): bool {
            $this->conn = $this->conectar();
            $query = "INSERT INTO usuarios (nome, email,cpf) VALUES (:nome, :email,:cpf)";
            $add_user = $this->conn->prepare($query);
            $add_user->bindParam(':nome', $this->formData['nome']);
            $add_user->bindParam(':email', $this->formData['email']);
            $add_user->bindParam(':cpf', $this->formData['cpf']);
            $add_user->execute();

            if ($add_user->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function view() {
            $this->conn = $this->conectar();
            $query = "SELECT * FROM usuarios WHERE id = :id LIMIT 1";
            $result = $this->conn->prepare($query);
            $result->bindParam(':id', $this->id);
            $result->execute();
            $retorno = $result->fetch();
            return $retorno;
        }

        public function edit() : bool {
            $this->conn = $this->conectar();
            $query = "UPDATE usuarios SET nome = :nome, email = :email, cpf = :cpf WHERE id = :id";
            $result = $this->conn->prepare($query);
            $result->bindParam(':nome', $this->formData['nome']);
            $result->bindParam(':email', $this->formData['email']);
            $result->bindParam(':cpf', $this->formData['cpf']);
            $result->bindParam(':id', $this->formData['id']);
            $result->execute();

            if ($result->rowCount()) {
                return true;
            } else {
                return false;
            }
        }

        public function delete() : bool{
            $this->conn = $this->conectar();
            $query = "DELETE FROM usuarios WHERE id = :id LIMIT 1";
            $result = $this->conn->prepare($query);
            $result->bindParam(':id', $this->id);
            $value = $result->execute();
            return $value;
        }
        
    
    }