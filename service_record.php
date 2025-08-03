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

$serviceQuery = "SELECT * FROM service_record WHERE id = '$id' ORDER BY service_start DESC";
$serviceResult = mysqli_query($conn, $serviceQuery);
$serviceRow = mysqli_fetch_all($serviceResult, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Employee Records</title>
  <link rel="stylesheet" href="style.css" />
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
      <button class="back-btn" onclick="location.href='index.php'">Back</button>
      <p>Employee: <b><i><?php echo htmlspecialchars($row['name']); ?></i></b></p>
      <?php if (!empty($picRow['filename'])): ?>
        <img src="<?php echo htmlspecialchars($picRow['filename']); ?>" alt="Profile Picture" class="profile-pic" />
      <?php else: ?>
        <img src="img/default_profile.jpg" alt="Default Profile Picture" class="profile-pic" />
      <?php endif; ?>
    </div>
    <hr />
    <div class="navigation-bar">
      <button class="action-btn" onclick="location.href='personal_record.php?id=<?php echo $row['id']; ?>'">👤 Personal Record</button>
      <button class="action-btn" onclick="location.href='employment_status.php?id=<?php echo $row['id']; ?>'">💼 Employment Status</button>
      <button class="action-btn active" onclick="location.href='service_record.php?id=<?php echo $row['id']; ?>'">📋 Service Record</button>
      <button class="action-btn" onclick="location.href='performance_rating.php?id=<?php echo $row['id']; ?>'">🌟 Performance Rating</button>
      <button class="action-btn edit" onclick="location.href='edit_record.php?id=<?php echo $row['id']; ?>'"><i class='fas fa-edit'></i>✏️ Edit</button>
      <button class="action-btn delete" onclick="location.href='delete_record.php?id=<?php echo $row['id']; ?>'"><i class='fas fa-trash'></i>🗑️ Delete</button>
    </div>
    <hr />
    <button class="action-btn service" onclick="location.href='add_service.php?id=<?php echo $row['id']; ?>'">✏️ Edit Service Record</button>
    <div class="details">
      <table class="record-table vertical">
        <tr>
          <th>Length of Service</th>
          <th >Position</th>
        </tr>
        <?php
        // Display service records or show message if empty
        if (!empty($serviceRow)) {
          foreach ($serviceRow as $service) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($service['service_start']) . " - " . htmlspecialchars($service['service_end']) . "</td>";
            echo "<td>" . htmlspecialchars($service['position']) . "</td>";
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
</body>

</html>