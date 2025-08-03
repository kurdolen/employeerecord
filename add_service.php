<?php
include 'auth.php';
include 'db_connection.php';
$id = isset($_GET['id']) ? $_GET['id'] : null;
$do = isset($_GET['do']) ? $_GET['do'] : '';

$query = "SELECT * FROM personal_record WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$picQuery = "SELECT * FROM employee_image WHERE id = '$id'";
$picResult = mysqli_query($conn, $picQuery);
$picRow = mysqli_fetch_assoc($picResult);

$serviceQuery = "SELECT * FROM service_record WHERE id = '$id' ORDER BY service_start DESC";
$serviceResult = mysqli_query($conn, $serviceQuery);
$serviceRow = mysqli_fetch_all($serviceResult, MYSQLI_ASSOC);

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
      <button class="back-btn" onclick="location.href='service_record.php?id=<?php echo $row['id']; ?>'">Back</button>
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
        <form action="func_misc.php?id=<?php echo $row['id']; ?>&do=add_service" method="post">
          <div class="fields">
            <input type="date" id="service_start" name="service_start" required /> -
            <input type="date" id="service_end" name="service_end" required />
            <label for="position">Position:</label>
            <input type="text" id="position" name="position" required /><br>
          </div>
          <input type="submit" value="Add" />
        </form>
      </div>
      <table class="record-table vertical">
        <tr>
          <th colspan="2">Length of Service</th>
          <th>Position</th>
        </tr>
        <?php
        // Display service records or show message if empty
        if (!empty($serviceRow)) {
          foreach ($serviceRow as $service) {
            echo "<tr>";
            echo "<td colspan='2'>" . htmlspecialchars($service['service_start']) . " - " . htmlspecialchars($service['service_end']) . "</td>";
            echo "<td>" . htmlspecialchars($service['position']) . "</td>";
            echo "<td><button class='delete-detail' onclick=\"location.href='func_misc.php?id={$row['id']}&do=delete_service&service_id={$service['service_id']}'\">❌</button></td>";
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