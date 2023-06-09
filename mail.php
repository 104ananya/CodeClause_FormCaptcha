<?php
// Google reCAPTCHA API key configuration
$siteKey     = '6LeiiXgmAAAAAM4pp6AE8oBWGBcrqsnbM29mNt9Q';
$secretKey     = '6LeiiXgmAAAAACx5H9vlN7euqMgEnCKpwqbG5unR';




$postData = $statusMsg = $valErr = '';
$status = 'error';

// If the form is submitted
if (isset($_POST['submit'])) {



    // Get the submitted form data
    $postData = $_POST;
    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Email configuration
    $fromEmail = 'contactananya21@gmail.com';
    $fromName = $first . " " . $last;
    $toEmail = 'contactananya21@gmail.com';

    // Validate reCAPTCHA box
    if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {

        // Verify the reCAPTCHA response
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['g-recaptcha-response']);

        // Decode json data
        $responseData = json_decode($verifyResponse);

        $answer = $responseData->success;

        // If reCAPTCHA response is valid
        if ($responseData->success) {

            // $subject = 'Contact Form Query';
            // $htmlContent = "
            // 		<h2>Contact Request Details</h2>
            // 		<p><b>First Name: </b>" . $first . "</p>
            //         <p><b>Last Name: </b>" . $last . "</p>
            // 		<p><b>Email: </b>" . $email . "</p>
            //         <p><b>Phone: </b>" . $phone . "</p>
            // 		<p><b>Message: </b>" . $message . "</p>
            // 	";

            // // Always set content-type when sending HTML email
            // $headers = "MIME-Version: 1.0" . "\r\n";
            // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // // More headers
            // $headers .= 'From:' . $fromName . ' <' . $fromEmail . '>' . "\r\n";

            // // Send email
            // mail($toEmail, $subject, $htmlContent, $headers);



            $status = 'success';
            $statusMsg = 'Thank you! Your contact request has submitted successfully, we will get back to you soon.';
            $postData = '';
        } else {
            $statusMsg = 'Robot verification failed, please try again.';
        }
    } else {
        $statusMsg = 'Please check on the reCAPTCHA box.';
    }

}
