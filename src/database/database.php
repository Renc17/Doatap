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
    
            $stmt = $this->executeQuery($query, $data);
            $id = $stmt->insert_id;
            return $id;
        }

        // function __destruct(){
        //     Disconnect_Database($this->connection);
        // }
    }   
?>