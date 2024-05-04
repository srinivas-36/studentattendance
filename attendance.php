<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="mainbox">
    <div class="first">
      <h1 align="center">POST ATTENDANCE</h1>
      <button class="btn-sm" onclick="handleLogout()">Logout</button>
    </div>
    <div class="select">
      <select name="class" id="class">
        <option value="" hidden>Select The class</option>
        <option value="cse">CSE</option>
        <option value="ece">ECE</option>
        <option value="eee">EEE</option>
      </select>
      <select name="section" id="section">
        <option value="" hidden>Select the Section</option>
        <option value="a">A</option>
        <option value="b">B</option>
        <option value="c">C</option>
      </select>
      <input type="date" name="date" id="" />
      <div class="btn">
        <button onclick="handleClick()">View</button>
      </div>
    </div>
    <div class="post hidden" id="post">
      <form id="attendanceForm" action="update_attendance.php" method="post">
        <table class="attendance" border="3" cellspacing="3" cellpadding="10">
          <tr>
            <th>S.NO</th>
            <th>Name of the Student</th>
            <th>Roll No</th>
            <th>Mark Attendance
              <input type="checkbox" id="selectall">
            </th>
          </tr>
          <?php include 'display_attendance.php'; ?>
        </table>
        <div class="btn">
          <button type="submit" name="save">Save And Publish</button>
        </div>
      </form>
    </div>

  </div>


</body>

</html>
 -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Attendance Form</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="mainbox">
    <div class="first">
      <h1 align="center">POST ATTENDANCE</h1>
      <button class="btn-sm" onclick="handleLogout()">Logout</button>
    </div>
    <div class="select">
      <form id="attendanceForm" action="display_attendance.php" method="post">
        <select name="class" id="class">
          <option value="" hidden>Select The class</option>
          <option value="cse">CSE</option>
          <option value="ece">ECE</option>
          <option value="eee">EEE</option>
        </select>
        <select name="section" id="section">
          <option value="" hidden>Select the Section</option>
          <option value="a">A</option>
          <option value="b">B</option>
          <option value="c">C</option>
        </select>
        <input type="date" name="date" id="date" />
        <div class="btn">
          <button type="submit" name="view">View</button>
        </div>
      </form>
    </div>
    <div class="post" id="post">
      <?php include 'display_attendance.php'; ?>


    </div>
    <script src="script.js"></script>
</body>

</html>