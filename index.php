<?php
require_once('./vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "his_system";

function send_email($mail_to, $recipient_ref, $ptname)
{

    $mail_message = "your patient reference number is". $recipient_ref;

    date_default_timezone_set('Etc/UTC');
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'your_gmail_username@gmail.com';
    $mail->Password = 'your_gmail_password';

    $mail->setFrom('your_gmail_username@gmail.com', 'HIS SUPPORT');
    $mail->addAddress($mail_to, $ptname);

    $mail->isHTML(true);
    $mail->Subject = 'Patient refence number';
    $mail->Body    = $mail_message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    if (!$mail->send()) {
        return false;
    } else {
        return true;
    }
}

if (isset($_POST['ptsubmit'])) {
    $ptphone1 = $_POST['ptphone1'];
    $ptname = $_POST['ptname'];

    $ptdob = $_POST['ptdob'];
    $ptid = $_POST['ptid'];
    $ptaddr = $_POST['ptaddr'];
    $ptcounty = $_POST['ptcounty'];
    $ptsubcounty = $_POST['ptsubcounty'];
    $ptphone2 = $_POST['ptphone2'];
    $ptemail = $_POST['ptemail'];
    $ptgender = $_POST['ptgender'];
    $ptmaritalstatus = $_POST['ptmaritalstatus'];
    $ptref = substr(md5(time()), 0, 20);



    $ptdetailsinsertsql = "INSERT INTO `patient_details` 
(`Telephone_no`, `Name`, `DOB`, `ID_NO`, `Adress`, `County`, `sub_county`, `Telephone`, `Email`, `Gender`, `Marital_Status`, `reference_number`) 
VALUES 
('$ptphone1', '$ptname', '$ptdob', '$ptid', '$ptaddr', '$ptcounty', '$ptsubcounty', '$ptphone2', '$ptemail', '$ptgender', '$ptmaritalstatus', '$ptref') ";

    send_email($ptemail, $ptref, $ptname);

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    if ($conn->query($ptdetailsinsertsql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $ptdetailsinsertsql . "<br>" . $conn->error;
    }

    $conn->close();


    $ptkinname = $_POST['ptkinname'];
    $ptkindob = $_POST['ptkindob'];
    $ptkinidno = $_POST['ptkinidno'];
    $ptkingender = $_POST['ptkingender'];
    $ptkinrel = $_POST['ptkinrel'];
    $ptkinphone = $_POST['ptkinphone'];

    $kindetailsinsert = "INSERT INTO `patient_next_of_kin` 
(`kin_Name`, `kin_dob`, `kin_gender`, `kin_phone`, `kin_id`, `kin_relationship`, `patient_ref_no`) 
VALUES 
('$ptkinname', '$ptkindob', '$ptkingender', '$ptkinphone', '$ptkinidno', '$ptkinrel', '$ptref') ";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    if ($conn->query($kindetailsinsert) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $kindetailsinsert . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<form method="post" action="">
    <h3>Patients Registration Form </h3>
    Telephone: <input type="text" name="ptphone1" />
    Name: <input type="text" name="ptname" />
    Date of birth: <input type="text" name="ptdob" /> ID Number: <input type="text" name="ptid" />
    Address: <input type="text" name="ptaddr" />
    County: <input type="text" name="ptcounty" /> Sub County: <input type="text" name="ptsubcounty" />


    Telephone: <input type="text" name="ptphone2" /> Email: <input type="text" name="ptemail" />
    Gender: <input type="text" name="ptgender" /> Marital status: <input type="text" name="ptmaritalstatus" />


    <h3> Next of Kin </h3>

    Name: <input type="text" name="ptkinname" />
    Date of birth: <input type="text" name="ptkindob" /> ID Number: <input type="text" name="ptkinidno" />

    Gender: <input type="text" name="ptkingender" /> Relationship: <input type="text" name="ptkinrel" />
    Telephone: <input type="text" name="ptkinphone" />
    <input type="submit" name="ptsubmit" value="Submit form">
</form>