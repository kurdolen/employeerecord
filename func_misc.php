<?php
include 'db_connection.php';
$employeeID = isset($_GET['id']) ? $_GET['id'] : null;
$do = isset($_GET['do']) ? $_GET['do'] : '';


// Delete operations
if ($do === 'delete_service' && $employeeID) {
    $serviceID = isset($_GET['service_id']) ? $_GET['service_id'] : null;
    if ($serviceID) {
        $deleteQuery = "DELETE FROM service_record WHERE id = '$employeeID' AND service_id = '$serviceID'";
        if (mysqli_query($conn, $deleteQuery)) {
            header("Location: add_service.php?id=$employeeID");
            exit();
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }
}
if ($do === 'delete_rating' && $employeeID) {
    $ratingID = isset($_GET['rating_id']) ? $_GET['rating_id'] : null;
    if ($ratingID) {
        $deleteQuery = "DELETE FROM performance_rating WHERE id = '$employeeID' AND rating_id = '$ratingID'";
        if (mysqli_query($conn, $deleteQuery)) {
            header("Location: add_rating.php?id=$employeeID");
            exit();
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }
}

// Add operations
if ($do === 'add_service' && $employeeID) {
    $start = isset($_POST['service_start']) ? $_POST['service_start'] : '';
    $end = isset($_POST['service_end']) ? $_POST['service_end'] : '';
    $position = isset($_POST['position']) ? $_POST['position'] : '';
    $insertQuery = "INSERT INTO service_record (id, service_start, service_end, position) VALUES ('$employeeID', '$start', '$end', '$position')";
    if (mysqli_query($conn, $insertQuery)) {
        header("Location: add_service.php?id=$employeeID&message=Service+record+added+successfully");
        exit();
    } else {
        echo "Error adding record: " . mysqli_error($conn);
    }
}
if ($do === 'add_rating' && $employeeID) {
    $duration = isset($_POST['duration']) ? $_POST['duration'] : '';
    $year = isset($_POST['year']) ? $_POST['year'] : '';
    $rating = isset($_POST['rating']) ? $_POST['rating'] : '';
    
    $insertQuery = "INSERT INTO performance_rating (id, duration, _year, rating) VALUES ('$employeeID', '$duration', '$year', '$rating')";
    if (mysqli_query($conn, $insertQuery)) {
        header("Location: add_rating.php?id=$employeeID&message=Rating+added+successfully");
        exit();
    } else {
        echo "Error adding record: " . mysqli_error($conn);
    }
}