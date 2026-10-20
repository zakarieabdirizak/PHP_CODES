<?php
session_start();

$errors = [];
$old    = [];
$labels = [
  'name' => 'Full Name', 'pob' => 'Place of Birth', 'dob' => 'Date of Birth',
  'address' => 'Address', 'gender' => 'Gender', 'telephone' => 'Telephone',
  'email' => 'Email', 'p_name' => 'Parent Name', 'p_telephone' => 'Parent Telephone',
  'relationship' => 'Relationship', 'student_id' => 'Student ID', 'faculty' => 'Faculty',
  'department' => 'Department', 'class' => 'Class', 'reg_date' => 'Registration Date'
];

function e($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
function old($k) { global $old; return e($old[$k] ?? ''); }
function sel($k, $v) { global $old; return (($old[$k] ?? '') === $v) ? 'selected' : ''; }
function invalid($k) { global $errors; return isset($errors[$k]) ? 'is-invalid' : ''; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1) Soo qaado xogta
    foreach ($labels as $k => $l) {
        $old[$k] = trim($_POST[$k] ?? '');
    }

    // 2) Hubi in goob kasta buuxda tahay
    foreach ($labels as $k => $l) {
        if ($old[$k] === '') {
            $errors[$k] = "Please enter your $l.";
        }
    }

    // 3) Hubin gaar ah
    if (!isset($errors['name']) && !preg_match('/^[A-Za-z\s]+$/', $old['name'])) {
        $errors['name'] = 'Name must contain only letters and spaces.';
    }
    if (!isset($errors['p_name']) && !preg_match('/^[A-Za-z\s]+$/', $old['p_name'])) {
        $errors['p_name'] = 'Parent name must contain only letters and spaces.';
    }
    if (!isset($errors['email']) && !filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address (e.g. name@example.com).';
    }
    foreach (['telephone', 'p_telephone'] as $t) {
        if (!isset($errors[$t]) && !preg_match('/^[0-9+\s-]{7,15}$/', $old[$t])) {
            $errors[$t] = 'Telephone must contain 7-15 digits (numbers, +, - only).';
        }
    }

    // 4) Sawirka
    $imageName = '';
    if (!isset($_FILES['image']) || $_FILES['image']['error'] === UPLOAD_ERR_NO_FILE) {
        $errors['image'] = 'Please upload a student image.';
    } elseif ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        $errors['image'] = 'Upload failed. Please try again.';
    } else {
        $ext     = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowed = ['png', 'jpg', 'jpeg', 'gif', 'webp', 'bmp'];
        if (!in_array($ext, $allowed)) {
            $errors['image'] = 'Only image files are allowed (png, jpg, jpeg, gif, webp, bmp).';
        } elseif (@getimagesize($_FILES['image']['tmp_name']) === false) {
            $errors['image'] = 'The selected file is not a valid image.';
        } else {
            $imageName = uniqid('stu_') . '.' . $ext;
        }
    }

    // 5) Haddii wax khalad ah aysan jirin
    if (empty($errors)) {
        move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/uploads/' . $imageName);
        $old['image'] = $imageName;
        $_SESSION['student'] = $old;
        header('Location: result.php');
        exit;
    }
}

$firstError = !empty($errors) ? array_key_first($errors) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Registration</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-9">

      <div class="text-center mb-4">
        <h2 class="fw-bold">Student Registration Form</h2>
        <p class="text-muted">Jamhuriya University of Science &amp; Technology</p>
      </div>

      <?php if ($errors): ?>
        <div class="alert alert-danger">
          Please fix <strong><?= count($errors) ?></strong> error(s) below.
        </div>
      <?php endif; ?>

      <form method="post" enctype="multipart/form-data" novalidate>

        <!-- PERSONAL INFORMATION -->
        <div class="card shadow-sm mb-4">
          <div class="card-header bg-primary text-white fw-semibold">Personal Information</div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-6">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" id="name" name="name" class="form-control <?= invalid('name') ?>" value="<?= old('name') ?>">
                <div class="invalid-feedback"><?= e($errors['name'] ?? '') ?></div>
              </div>
              <div class="col-md-6">
                <label for="pob" class="form-label">Place of Birth</label>
                <input type="text" id="pob" name="pob" class="form-control <?= invalid('pob') ?>" value="<?= old('pob') ?>">
                <div class="invalid-feedback"><?= e($errors['pob'] ?? '') ?></div>
              </div>
              <div class="col-md-6">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" id="dob" name="dob" class="form-control <?= invalid('dob') ?>" value="<?= old('dob') ?>">
                <div class="invalid-feedback"><?= e($errors['dob'] ?? '') ?></div>
              </div>
              <div class="col-md-6">
                <label for="gender" class="form-label">Gender</label>
                <select id="gender" name="gender" class="form-select <?= invalid('gender') ?>">
                  <option value="">-- Select --</option>
                  <option value="Male" <?= sel('gender', 'Male') ?>>Male</option>
                  <option value="Female" <?= sel('gender', 'Female') ?>>Female</option>
                </select>
                <div class="invalid-feedback"><?= e($errors['gender'] ?? '') ?></div>
              </div>
              <div class="col-md-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" id="address" name="address" class="form-control <?= invalid('address') ?>" value="<?= old('address') ?>">
                <div class="invalid-feedback"><?= e($errors['address'] ?? '') ?></div>
              </div>
              <div class="col-md-6">
                <label for="telephone" class="form-label">Telephone</label>
                <input type="text" id="telephone" name="telephone" class="form-control <?= invalid('telephone') ?>" value="<?= old('telephone') ?>">
                <div class="invalid-feedback"><?= e($errors['telephone'] ?? '') ?></div>
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control <?= invalid('email') ?>" value="<?= old('email') ?>">
                <div class="invalid-feedback"><?= e($errors['email'] ?? '') ?></div>
              </div>
              <div class="col-md-12">
                <label for="image" class="form-label">Image</label>
                <input type="file" id="image" name="image" accept="image/*" class="form-control <?= invalid('image') ?>">
                <div class="invalid-feedback"><?= e($errors['image'] ?? '') ?></div>
              </div>
            </div>
          </div>
        </div>

        <!-- PARENT INFORMATION -->
        <div class="card shadow-sm mb-4">
          <div class="card-header bg-success text-white fw-semibold">Parent Information</div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-4">
                <label for="p_name" class="form-label">Parent Name</label>
                <input type="text" id="p_name" name="p_name" class="form-control <?= invalid('p_name') ?>" value="<?= old('p_name') ?>">
                <div class="invalid-feedback"><?= e($errors['p_name'] ?? '') ?></div>
              </div>
              <div class="col-md-4">
                <label for="p_telephone" class="form-label">Parent Telephone</label>
                <input type="text" id="p_telephone" name="p_telephone" class="form-control <?= invalid('p_telephone') ?>" value="<?= old('p_telephone') ?>">
                <div class="invalid-feedback"><?= e($errors['p_telephone'] ?? '') ?></div>
              </div>
              <div class="col-md-4">
                <label for="relationship" class="form-label">Relationship</label>
                <select id="relationship" name="relationship" class="form-select <?= invalid('relationship') ?>">
                  <option value="">-- Select --</option>
                  <?php foreach (['Father', 'Mother', 'Brother', 'Sister', 'Uncle', 'Aunt', 'Guardian'] as $r): ?>
                    <option value="<?= $r ?>" <?= sel('relationship', $r) ?>><?= $r ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback"><?= e($errors['relationship'] ?? '') ?></div>
              </div>
            </div>
          </div>
        </div>

        <!-- ACADEMIC INFORMATION -->
        <div class="card shadow-sm mb-4">
          <div class="card-header bg-warning fw-semibold">Academic Information</div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-6">
                <label for="student_id" class="form-label">Student ID</label>
                <input type="text" id="student_id" name="student_id" class="form-control <?= invalid('student_id') ?>" value="<?= old('student_id') ?>">
                <div class="invalid-feedback"><?= e($errors['student_id'] ?? '') ?></div>
              </div>
              <div class="col-md-6">
                <label for="reg_date" class="form-label">Registration Date</label>
                <input type="date" id="reg_date" name="reg_date" class="form-control <?= invalid('reg_date') ?>" value="<?= old('reg_date') ?>">
                <div class="invalid-feedback"><?= e($errors['reg_date'] ?? '') ?></div>
              </div>
              <div class="col-md-4">
                <label for="faculty" class="form-label">Faculty</label>
                <select id="faculty" name="faculty" class="form-select <?= invalid('faculty') ?>">
                  <option value="">-- Select --</option>
                  <?php foreach (['Computer & IT', 'Engineering', 'Business', 'Law', 'Medicine'] as $f): ?>
                    <option value="<?= e($f) ?>" <?= sel('faculty', $f) ?>><?= e($f) ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback"><?= e($errors['faculty'] ?? '') ?></div>
              </div>
              <div class="col-md-4">
                <label for="department" class="form-label">Department</label>
                <select id="department" name="department" class="form-select <?= invalid('department') ?>">
                  <option value="">-- Select --</option>
                  <?php foreach (['Computer Science', 'Information Technology', 'Software Engineering', 'Networking'] as $d): ?>
                    <option value="<?= $d ?>" <?= sel('department', $d) ?>><?= $d ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback"><?= e($errors['department'] ?? '') ?></div>
              </div>
              <div class="col-md-4">
                <label for="class" class="form-label">Class</label>
                <select id="class" name="class" class="form-select <?= invalid('class') ?>">
                  <option value="">-- Select --</option>
                  <?php foreach (['Year 1', 'Year 2', 'Year 3', 'Year 4'] as $c): ?>
                    <option value="<?= $c ?>" <?= sel('class', $c) ?>><?= $c ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback"><?= e($errors['class'] ?? '') ?></div>
              </div>
            </div>
          </div>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-primary btn-lg">Register</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php if ($firstError): ?>
<script>
  // Geli user-ka goobta ugu horreysa ee khaladka ah
  const el = document.getElementById(<?= json_encode($firstError) ?>);
  if (el) { el.scrollIntoView({behavior: 'smooth', block: 'center'}); el.focus(); }
</script>
<?php endif; ?>
</body>
</html>
