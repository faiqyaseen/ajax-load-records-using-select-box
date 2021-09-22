<?php

    $conn = mysqli_connect("localhost","root","","test1") or die("Connection Failed.!");

    if(isset($_POST['loadcity'])){
        $sql = "SELECT distinct(city) FROM employee";
        $result = mysqli_query($conn,$sql) or die("Query Failed.!");

        if(mysqli_num_rows($result) > 0){
            $output = mysqli_fetch_all($result , MYSQLI_ASSOC);
            echo json_encode($output);
        }else{
            echo "No Record Found.!";
        }
    }
   
    if(isset($_POST['city'])){
        $city = $_POST['city'];
        $sql = "SELECT * FROM employee WHERE city = '{$city}' ";
        $result = mysqli_query($conn,$sql) or die("Query Failed.!");

        $output = "";
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['age']}</td>
                    <td>{$row['city']}</td>
                </tr>";

            }
        }else{
            echo "No Record Found.!";
        }
    }

?>