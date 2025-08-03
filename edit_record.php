<?php
include 'auth.php';
include 'db_connection.php';
$id = isset($_GET['id']) ? $_GET['id'] : null;

$query = "SELECT * FROM personal_record WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$picQuery = "SELECT * FROM employee_image WHERE id = '$id'";
$picResult = mysqli_query($conn, $picQuery);
$picRow = mysqli_fetch_assoc($picResult);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee Records</title>
    <link rel="stylesheet" href="style.css" />

    <style>
        .edit-header {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .edit-header h1 {
            margin-left: 60px;
        }

        .name-pic {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-around;
        }

        form .entry-group {
            border: 1px solid #ccc !important;
            padding: 12px !important;
            margin: 10px 0 !important;
            width: 50% !important;
            border-radius: 8px !important;
            background-color: #f4f4f4 !important;
        }

        form .entry-group label {
            display: inline-block !important;
            width: 70px !important;
            font-weight: bold !important;
            margin-bottom: 5px !important;
        }

        form .entry-group input,
        form .entry-group select {
            width: 60% !important;
            max-width: 300px !important;
            padding: 6px !important;
            margin-bottom: 10px !important;
            border: 1px solid #ccc !important;
            border-radius: 4px !important;
            box-sizing: border-box !important;
        }

        form .entry-group button {
            display: inline-block !important;
            background-color: #c0392b !important;
            color: white !important;
            border: none !important;
            padding: 6px 12px !important;
            border-radius: 5px !important;
            cursor: pointer !important;
            margin-top: 5px !important;
        }

        form .entry-group button:hover {
            background-color: #a93226 !important;
            scale: 1.05;
            transition: ease all 0.3s;
        }

        form {
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        form h2 {
            font-size: 20px;
            margin-top: 20px;
            color: rgb(255, 111, 0);
            border-bottom: 2px solid #ccc;
            padding-bottom: 6px;
        }

        form label {
            display: block;
            font-weight: bold;
            color: #444;
        }

        form input[type="text"],
        form input[type="number"],
        form input[type="date"],
        form input[type="email"],
        form select {
            width: 100%;
            padding: 8px;
            margin-bottom: 1px;
            border: 1px solid #bbb;
            border-radius: 6px;
            box-sizing: border-box;
            background-color: #fff;
            box-sizing: border-box;
        }

        form input[type="file"] {
            padding: 6px;
            width: 50%;
            margin-bottom: 10px;
            border: 1px solid #bbb;
            border-radius: 6px;
            box-sizing: border-box;
            background-color: #fff;
        }

        form button,
        form input[type="submit"] {
            width: fit-content;
            background-color: #3498db;
            color: #fff;
            font-weight: bold;
            padding: 10px 16px;
            margin-top: 10px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        form input[type="submit"] {
            width: 100%;
            background-color: #ff8904;
        }

        form button:hover,
        form input[type="submit"]:hover {
            background-color: #2c80b4;
            scale: 1.01;
            transition: ease all 0.3s;
        }

        form input[type="submit"]:hover {
            background-color: #ff8904;
            scale: 1.01;
            transition: ease all 0.3s;
        }

        form .entry-group {
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <img src="img/logo1.png" alt="CalumpitLogo" />
        <h1>Human Resource Management Office <br />Employee Records</h1>
        <img src="img/logo2.png" alt="CalumpitLogo" />
    </div>

    <!--Main body-->
    <div class="add-employee-container">
        <div class="edit-header">
            <button class="back-btn" onclick="location.href='personal_record.php?id=<?php echo $id ?>'">❌Cancel</button>
            <h1 class="func-title">Edit Employee Record</h1>
        </div>
        <div class="name-pic">
            <p>Employee: <b><i><?php echo htmlspecialchars($row['name']); ?></i></b></p>
            <?php if (!empty($picRow['filename'])): ?>
                <img src="<?php echo htmlspecialchars($picRow['filename']); ?>" alt="Profile Picture" class="profile-pic" />
            <?php else: ?>
                <img src="img/default_profile.jpg" alt="Default Profile Picture" class="profile-pic" />
            <?php endif; ?>
        </div>


        <!-- Personal Details -->
        <form action="func_edit_employee.php?id=<?php echo $row['id']; ?>" method="post" enctype="multipart/form-data">
            <h2>Personal Record</h2>
            <label for="name">Name:</label><br />
            <input type="text" id="name" name="name" required value="<?php echo $row['name']; ?>" /><br />

            <label for="address">Address:</label><br />
            <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>" /><br />

            <label for="dob">Date of Birth (mm-dd-yyy):</label>
            <input type="date" id="dob" name="dob" value="<?php echo $row['date_of_birth']; ?>" /><br />

            <label for="civil_status">Civil Status:</label>
            <select name="civil_status" id="civil_status">
                <option value="Single" <?php echo ($row['civil_status'] == 'Single') ? 'selected' : ''; ?>>Single</option>
                <option value="Married" <?php echo ($row['civil_status'] == 'Married') ? 'selected' : ''; ?>>Married</option>
                <option value="Widowed" <?php echo ($row['civil_status'] == 'Widowed') ? 'selected' : ''; ?>>Widowed</option>
                <option value="Divorced" <?php echo ($row['civil_status'] == 'Divorced') ? 'selected' : ''; ?>>Divorced</option>
            </select>
            <br />

            <label for="contact">Contact Number:</label><br />
            <input type="text" id="contact" name="contact" value="<?php echo $row['contact']; ?>" /><br />

            <label for="email">Email:</label><br />
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" /><br />

            <label for="upload">Upload New Image:</label><br />
            <input type="file" id="upload" name="image" /><br />

            <!-- Employment Status -->
            <h2>Employment Status</h2>
            <label for="position">Position:</label>
            <input type="text" id="position" name="position" value="<?php echo $row['position']; ?>" required /><br />

            <label for="doa">Date of Appointment (mm-dd-yyyy):</label>
            <input type="date" id="doa" name="doa" value="<?php echo $row['date_of_appointment']; ?>" /><br />

            <label for="salary">Salary:</label>
            <input type="text" id="salary" name="salary" value="<?php echo $row['salary']; ?>" /><br />

            <label for="office">Office:</label>
            <input type="text" id="office" name="office" value="<?php echo $row['office']; ?>" /><br />

            <label for="employment_status">Employment Status:</label>
            <select id="employment_status" name="employment_status">
                <option value="Regular" <?php echo ($row['employment_status'] == 'Regular') ? 'selected' : ''; ?>>Regular</option>
                <option value="Casual" <?php echo ($row['employment_status'] == 'Casual') ? 'selected' : ''; ?>>Casual</option>
                <option value="JO" <?php echo ($row['employment_status'] == 'JO') ? 'selected' : ''; ?>>JO</option>
            </select>
            <br />

            <label for="eligibility">Eligibility:</label>
            <input type="text" id="eligibility" name="eligibility" value="<?php echo $row['eligibility']; ?>" /><br />

            <label for="tin">TIN:</label>
            <input type="text" id="tin" name="tin" value="<?php echo $row['tin']; ?>" /><br />

            <label for="philhealth">PHILHEALTH:</label>
            <input type="text" id="philhealth" name="philhealth" value="<?php echo $row['philhealth']; ?>" /><br />

            <label for="pagibig">PAG-IBIG:</label>
            <input type="text" id="pagibig" name="pagibig" value="<?php echo $row['pagibig']; ?>" /><br />

            <label for="gsis">GSIS:</label>
            <input type="text" id="gsis" name="gsis" value="<?php echo $row['gsis']; ?>" /><br />

            <input type="submit" value="Update Record" />
        </form>
    </div>

    <div class="credit">
        <p>© 2025 Developed by Andrei Asuncion</p>
    </div>
</body>

</html>