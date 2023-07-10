<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conn, "ecommdb");

    // Retrieve form inputs
    $cname = $_POST['cname'];
    $sdesc = $_POST['sdesc'];

    // Check if a file is uploaded
    if ($_FILES['upload']) {
        $sn = $_FILES['upload']['tmp_name'];
        $on = $_FILES['upload']['name'];
        $dn = "images/" . $on;

        // Move the uploaded file to the desired location
        if (move_uploaded_file($sn, $dn)) {
            // Insert the category into the database using prepared statements
            $stmt = $conn->prepare("INSERT INTO `tbl_category` (`id`, `catname`, `image`, `sdesc`, `status`) 
                                   VALUES (NULL, ?, ?, ?, '1')");
            $stmt->bind_param("sss", $cname, $on, $sdesc);
            $result = $stmt->execute();

            if ($result) {
                $_SESSION['msg1'] = "Inserted";
            } else {
                $_SESSION['msg2'] = "Not_Inserted";
            }
        } else {
            $_SESSION['msg2'] = "Error uploading the file";
        }
    } else {
        $_SESSION['msg2'] = "No file uploaded";
    }
    mysqli_close($conn);

    // Redirect back to the form page
    header("Location: AddCategory.php");
    exit();
}


?>
