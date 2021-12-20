<?php
    include 'connect.php';

    class Database {
        private $connection;

        function __construct(){
            $this->connection = Connect_Database();
        }

        function executeQuery($query, $data){
            $stmt = $this->connection->prepare($query);
            $values = array_values($data);
            $types = str_repeat('s', count($values));
            $stmt->bind_param($types, ...$values);
            $stmt->execute();
            return $stmt;
        }
    
        function create($table, $data){
            $user = $this->selectOne($table, ['email' => $data['email']]);
            if ($user){
                return $user['id'];
            }

            $query = "INSERT INTO $table SET ";
    
            $i = 0;
            foreach ($data as $key => $_) {
                if ($i === 0) {
                    $query = $query . " $key=?";
                } else {
                    $query = $query . ", $key=?";
                }
                $i++;
            }
    
           $this->executeQuery($query, $data);
        }

        function update($table, $id, $data){
            $query = "UPDATE $table SET ";

            $i = 0;
            foreach ($data as $key => $_) {
                if ($i === 0) {
                    $query = $query . " $key=?";
                } else {
                    $query = $query . ", $key=?";
                }
                $i++;
            }
            $query = $query . " WHERE id=?";
            $data['id'] = $id;
            $stmt = $this->executeQuery($query, $data);
            return $stmt->affected_rows;
        }

        function selectOne($table, $conditiions){
            $query = "SELECT * FROM $table";

            $i=0;
            foreach($conditiions as $key => $_){
                if ($i === 0) {
                    $query = $query . " WHERE $key=?";
                } else {
                    $query = $query . " AND $key=?";
                }
                $i++;
            }

            $stmt = $this->executeQuery($query, $conditiions);
            return $stmt->get_result()->fetch_assoc();
        }

        // function __destruct(){
        //     Disconnect_Database($this->connection);
        // }
    }   
?>