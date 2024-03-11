<?php
    
    // if ( isset ($name) || isset ($number) || isset ($gender) || isset ($password) )  { 

    // $email = $_POST['email'];
    // $number = $_POST['number'];
    // $gender = $_POST['gender'];
    // $password = $_POST['password'];
    // echo(ssiss, $name, $email, $number, $gender, $password);
    // if(isset($_POST["name"])){
    //     $name = $_POST["name"];
    //     echo $name;
    // }


    // $name = "hello world";
    // echo $name;


    if (isset($name) || isset($email) || isset($number) || isset($gender) || isset($password)){
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $bdname = "admin";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $bdname);

        if (mysqli_connect_error()) {
            die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
        } else {
            $SELECT = "SELECT email From register Where email = ? Limit 1";
            $INSERT = "INSERT Into register (name, email, number, gender, password) values(?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($email);
            $stmt->store_result();
            $rnum = $stmt->num_rows;

            if ($rnum==0){
                $stmt->close();

                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("ssiss", $name, $email, $number, $gender, $password);
                $stmt->execute();
                echo "registration successfull....";
            } else {
                echo"Duplicate data";
            }
            $stmt->close();
            $stmt->close();
        }    
    } else {
        echo "All fields are required";
        die();
    }




    // $conn = new mysqli('localhost','root','','admin');
    // if($conn->connect_error){
    //     die('connection Failed : '.$connect_error);
    // }else{
    //     $stmt = $conn->prepare("insert into registration(name, email, number, gender, password)
    //         value(?, ?, ?, ?, ?)");
    //     $stmt->bind_param("ssiss", $name, $email, $number, $gender, $password);
    //     $stmt->execute();
    //     echo "registration successfull....";
    //     $stmt->close();
    //     $stmt->close();
    // }


    // }

    
?>