<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Employee Records</title>
  <link rel="stylesheet" href="style.css" />

  <style>
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

  <!-- Navigation-->
  <div class="nav">
    <div class="function">
      <button class="func-btn" onclick="location.href='index.php'">
        <b>Back</b>
      </button>
      <button
        class="func-btn"
        onclick="location.href='index.php?do=show_all'">
        <b>Show All Record</b>
      </button>
    </div>
  </div>

  <!--Main body-->
  <div class="add-employee-container">
    <!-- Personal Details -->
    <form action="func_save_employee.php" method="post" enctype="multipart/form-data">
      <h2>Personal Record</h2>
      <label for="name">Name:</label><br />
      <input type="text" id="name" name="name" required /><br />

      <label for="address">Address:</label><br />
      <input type="text" id="address" name="address" /><br />

      <label for="dob">Date of Birth:</label>
      <input type="date" id="dob" name="dob" /><br>

      <label for="civil_status">Civil Status:</label>
      <select name="civil_status" id="civil_status">
        <option value="Single">Single</option>
        <option value="Married">Married</option>
        <option value="Widowed">Widowed</option>
        <option value="Divorced">Divorced</option>
      </select>
      <br />

      <label for="contact">Contact Number:</label><br />
      <input type="text" id="contact" name="contact" /><br />

      <label for="email">Email:</label><br />
      <input type="email" id="email" name="email" /><br />

      <label for="upload">Upload Image:</label><br />
      <input type="file" id="upload" name="image" /><br />

      <!-- Employment Status -->
      <h2>Employment Status</h2>
      <label for="position">Position:</label>
      <input type="text" id="position" name="position" required /><br />

      <label for="doa">Date of Appointment:</label>
      <input type="date" id="doa" name="doa" /><br />

      <label for="salary">Salary:</label>
      <input type="text" id="salary" name="salary" /><br />

      <label for="office">Office:</label>
      <input type="text" id="office" name="office" /><br />

      <label for="employment_status">Employment Status:</label>
      <select id="employment_status" name="employment_status">
        <option value="Regular">Regular</option>
        <option value="Casual">Casual</option>
        <option value="JO">JO</option>
      </select>
      <br />

      <label for="eligibility">Eligibility:</label>
      <input type="text" id="eligibility" name="eligibility" /><br />

      <label for="tin">TIN:</label>
      <input type="text" id="tin" name="tin" /><br />

      <label for="philhealth">PHILHEALTH:</label>
      <input type="text" id="philhealth" name="philhealth" /><br />

      <label for="pagibig">PAG-IBIG:</label>
      <input type="text" id="pagibig" name="pagibig" /><br />

      <label for="gsis">GSIS:</label>
      <input type="text" id="gsis" name="gsis" /><br />

      <!-- Service Record -->
      <h2>Service Record</h2>
      <div id="service-records-container">
        <div class="entry-group">
          <label>Start:</label>
          <input type="date" name="service_start[]" /><br>

          <label>End:</label>
          <input type="date" name="service_end[]" /><br>

          <label>Position:</label>
          <input type="text" name="service_record[]" /><br>
        </div>
      </div>
      <button type="button" onclick="addServiceRecord()">
        Add Service Record
      </button>
      <br />

      <!-- Performance Rating Section -->
      <h2>Performance Rating</h2>
      <div id="performance-container">
        <div class="entry-group">
          <label>Duration:</label>
          <select name="duration[]">
            <option value="January to June">January to June</option>
            <option value="July to December">July to December</option>
          </select><br>

          <label>Year:</label>
          <input type="number" name="year[]" min="1" max="2500" /><br>

          <label>Rating:</label>
          <input type="text" name="rating[]" /><br>
        </div>
      </div>
      <button type="button" onclick="addPerformanceRating()">
        Add Performance Rating
      </button>
      <br />

      <input type="submit" value="Save Employee Record" />
    </form>
  </div>

  <div class="credit">
    <p>© 2025 Developed by Andrei Asuncion</p>
  </div>

  <!-- Script for adding service records and performance ratings inputs -->
  <script>
    function addServiceRecord() {
      const container = document.getElementById("service-records-container");
      const entry = document.createElement("div");
      entry.className = "entry-group";

      entry.innerHTML = `
        <label>Start:</label>
        <input type="date" name="service_start[]" /><br>

        <label>End:</label>
        <input type="date" name="service_end[]" /><br>

        <label>Position:</label>
        <input type="text" name="service_record[]" /><br>
      `;

      container.appendChild(entry);
    }

    function addPerformanceRating() {
      const container = document.getElementById("performance-container");
      const entry = document.createElement("div");
      entry.className = "entry-group";

      entry.innerHTML = `
        <label>Duration:</label>
        <select name="duration[]">
          <option value="January to June">January to June</option>
          <option value="July to December">July to December</option>
        </select><br>

        <label>Year:</label>
        <input type="number" name="year[]" min="1" max="2500" /><br>

        <label>Rating:</label>
        <input type="text" name="rating[]" /><br>
      `;

      container.appendChild(entry);
    }
  </script>
</body>

</html>