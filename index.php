<?php
include 'auth.php';
include 'db_connection.php';
$do = isset($_GET['do']) ? $_GET['do'] : '';

if (isset($_GET['search'])) {
  $_SESSION['search'] = $_GET['search'];
} elseif (!isset($_SESSION['search'])) {
  $_SESSION['search'] = '';
}

if (isset($_SESSION['search']) && !empty($_SESSION['search'])) {
  $search = $_SESSION['search'];
  $query = "SELECT * FROM personal_record WHERE name LIKE '%$search%' order BY name ASC";
  $result = mysqli_query($conn, $query);
} else {
  $search = null;
  $query = "SELECT * FROM personal_record ORDER BY name ASC";
  $result = mysqli_query($conn, $query);
  $_SESSION['search'] = '';
}

if ($do === 'show_all') {
  $search = "All Records";
  $query = "SELECT * FROM personal_record ORDER BY name ASC";
  $result = mysqli_query($conn, $query);
  $_SESSION['search'] = '';
}
if (isset($_GET['filter']) && !empty($_GET['filter'])) {
  $filter = $_GET['filter'];
  $search = $filter;
  $query = "SELECT * FROM personal_record WHERE employment_status = '$filter' ORDER BY name ASC";
  $result = mysqli_query($conn, $query);
  $_SESSION['search'] = '';
}

if (isset($_GET['login']) && $_GET['login'] === 'success') {
  $message = "✅ Login successful!";
} elseif (isset($_GET['message'])) {
  $message = '🗑️ ' . htmlspecialchars($_GET['message']);
} else {
  $message = '';
}

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

  <!-- Navigation-->
  <div class="nav">
    <div class="search-bar">
      <form action="index.php" method="get">
        <input type="text" name="search" placeholder="<?php echo htmlspecialchars(isset($search) ? $search : 'Search Employee'); ?>" />
        <input type="submit" value="Search" />
      </form>
    </div>
    <div class="function">
      <button class="func-btn" onclick="location.href='add_employee.php'"><b>+ Add Employee</b></button>
      <button class="func-btn" onclick="location.href='index.php?do=show_all'"><b>Show All Record</b></button>
      <select name="filter" id="filter" onchange="location.href='index.php?filter=' + this.value">
        <option value="">Filter by Status</option>
        <option value="Regular">Regular</option>
        <option value="Casual">Casual</option>
        <option value="JO">JO</option>
      </select>
    </div>
  </div>
  <button class="logout-btn" onclick="location.href='logout.php'"><b>&larr; Log out</b></button>

  <!-- Search Results/Main body-->
  <div class="result-container">
    <p>Search results for <b><i>"<?php echo htmlspecialchars($search); ?>"</i></b></p>

    <table>


      <tr>
      </tr>
      <?php if (isset($result) && mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td class="result-name">
              <?php echo htmlspecialchars($row['name']); ?>
            </td>
            <td>
              <div class="action-buttons-container">
                <button class="action-btn" onclick="location.href='personal_record.php?id=<?php echo $row['id']; ?>'">👤 View Record</button>
                <button class="action-btn edit" onclick="location.href='edit_record.php?id=<?php echo $row['id']; ?>'"><i class='fas fa-edit'></i>✏️ Edit</button>
                <button class="action-btn delete" onclick="location.href='delete_record.php?id=<?php echo $row['id']; ?>&do=delete_personal'"><i class='fas fa-trash'></i>🗑️ Delete</button>
              </div>
            </td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr>
          <td colspan="2"><br />No results found.</td>
        </tr>
      <?php endif; ?>


    </table>
  </div>

  <div class="credit">
    <p>© 2025 Developed by Andrei Asuncion</p>
  </div>

  <div id="toast" style="background-color: <?php echo isset($_GET['login']) ? 'forestgreen' : 'orangered'; ?>;"><?php echo $message; ?></div>

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