<?php
include 'db_connection.php';

// Variable assignment and form processing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //personal record
    $name = isset($_POST["name"]) ? $_POST["name"] : '';
    $address = isset($_POST["address"]) ? $_POST["address"] : '';
    $dob = isset($_POST["dob"]) ? $_POST["dob"] : '';
    $civil_status = isset($_POST["civil_status"]) ? $_POST["civil_status"] : '';
    $contact = isset($_POST["contact"]) ? $_POST["contact"] : '';
    $email = isset($_POST["email"]) ? $_POST["email"] : '';

    //employment status
    $position = isset($_POST["position"]) ? $_POST["position"] : '';
    $doa = isset($_POST["doa"]) ? $_POST["doa"] : '';
    $salary = isset($_POST["salary"]) ? $_POST["salary"] : '';
    $office = isset($_POST["office"]) ? $_POST["office"] : '';
    $status = isset($_POST["employment_status"]) ? $_POST["employment_status"] : '';
    $eligibility = isset($_POST["eligibility"]) ? $_POST["eligibility"] : '';
    $tin = isset($_POST["tin"]) ? $_POST["tin"] : '';
    $philhealth = isset($_POST["philhealth"]) ? $_POST["philhealth"] : '';
    $pagibig = isset($_POST["pagibig"]) ? $_POST["pagibig"] : '';
    $gsis = isset($_POST["gsis"]) ? $_POST["gsis"] : '';

    //service record
    if (!empty($_POST['service_record']) && count(array_filter($_POST['service_record'])) > 0) {
        $starts = $_POST['service_start'];
        $ends = $_POST['service_end'];
        $positions = $_POST['service_record'];

        $filtered_positions = [];
        $filtered_starts = [];
        $filtered_ends = [];

        for ($i = 0; $i < count($positions); $i++) {
            $service_position = trim($positions[$i]);

            if ($service_position !== '' && $service_position !== null) {
                $filtered_positions[] = $service_position;
                $filtered_starts[] = isset($starts[$i]) ? $starts[$i] : '';
                $filtered_ends[] = isset($ends[$i]) ? $ends[$i] : '';
            }
        }
    }

    //performance rating
    if (!empty($_POST['rating']) && count(array_filter($_POST['rating'])) > 0) {
        $durations = $_POST['duration'];
        $years = $_POST['year'];
        $ratings = $_POST['rating'];

        $filtered_ratings = [];
        $filtered_durations = [];
        $filtered_years = [];

        for ($i = 0; $i < count($ratings); $i++) {
            $performance_rating = trim($ratings[$i]);

            if ($performance_rating !== '' && $performance_rating !== null) {
                $filtered_ratings[] = $performance_rating;
                $filtered_durations[] = isset($durations[$i]) ? $durations[$i] : '';
                $filtered_years[] = isset($years[$i]) ? $years[$i] : null;
            }
        }
    }
}

// Insert data into the personal_record table
$stmt = $conn->prepare("INSERT INTO personal_record 
                        (name, address, date_of_birth, civil_status, contact, email, position, date_of_appointment, salary, 
                        office, employment_status, eligibility, tin, philhealth, pagibig, gsis) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssssssss", 
                        $name, $address, $dob, $civil_status, $contact, $email, $position, $doa, $salary, 
                        $office, $status, $eligibility, $tin, $philhealth, $pagibig, $gsis);

if ($stmt->execute()) {
    echo "Record inserted successfully!";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();

// Get the last inserted employee ID
$employee_id = $conn->insert_id;

// Insert service records if available
if (isset($filtered_positions) && count($filtered_positions) > 0) {
    $stmt = $conn->prepare("INSERT INTO service_record (id, position, service_start, service_end) VALUES (?, ?, ?, ?)");
    foreach ($filtered_positions as $index => $position) {
        $start_date = isset($filtered_starts[$index]) ? $filtered_starts[$index] : '';
        $end_date = isset($filtered_ends[$index]) ? $filtered_ends[$index] : '';
        $stmt->bind_param("isss", $employee_id, $position, $start_date, $end_date);
        if (!$stmt->execute()) {
            echo "Error inserting service record: " . $stmt->error;
        }
    }
    $stmt->close();
}

//Insert performance ratings if available
if (isset($filtered_ratings) && count($filtered_ratings) > 0) {
    $stmt = $conn->prepare("INSERT INTO performance_rating (id, rating, duration, _year) VALUES (?, ?, ?, ?)");
    foreach ($filtered_ratings as $index => $rating) {
        $duration = isset($filtered_durations[$index]) ? $filtered_durations[$index] : '';
        $year = isset($filtered_years[$index]) ? $filtered_years[$index] : null;
        $stmt->bind_param("issi", $employee_id, $rating, $duration, $year);
        if (!$stmt->execute()) {
            echo "Error inserting performance rating: " . $stmt->error;
        }
    }
    $stmt->close();
}

// Handle image upload
$pdo = new PDO('mysql:host=localhost;dbname=employee_record', 'root', '');
$id = $employee_id; // Use the last inserted employee ID

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $targetDir = "uploads/";
    $defaultFileName = "img/default_profile.jpg";
    $fileName = $defaultFileName;

    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($imageFileType, $allowedTypes)) {
            $uniqueId = uniqid();
            $safeName = preg_replace('/[^A-Za-z0-9_\-]/', '_', $name);
            $fileName = $targetDir . $safeName . '_' . $uniqueId . '.' . $imageFileType;

            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $fileName)) {
                $fileName = $defaultFileName;
            }
        } else {
            $fileName = $defaultFileName;
        }
    }

    // Save the filename to the database
    $stmt = $pdo->prepare("INSERT INTO employee_image (filename, id) VALUES (?, ?)");
    $stmt->execute([$fileName, $id]);
    echo "Profile image set: " . htmlspecialchars($fileName);
}
// close PDO connection
$pdo = null;

header("Location: personal_record.php?id=" . $employee_id . "&message=Record+saved+successfully");
exit();

/* FOR TESTING PURPOSES ONLY
    // Display the input data
    echo "<h2>Personal Record</h2>";
    echo "Name: $name<br>";
    echo "Address: $address<br>";
    echo "Date of Birth: $dob<br>";
    echo "Civil Status: $civil_status<br>";
    echo "Contact Number: $ccontact<br>";
    echo "Email: $email<br>";

    echo "<h2>Employment Status</h2>";
    echo "Position: $position<br>";
    echo "Date of Appointment: $doa<br>";
    echo "Salary: $salary<br>";
    echo "Office: $office<br>";
    echo "Employment Status: $status<br>";
    echo "Eligibility: $eligibility<br>";
    echo "TIN: $tin<br>";
    echo "PHILHEALTH: $philhealth<br>";
    echo "PAG-IBIG: $pagibig<br>";
    echo "GSIS: $gsis<br>";

    echo "<h2>Service Record</h2>";
    if (isset($filtered_positions) && count($filtered_positions) > 0) {
        for ($i = 0; $i < count($filtered_positions); $i++) {
            echo "Position: " . htmlspecialchars($filtered_positions[$i]) . "<br>";
            echo "Start Date: " . htmlspecialchars($filtered_starts[$i]) . "<br>";
            echo "End Date: " . htmlspecialchars($filtered_ends[$i]) . "<br><br>";
        }
    } else {
        echo "No service records available.<br>";
    }

    echo "<h2>Performance Rating</h2>";
    if (isset($filtered_ratings) && count($filtered_ratings) > 0) {
        for ($i = 0; $i < count($filtered_ratings); $i++) {
            echo "Performance Rating #" . ($i + 1) . ": " . htmlspecialchars($filtered_ratings[$i]) . "<br>";
            echo "Duration: " . htmlspecialchars($filtered_durations[$i]) . "<br>";
            echo "Year: " . htmlspecialchars($filtered_years[$i]) . "<br><br>";
        }
    } else {
        echo "No performance ratings available.<br>";
    }

    */


?>