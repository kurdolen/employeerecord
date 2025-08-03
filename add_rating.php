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

$ratingQuery = "SELECT * FROM performance_rating WHERE id = '$id' order by _year DESC, duration ASC";
$ratingResult = mysqli_query($conn, $ratingQuery);
$ratingRow = mysqli_fetch_all($ratingResult, MYSQLI_ASSOC);
$message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee Records</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        #toast{
            background-color: forestgreen;
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
    <div class="container">
        <div class="name-pic">
            <button class="back-btn" onclick="location.href='performance_rating.php?id=<?php echo $row['id']; ?>'">Back</button>
            <p>Employee: <b><i><?php echo htmlspecialchars($row['name']); ?></i></b></p>
            <?php if (!empty($picRow['filename'])): ?>
                <img src="<?php echo htmlspecialchars($picRow['filename']); ?>" alt="Profile Picture" class="profile-pic" />
            <?php else: ?>
                <img src="img/default_profile.jpg" alt="Default Profile Picture" class="profile-pic" />
            <?php endif; ?>
        </div>
        <hr />

        <div class="details">
            <div class="add-service-container">
                <form action="func_misc.php?id=<?php echo $row['id']; ?>&do=add_rating" method="post">
                    <div class="fields">
                        <select name="duration">
                            <option value="January to June">January to June</option>
                            <option value="July to December">July to December</option>
                        </select>

                        <label>Year:</label>
                        <input type="number" name="year" min="1" max="2500" />

                        <label>Rating:</label>
                        <input type="text" name="rating" />
                    </div>
                    <input type="submit" value="Add Rating" class="add-btn" />
                </form>
            </div>
            <table class="record-table vertical">
                <tr>
                    <th>Duration</th>
                    <th>Rating</th>
                </tr>
                <?php
                // Display service records or show message if empty
                if (!empty($ratingRow)) {
                    foreach ($ratingRow as $rating) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($rating['duration']) . " - " . htmlspecialchars($rating['_year']) . "</td>";
                        echo "<td>" . htmlspecialchars($rating['rating']) . "</td>";
                        echo "<td><button class='delete-detail' onclick=\"location.href='func_misc.php?id={$row['id']}&do=delete_rating&rating_id={$rating['rating_id']}'\">❌</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' style='text-align:center; color:lightcoral;'><i><b>No service record found</b></i></td></tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <div class="credit">
        <p>© 2025 Developed by Andrei Asuncion</p>
    </div>

    <div id="toast">✅ <?php echo $message; ?></div>

    <?php if (!empty($message)): ?>
    <script>
      window.onload = function() {
        const toast = document.getElementById("toast");
        toast.classList.add("show");
        setTimeout(() => toast.classList.remove("show"), 3000);
      };
    </script>
  <?php endif; ?>
</body>

</html>