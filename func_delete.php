<?php
include 'db_connection.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$do = isset($_GET['do']) ? $_GET['do'] : '';
$messsage = '';

if ($do === 'delete_personal') {
    $query = "DELETE FROM personal_record WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        $message = "Record deleted successfully";
    } else {
        $message = "Error deleting record: " . mysqli_error($conn);
    }
    header("Location: index.php?message=" . urlencode($message));
    exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
