<?php
    function createUser($conn,$fName, $lName,$citizenship,$email,$dob,$phone,$privilege,$password){
        $sql = "INSERT INTO User(privilegeName, firstName, lastName, citizenship, email, phoneNumber, dob, password) VALUES(?,?,?,?,?,?,?,?)";
        
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
           header("location: index.php?error=invalid");
           exit();
        } 

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
     

   
        mysqli_stmt_bind_param($stmt, "ssssssss",$privilege, $fName, $lName,$citizenship,$email,$phone,$dob,$hashedPwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: index.php?error=none");
        exit();
        // $resultData = mysqli_stmt_get_result($stmt);

        // if($row = mysqli_fetch_assoc($resultData)) {
        //     return $row;
        // } else {
        //     $result = false;
        //     return $result;
        // }
        
        //$privilege,$fName,$lName,$citizenship,$email,$dob,$phone,$email,$privilege,$password
    }

    function checkUid($conn, $email){
        $sql = "SELECT * FROM User WHERE email = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
           header("location: index.php?error=stmtinvalid");
           exit();
        } 

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        } else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function loginUser($conn, $username, $pwd){
        $uIDExists = checkUid($conn, $username);
        
        if($uIDExists === false) {
            header("location: index.php?error=wronglogin");
        }

        $pwdHashed = $uIDExists["password"];
        $checkPwd = password_verify($pwd, $pwdHashed);

        if($checkPwd === false){
            header("location: index.php?error=wronglogin");
            exit();
        } else if($checkPwd === true){
                session_start();
                $_SESSION["userID"] = $uIDExists["userID"];
                $_SESSION["username"] = $uIDExists["email"];
                $_SESSION["privilegeName"] = $uIDExists["privilegeName"];
               
                header("location: index.php?userLog=".$_SESSION["username"]."&".$_SESSION["privilegeName"]);
                exit();
        }
    }


