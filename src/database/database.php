<?php
    require('connect.php');

    class Database {
        private $connection;

        function __construct(){
            $this->connection = Connect_Database();
        }

        function executeQuery($query, $data){
            $stmt = $this->connection->prepare($query);
            if ($stmt == FALSE){
                die('prepare() failed:' . htmlspecialchars($this->connection->error));
                exit();
            }
            $values = array_values($data);
            $types = str_repeat('s', count($values));
            $stmt->bind_param($types, ...$values);
            $stmt->execute();
            return $stmt;
        }
    
        function create($table, $data, $unique){
            if ($unique != null){
                $user = $this->select($table, [$unique => $data[$unique]]);
                if (!empty($user)){
                    $user = $user[0];
                    return $user[0];
                }
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
            
            $stmt = $this->executeQuery($query, $data);
            return $stmt->insert_id;
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

        function select($table, $conditiions){
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
            
            $query = $query . " ORDER BY created_at DESC";
            $stmt = $this->executeQuery($query, $conditiions);
            $rows = $stmt->get_result();
            $results = array();
            while ($row = $rows->fetch_array(MYSQLI_NUM)) {
                $results[] = $row;
            }
            return $results;
        }

        function JoinedSelection($table1 , $table2, $conditiions) {
            $query = "SELECT * FROM $table1 JOIN $table2";

            $i=0;
            foreach($conditiions as $key => $_){
                if ($i === 0) {
                    $query = $query . " WHERE $key=?";
                } else {
                    $query = $query . " AND $key=?";
                }
                $i++;
            }
            
            $query = $query . " ORDER BY created_at DESC";
            $stmt = $this->executeQuery($query, $conditiions);
            $rows = $stmt->get_result();
            $results = array();
            while ($row = $rows->fetch_array(MYSQLI_NUM)) {
                $results[] = $row;
            }
            return $results;
        }

        function delete($table, $conditiions){
            $query = "DELETE FROM $table";

            $i=0;
            foreach($conditiions as $key => $_){
                if ($i === 0) {
                    $query = $query . " WHERE $key=?";
                } else {
                    $query = $query . " AND $key=?";
                }
                $i++;
            }

            $this->executeQuery($query, $conditiions);
            return;
        }
        
        // function __destruct(){
        //     Disconnect_Database($this->connection);
        // }
    }   
?>