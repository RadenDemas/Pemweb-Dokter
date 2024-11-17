<?php
    require "db.php";
    function isAdmin($role) : bool {
        if($role === "admin") return true;
        else return false;
    }

    function isVerified($card) : bool {
        if($card === "verified") return true;
        else return false;
    }

    function query($query){
        global $conn;
        $result = mysqli_query($conn,$query);
        $rows = [];
        while($row = mysqli_fetch_array($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function deleteRow($id){
        global $conn;
        $query = "DELETE FROM users WHERE id = $id";        
        mysqli_query($conn,$query);
    }
?>