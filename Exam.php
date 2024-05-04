<!DOCTYPE html>
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
      <h1 align="center">POST Exam Marks</h1>
      <button class="btn-sm" onclick="handleLogout()">Logout</button>
    </div>
    <div class="select">
      <form id="attendanceForm" action="displaymarks.php" method="post">
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

        <div class="btn">
          <select name="type" id="examtype">
            <option value="" hidden>Select The type of exam</option>
            <option value="thirdsemmid1">III Btech I MID</option>
            <option value="thirdsemmid2">III Btech II MID</option>
          </select>
          <button type="submit" name="view">View</button>
        </div>
      </form>
    </div>
    <div class="post" id="post">
      <?php include 'displaymarks.php'; ?>


    </div>
  </div>

  <script src="script.js"></script>
</body>

</html>