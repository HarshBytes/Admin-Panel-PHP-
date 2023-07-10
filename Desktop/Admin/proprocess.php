<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conn, "ecommdb");

    // Retrieve form inputs
    $pdesc = isset($_POST['pdesc']) ? mysqli_real_escape_string($conn, $_POST['pdesc']) : '';
    $cid = isset($_POST['Category']) ? intval($_POST['Category']) : 0;
    $pprice = isset($_POST['pprice']) ? floatval($_POST['pprice']) : 0.0;
    $pname = isset($_POST['pname']) ? mysqli_real_escape_string($conn, $_POST['pname']) : '';

    // Check if a file is uploaded
    if (isset($_FILES['upload'])) {
        $sn = $_FILES['upload']['tmp_name'];
        $on = $_FILES['upload']['name'];
        $dn = "images/" . $on;

        // Move the uploaded file to the desired location
        if (move_uploaded_file($sn, $dn)) {
            // Insert the category into the database
            $qry = "INSERT INTO `tbl_product` (`id`, `catid`, `pname`, `pimage`, `pdesc`, `price`, `Status`) VALUES (NULL, $cid, '$pname', '$on', '$pdesc', $pprice, '1');";

            $raw = mysqli_query($conn, $qry);

            if ($raw) {
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
    header("Location: AddProduct.php");
    exit();
}
?>
