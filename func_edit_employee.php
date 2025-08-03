<?php
include 'db_connection.php';

$editId = isset($_GET['id']) ? $_GET['id'] : null;

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
}

// Edit data into the personal_record table
$stmt = $conn->prepare("UPDATE personal_record SET 
                        name = ?, address = ?, date_of_birth = ?, civil_status = ?, contact = ?, email = ?, position = ?, 
                        date_of_appointment = ?, salary = ?, office = ?, employment_status = ?, eligibility = ?, tin = ?, 
                        philhealth = ?, pagibig = ?, gsis = ? WHERE id = ?");
$stmt->bind_param("sssssssssssssssss", 
                        $name, $address, $dob, $civil_status, $contact, $email, $position, $doa, $salary, 
                        $office, $status, $eligibility, $tin, $philhealth, $pagibig, $gsis, $editId);

if ($stmt->execute()) {
    echo "Record updated successfully!";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();

//Edit Image filename

$pdo = new PDO('mysql:host=localhost;dbname=employee_record', 'root', '');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $targetDir = "uploads/";
    $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($imageFileType, $allowedTypes)) {
        // Create a unique filename using $name and a unique id
        $uniqueId = uniqid();
        $safeName = preg_replace('/[^A-Za-z0-9_\-]/', '_', $name); // sanitize name
        $fileName = $safeName . '_' . $uniqueId . '.' . $imageFileType;
        $targetFile = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Save the filename to the database
            $stmt = $pdo->prepare("UPDATE employee_image SET filename = ? WHERE id = ?");
            $stmt->execute([$targetFile, $editId]);
            echo "File uploaded successfully: " . htmlspecialchars($fileName);
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "File type not allowed. Please upload a JPG, JPEG, PNG, or GIF image.";
    }
}
// close PDO connection
$pdo = null;
header("Location: personal_record.php?id=" . $editId . "&message=Record+updated+successfully");
exit();

?>