
<?php

$success = false;
$errMsg = "";
$nameErr = "";
$emailErr = "";

if (isset($_POST["submit"])) {

    $success = true;

    if (empty($_POST["fullname"])) {
        $success = false;
        $nameErr = "* Please fill fullname field!";
    }

    if (empty($_POST["email"])) {
        $success = false;
        $emailErr = "* Please fill email field!";
    }

    if (!$success) {
        $errMsg = "Please fill all required fields.";
    }

    if ($success) {
        echo '<div class="container mt-4">
        <div class="row justify-content-center"><div class="col-md-8 col-lg-7">
                <div class="alert alert-success">
                    <h4 class="alert-heading">Student Information</h4>
                    <hr>';

        echo "Fullname: " . htmlspecialchars($_POST["fullname"]) . "<br>";
        echo "Email: " . htmlspecialchars($_POST["email"]) . "<br>";
        echo "Place of Birth: " . htmlspecialchars($_POST["pob"] ?? "") . "<br>";

        if (!empty($_POST["gender"])) {
            echo "Gender: " . htmlspecialchars($_POST["gender"]) . "<br>";
        }

        echo "Education level: " . htmlspecialchars($_POST["education"] ?? "") . "<br>";

        echo "skills: ";
        if (isset($_POST["skills"])) {
            echo htmlspecialchars(implode(", ", $_POST["skills"]));
        }

        echo "<br>";

        echo "experience years: " . htmlspecialchars($_POST["experience"] ?? "") . "<br>";

        echo "cover letter: " . htmlspecialchars($_POST["cover"] ?? "") . "<br>";

        echo '  </div>
              </div> </div>
              </div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Registration</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">

            <div class="card shadow">

                <div class="card-header bg-primary text-white text-center py-3">
                    <h2 class="mb-0">Application job Registration</h2>
                </div>

                <div class="card-body">

                    <?php if (!empty($errMsg)) { ?>
                        <div class="alert alert-danger">
                            <?php echo htmlspecialchars($errMsg); ?>
                        </div>
                    <?php } ?>

                    <form method="post" action="">

                        <fieldset>
                            <legend class="text-primary mb-3">
                                Personal Information
                            </legend>

                            <!-- Fullname -->
                            <div class="mb-3">
                                <label for="fullname" class="form-label">
                                    Fullname <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="fullname"
                                    name="fullname"
                                    placeholder="Enter your fullname"
                                    value="<?php
                                        if (!$success && isset($_POST["fullname"])) {
                                            echo htmlspecialchars($_POST["fullname"]);
                                        }
                                    ?>"
                                >

                                <div class="text-danger small">
                                    <?php echo htmlspecialchars($nameErr); ?>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    Email <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="Enter your email"
                                    value="<?php
                                        if (!$success && isset($_POST["email"])) {
                                            echo htmlspecialchars($_POST["email"]);
                                        }
                                    ?>"
                                >

                                <div class="text-danger small">
                                    <?php echo htmlspecialchars($emailErr); ?>
                                </div>
                            </div>

                            <!-- Place of Birth -->
                            <div class="mb-3">
                                <label for="pob" class="form-label">
                                    Place of Birth
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="pob"
                                    name="pob"
                                    placeholder="Enter your place of birth"
                                    value="<?php
                                        if (!$success && isset($_POST["pob"])) {
                                            echo htmlspecialchars($_POST["pob"]);
                                        }
                                    ?>"
                                >
                            </div>

                            <!-- Gender -->
                            <div class="mb-3">
                                <label class="form-label d-block">Gender</label>

                                <div class="form-check form-check-inline">
                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        id="male"
                                        name="gender"
                                        value="male"
                                        <?php
                                        if (!$success && isset($_POST["gender"])
                                            && $_POST["gender"] == "male") {
                                            echo "checked";
                                        }
                                        ?>
                                    >
                                    <label for="male" class="form-check-label">
                                        Male
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        id="female"
                                        name="gender"
                                        value="female"
                                        <?php
                                        if (!$success && isset($_POST["gender"])
                                            && $_POST["gender"] == "female") {
                                            echo "checked";
                                        }
                                        ?>
                                    >
                                    <label for="female" class="form-check-label">
                                        Female
                                    </label>
                                </div>
                            </div>

                            <!-- Education level -->
                            <div class="mb-3">
                                <label for="education" class="form-label">
                                    Education level
                                </label>

                                <select class="form-select" name="education" id="education">
                                    <option value="high_university"
                                        <?php
                                        if (!$success && isset($_POST["education"])
                                            && $_POST["education"] == "high_university") {
                                            echo "selected";
                                        }
                                        ?>>
                                        select education level
                                    </option>

                                    <option value="Certificate"
                                        <?php
                                        if (!$success && isset($_POST["education"])
                                            && $_POST["education"] == "Certificate") {
                                            echo "selected";
                                        }
                                        ?>>
                                        Certificate
                                    </option>

                                    <option value="Bachelor"
                                        <?php
                                        if (!$success && isset($_POST["education"])
                                            && $_POST["education"] == "Bachelor") {
                                            echo "selected";
                                        }
                                        ?>>
                                        Bachelor's Degree
                                    </option>

                                    <option value="Diploma"
                                        <?php
                                        if (!$success && isset($_POST["education"])
                                            && $_POST["education"] == "Diploma") {
                                            echo "selected";
                                        }
                                        ?>>
                                        Diploma
                                    </option>

                                    <option value="Master"
                                        <?php
                                        if (!$success && isset($_POST["education"])
                                            && $_POST["education"] == "Master") {
                                            echo "selected";
                                        }
                                        ?>>
                                        Master's Degree
                                    </option>
                                </select>
                            </div>

                            <!-- skills -->
                            <div class="mb-3">
                                <label class="form-label d-block">skills</label>

                                <?php
                                $skills = ["php", "html", "css", "javascript"];

                                foreach ($skills as $skill) {
                                    $checked = (
                                        !$success
                                        && isset($_POST["skills"])
                                        && in_array($skill, $_POST["skills"])
                                    ) ? "checked" : "";
                                ?>

                                    <div class="form-check form-check-inline">
                                        <input
                                            type="checkbox"
                                            class="form-check-input"
                                            name="skills[]"
                                            id="<?php echo strtolower($skill); ?>"
                                            value="<?php echo $skill; ?>"
                                            <?php echo $checked; ?>
                                        >

                                        <label
                                            class="form-check-label"
                                            for="<?php echo strtolower($skill); ?>"
                                        >
                                            <?php echo $skill; ?>
                                        </label>
                                    </div>

                                <?php } ?>
                            </div>

                            <!-- experience of year -->
                            <div class="mb-3">
                                <label for="year" class="form-label">
                                    experience of year 
                                </label>

                                <select class="form-select" name="faculty" id="faculty">
                                    <option value="computer"
                                        <?php
                                        if (!$success && isset($_POST["year"])
                                            && $_POST["year"] == "computer") {
                                            echo "selected";
                                        }
                                        ?>>
                                        select year of experience
                                    </option>

                                    <option value="medicine"
                                        <?php
                                        if (!$success && isset($_POST["year"])
                                            && $_POST["year"] == "medicine") {
                                            echo "selected";
                                        }
                                        ?>>
                                        1 years
                                    </option>

                                    <option value="engineering"
                                        <?php
                                        if (!$success && isset($_POST["year"])
                                            && $_POST["year"] == "engineering") {
                                            echo "selected";
                                        }
                                        ?>>
                                        2 years
                                    </option>

                                    <option value="ecom"
                                        <?php
                                        if (!$success && isset($_POST["year"])
                                            && $_POST["year"] == "ecom") {
                                            echo "selected";
                                        }
                                        ?>>
                                        3 years
                                    </option>

                                    <option value="ecom"
                                        <?php
                                        if (!$success && isset($_POST["year"])
                                            && $_POST["year"] == "ecom") {
                                            echo "selected";
                                        }
                                        ?>>
                                        4 years
                                    </option>
                                </select>
                            </div>
        

                            <!-- Comment -->
                            <div class="mb-4">
                                <label for="cover" class="form-label">
                                    cover letter
                                </label>

                                <textarea
                                    class="form-control"
                                    name="cover"
                                    id="cover"
                                    rows="4"
                                    placeholder="Write your cover letter here..."
                                ><?php
                                    if (!$success && isset($_POST["cover"])) {
                                        echo htmlspecialchars($_POST["cover"]);
                                    }
                                ?></textarea>
                            </div>

                            <label for="">CV</label>
                            <input type="file" name="cv" > <br> <br>

                            <!-- Buttons -->
                            <div class="d-flex gap-2">
                                <button
                                    type="submit"
                                    name="submit"
                                    class="btn btn-primary"
                                >
                                    Register
                                </button>

                                <button
                                    type="reset"
                                    class="btn btn-outline-secondary"
                                >
                                    Clear
                                </button>
                            </div>

                        </fieldset>

                    </form>

                </div>

                <div class="card-footer text-center text-muted">
                    Student Registration System
                </div>

            </div>

        </div>
    </div>

</div>

</body>
</html>
