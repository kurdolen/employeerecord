<?php
include 'auth.php';
include 'db_connection.php';
$employeeId = isset($_GET['id']) ? $_GET['id'] : '';
$do = isset($_GET['do']) ? $_GET['do'] : '';

$query = "SELECT * FROM personal_record WHERE id = '$employeeId'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee Records</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        h2 {
            text-align: center;
            margin-top: 50px;
            cursor: default;
        }

        .confirm-delete-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .button-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            margin-top: 20px;
        }

        .del-cancel-btn,
        .del-confirm-btn {
            padding: 10px 20px;
            margin: 0 10px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 100px;
        }

        .del-cancel-btn:hover,
        .del-confirm-btn:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
            transition: all 0.2s ease-in-out;
        }

        .del-confirm-btn {
            background-color: #f44336; /* Red */
            color: white;
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

    <!-- Navigation-->
    <div class="nav">
        <div class="search-bar">
            <form action="index.php" method="get">
                <input type="text" name="search" placeholder="<?php echo htmlspecialchars(
                                                                    isset($search) ? $search : 'Search Employee'
                                                                );
                                                                ?>" />
                <input type="submit" value="Search" />
            </form>
        </div>
        <div class="function">
            <button class="func-btn" onclick="location.href='add_employee.php'"><b>+Add Employee</b></button>
            <button class="func-btn" onclick="location.href='index.php?do=show_all'"><b>Show All Record</b></button>
        </div>
    </div>
    <button class="logout-btn" onclick="location.href='logout.php'"><b>&larr; Log out</b></button>

    <div class="confirm-delete-container">
        <h2>Are you sure you want to delete<br><?php echo htmlspecialchars($row['name']); ?>'s record?</h2>
        <div class="button-container">
            <button class="del-cancel-btn" onclick="location.href='index.php'">No</button>
            <button class="del-confirm-btn" onclick="location.href='func_delete.php?id=<?php echo $row['id']; ?>&do=delete_personal'">Yes</button>
        </div>
    </div>

    <br><br>
    <div class="credit">
        <p>© 2025 Developed by Andrei Asuncion</p>
    </div>
</body>

</html>