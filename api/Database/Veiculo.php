<?php
    require_once('database.php');
    Class Veiculo {
        public static function add($marca, $modelo, $cor, $ano, $portas, $combustivel){
            $pdo = Database::connection();
            $sql = 'INSERT INTO veiculo(marca, modelo, cor, ano, portas, combustivel) VALUES (?, ?, ?, ?, ?, ?)';
            try{
                $query = $pdo->prepare($sql);
                $query->execute(array($marca, $modelo, $cor, $ano, $portas, $combustivel));
                if($query->rowCount() > 0){
                    return $pdo->lastInsertId();
                } else{
                    return $query->errorInfo();
                }
            }
            catch (Exception $ex){
                throw new Exception("Erro ao cadastrar Agendamento", 1);
            }
        }

        public static function find($id) {
            $pdo = Database::connection();
            $sql = 'SELECT * FROM veiculo WHERE id = ?';
            $query = $pdo->prepare($sql);
            $query->execute(array($id));
            return $query->fetch(PDO::FETCH_ASSOC);
        }

        public static function update($marca, $modelo, $cor, $ano, $portas, $combustivel, $id){
            $pdo = Database::connection();
            $sql = 'UPDATE veiculo SET marca=?, modelo=?, cor=?, ano=?, portas=?, combustivel=? WHERE id=?';
            $query = $pdo->prepare($sql);
            $query->execute(array($marca, $modelo, $cor, $ano, $portas, $combustivel, $id));
            return $query->fetch(PDO::FETCH_ASSOC); 
        }

        public static function all(){
            $pdo = Database::connection();
            $sql = 'SELECT * FROM veiculo';
            $query = $pdo->query($sql);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function delete($id){
            $pdo = Database::connection();
            $sql = 'DELETE FROM veiculo WHERE id=?';
            $query = $pdo->prepare($sql);
            $query->execute(array($id));
            return $query->rowCount() > 0;
        }
    }
?>