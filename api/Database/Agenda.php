<?php
    require_once('database.php');
    Class Agenda {
        public static function add($data, $cpf, $nome, $idVeiculo, $observacao){
            $pdo = Database::connection();
            $sql = 'INSERT INTO agenda(data, cpf, nome, idVeiculo, observacao) VALUES (?, ?, ?, ?, ?)';
            try{
                $query = $pdo->prepare($sql);
                $query->execute(array($data, $cpf, $nome, $idVeiculo, $observacao));
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

        public static function available($data, $idVeiculo) {
            $pdo = Database::connection();
            $sql = 'SELECT * FROM agenda WHERE data=? AND idVeiculo = ?';
            $query = $pdo->prepare($sql);
            $query->execute(array($data, $idVeiculo));
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function all(){
            $pdo = Database::connection();
            $sql = 'SELECT * FROM agenda ORDER BY data ASC';
            $query = $pdo->query($sql);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function period($dataI, $dataF){
            $pdo = Database::connection();
            $sql = 'SELECT * FROM agenda WHERE data BETWEEN ? AND ? ORDER BY data ASC';
            $query = $pdo->prepare($sql);
            $query->execute(array($dataI, $dataF));
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>