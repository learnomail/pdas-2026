<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);

// 1. Connect to the database (Using the exact credentials from your db.php)
$db = mysqli_connect("localhost", "u700551383_pdas_expo", "9697@Chennai4PDAS", "u700551383_pdas_expo");
if (mysqli_connect_errno()){
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
date_default_timezone_set('Asia/Kolkata');

// 2. Capture Form Data
$full_name = mysqli_real_escape_string($db, $_POST['full_name']);
$designation = mysqli_real_escape_string($db, $_POST['designation']);
$organization = mysqli_real_escape_string($db, $_POST['organization']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$contact_number = mysqli_real_escape_string($db, $_POST['contact_number']);
$category = mysqli_real_escape_string($db, $_POST['category']);

// Combine interests array into a single comma-separated string
$interests = isset($_POST['interests']) ? implode(", ", $_POST['interests']) : "";
$interests = mysqli_real_escape_string($db, $interests);

// 3. Insert into Database
$query = "INSERT INTO visitors (full_name, designation, organization, email, contact_number, category, interests, registration_date) 
          VALUES ('$full_name', '$designation', '$organization', '$email', '$contact_number', '$category', '$interests', NOW())";

if(mysqli_query($db, $query)) {
    // Get the newly generated Registration ID
    $reg_id = mysqli_insert_id($db);
    $reference_number = "PDAS26-" . str_pad($reg_id, 4, '0', STR_PAD_LEFT);

    // 4. Send Email using PHPMailer
    require("./PHPMailer-master/src/PHPMailer.php");
    require("./PHPMailer-master/src/SMTP.php");
    require("./PHPMailer-master/src/Exception.php");
    
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); 
    $mail->CharSet="UTF-8";
    $mail->Host = "smtp.hostinger.com"; 
    $mail->SMTPDebug = 0; 
    $mail->Port = 465; 
    $mail->SMTPSecure = 'ssl';  
    $mail->SMTPAuth = true; 
    $mail->IsHTML(true);
    
    // Auth (Update these with the official PDAS email credentials)
    $mail->Username = "registration@pdas.org.in";
    $mail->Password = "YOUR_EMAIL_PASSWORD";
    
    $mail->SetFrom("registration@pdas.org.in","PDAS 2026 Registration");
    $mail->AddAddress($email);
    $mail->Subject = "Registration Confirmed - PDAS 2026";
    $mail->Body = "Dear $full_name,<br/><br/>Your registration for PDAS 2026 is confirmed.<br/><br/><b>Registration Ref:</b> $reference_number<br/><b>Category:</b> $category<br/><br/>Please bring a valid photo ID to the Chennai Trade Centre.<br/><br/>Regards,<br/>PDAS 2026 Organising Committee";

    if($mail->Send()) {
        // Redirect to a success page
        header("Location: /registration-success?ref=" . $reference_number);
        exit();
    } else {
        echo "Database updated, but Mailer Error: " . $mail->ErrorInfo;
    }
} else {
    echo "Error inserting record: " . mysqli_error($db);
}
?>