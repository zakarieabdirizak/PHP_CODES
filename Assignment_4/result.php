<?php
session_start();
if (empty($_SESSION['student'])) {
    header('Location: index.php');
    exit;
}
$s = $_SESSION['student'];
function e($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }

$sections = [
  'Personal Information' => ['Full Name' => 'name', 'Place of Birth' => 'pob', 'Date of Birth' => 'dob',
      'Gender' => 'gender', 'Address' => 'address', 'Telephone' => 'telephone', 'Email' => 'email'],
  'Parent Information' => ['Parent Name' => 'p_name', 'Parent Telephone' => 'p_telephone', 'Relationship' => 'relationship'],
  'Academic Information' => ['Student ID' => 'student_id', 'Faculty' => 'faculty', 'Department' => 'department',
      'Class' => 'class', 'Registration Date' => 'reg_date'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration Result</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-9">
      <div class="alert alert-success text-center">
        <h4 class="mb-0">Registration Successful!</h4>
      </div>

      <div class="card shadow-sm">
        <div class="card-header bg-dark text-white fw-semibold">Submitted Student Information</div>
        <div class="card-body">
          <div class="text-center mb-4">
            <img src="uploads/<?= e($s['image']) ?>" alt="Student" class="img-thumbnail rounded-circle"
                 style="width:150px;height:150px;object-fit:cover;">
          </div>

          <table class="table table-bordered table-striped table-hover align-middle">
            <?php foreach ($sections as $title => $rows): ?>
              <thead class="table-primary">
                <tr><th colspan="2"><?= e($title) ?></th></tr>
              </thead>
              <tbody>
                <?php foreach ($rows as $label => $key): ?>
                  <tr>
                    <th style="width:35%"><?= e($label) ?></th>
                    <td><?= e($s[$key]) ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            <?php endforeach; ?>
          </table>

          <div class="text-center">
            <a href="index.php" class="btn btn-primary">Register Another Student</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
