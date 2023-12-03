<?php
// Include your database connection file
include_once('./connect.php');
$sql = "SELECT username FROM users";
$result = mysqli_query($conn, $sql);

if ($result) {
    $userList = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $userList[] = $row['username'];
    }
    mysqli_close($conn);
    echo json_encode($userList);
} else {
    echo json_encode(array('error' => 'Error fetching user list.'));
}
?>