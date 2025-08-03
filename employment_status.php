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
      <button class="action-btn active" onclick="location.href='employment_status.php?id=<?php echo $row['id']; ?>'">💼 Employment Status</button>
      <button class="action-btn" onclick="location.href='service_record.php?id=<?php echo $row['id']; ?>'">📋 Service Record</button>
      <button class="action-btn" onclick="location.href='performance_rating.php?id=<?php echo $row['id']; ?>'">🌟 Performance Rating</button>
      <button class="action-btn edit" onclick="location.href='edit_record.php?id=<?php echo $row['id']; ?>'"><i class='fas fa-edit'></i>✏️ Edit</button>
      <button class="action-btn delete" onclick="location.href='delete_record.php?id=<?php echo $row['id']; ?>'"><i class='fas fa-trash'></i>🗑️ Delete</button>
    </div>
    <hr />
    <div class="details">
      <table class="record-table horizontal">
        <tr>
          <th>Position</th>
          <td><i><?php echo htmlspecialchars($row['position']); ?></i></td>
        </tr>
        <tr>
          <th>Date of Appointment</th>
          <td><i><?php echo htmlspecialchars($row['date_of_appointment']); ?></i></td>
        </tr>
        <tr>
          <th>Salary</th>
          <td><i><?php echo htmlspecialchars($row['salary']); ?></i></td>
        </tr>
        <tr>
          <th>Office</th>
          <td><i><?php echo htmlspecialchars($row['office']); ?></i></td>
        </tr>
        <tr>
          <th>Employment Status</th>
          <td><i><?php echo htmlspecialchars($row['employment_status']); ?></i></td>
        </tr>
        <tr>
          <th>Eligibility</th>
          <td><i><?php echo htmlspecialchars($row['eligibility']); ?></i></td>
        </tr>
        <tr>
          <th>TIN</th>
          <td><i><?php echo htmlspecialchars($row['tin']); ?></i></td>
        </tr>
        <tr>
          <th>PHILHEALTH</th>
          <td><i><?php echo htmlspecialchars($row['philhealth']); ?></i></td>
        </tr>
        <tr>
          <th>PAG-IBIG</th>
          <td><i><?php echo htmlspecialchars($row['pagibig']); ?></i></td>
        </tr>
        <tr>
          <th>GSIS</th>
          <td><i><?php echo htmlspecialchars($row['gsis']); ?></i></td>
        </tr>
      </table>
    </div>
  </div>

  <div class="credit">
    <p>© 2025 Developed by Andrei Asuncion</p>
  </div>
</body>

</html>