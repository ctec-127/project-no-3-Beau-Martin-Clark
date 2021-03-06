<?php // Filename: connect.inc.php

//checks to make sure the page has been fed all the database fields it needs and then inserts them into the database via SQL

require __DIR__ . "/../db/mysqli_connect.inc.php";
require __DIR__ . "/../app/config.inc.php";

$error_bucket = [];

// http://php.net/manual/en/mysqli.real-escape-string.php

if($_SERVER['REQUEST_METHOD']=="POST"){
    // First insure that all required fields are filled in
    if (empty($_POST['first'])) {
        array_push($error_bucket,"<p>A first name is required.</p>");
    } else {
        $first = $db->real_escape_string($_POST['first']);
    }
    if (empty($_POST['last'])) {
        array_push($error_bucket,"<p>A last name is required.</p>");
    } else {
        #$last = $_POST['last'];
        $last = $db->real_escape_string($_POST['last']);
    }
    if (empty($_POST['id'])) {
        array_push($error_bucket,"<p>A student ID is required.</p>");
    } else {
        #$id = $_POST['id'];
        $id = $db->real_escape_string($_POST['id']);
    }
    if (empty($_POST['email'])) {
        array_push($error_bucket,"<p>An email address is required.</p>");
    } else {
        #$email = $_POST['email'];
        $email = $db->real_escape_string($_POST['email']);
    }
    if (empty($_POST['phone'])) {
        array_push($error_bucket,"<p>A phone number is required.</p>");
    } else {
        #$phone = $_POST['phone'];
        $phone = $db->real_escape_string($_POST['phone']);
    }

    if (empty($_POST['gpa'])) {
        array_push($error_bucket,"<p>Please enter a GPA.</p>");
    } else {
        $gpa = $db->real_escape_string($_POST['gpa']);
    }

    if (empty($_POST['financial_aid'])) {
        array_push($error_bucket,"<p>Please enter whether the student is on financial aid or not.</p>");
    } else {
        $financial_aid = $db->real_escape_string($_POST['financial_aid']);
    }

    if (empty($_POST['degree_program'])) {
        array_push($error_bucket,"<p>Please select a degree program.</p>");
    } else {
        $degree_program = $db->real_escape_string($_POST['degree_program']);
    }

    // If we have no errors than we can try and insert the data
    if (count($error_bucket) == 0) {
        // Time for some SQL
        $sql = "INSERT INTO $db_table (first_name,last_name,student_id,email,phone,gpa,financial_aid,degree_program) ";
        $sql .= "VALUES ('$first','$last',$id,'$email','$phone','$gpa','$financial_aid','$degree_program')";

        // comment in for debug of SQL
        // echo $sql;

        $result = $db->query($sql);
        if (!$result) {
            echo '<div class="alert alert-danger" role="alert">
            I am sorry, but I could not save that record for you. ' .  
            $db->error . '.</div>';
        } else {
            echo '<div class="alert alert-success" role="alert">
            I saved that new record for you!
          </div>';
            unset($first);
            unset($last);
            unset($id);
            unset($email);
            unset($phone);
            unset($gpa);
            unset($financial_aid);
            unset($degree_program);
        }
    } else {
        display_error_bucket($error_bucket);
    }
}

?>
