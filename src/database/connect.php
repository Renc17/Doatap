<?php
    function Connect_Database() {
        $serverHost = 'localhost';
        $serverName = 'root';
        $serverPassword = '';
        $databaseName = 'sdi1700218';

        $conn = new mysqli($serverHost, $serverName, $serverPassword, $databaseName);

        if ($conn->connect_error) {
            die('Database connection error: ' . $conn->connect_error);
        }

        echo "Connected successfully";
        return $conn;
    }
 
    function Disconnect_Database($conn){
        $conn -> close();
        echo "Disconnected successfully";
    }
?>