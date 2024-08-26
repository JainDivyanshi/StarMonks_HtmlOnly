<?php
 include 'sqlconnect.php';

 $first = $_POST['first'];
 $last = $_POST['last'];
 $uid = $_POST['uid'];
 $pwd = $_POST['pwd'];

 $sql = "INSERT INTO gamedb.gamers (first, last, uid, pwd) VALUES ('$first', '$last', '$uid', '$pwd')";

 if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: login.php");