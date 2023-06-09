<!-- HTML CODE  -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">



    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body>

    <span class="logo">Hi ! <span style="color: black;">There</span> </span>

    <div class="nav">

        <span> <a href="https://kumari-ananya.netlify.app/" target="_blank">Website</a> </span>
        <span> <a href="https://whimsical.com/featured-projects-PPoeaA6ojuTP4HgTpHeN6g@7YNFXnKbYiH8qGN5qiB2P" target="_blank">Featured</a> </span>
        <span><a href="https://technoscape847364047.wordpress.com/" target="_blank">Blog</a></span>
        <span><a href="https://kumari-ananya.netlify.app/" target="_blank">About</a></span>
        <span><a href="/">Contact</a></span>
        <span class="circle"> <a href="https://www.linkedin.com/in/104ananya" target="_blank">
                <img src="user.svg" alt="user">
            </a>
        </span>
        <span class="circle"><a href="https://github.com/104ananya" target="_blank">
                <img src="github.svg" alt="github">
            </a>
        </span>

    </div>

    <div class="title">
        <p class="heading">Contact Me</p>
        <p class="msg">Any question or remarks? Drop us a message!</p>
    </div>

    <div class="main">

        <div class="card">

            <div class="card-header">
                <p class="ch1">Contact Information</p>
                <p class="ch2">Say something to start a live chat!</p>
            </div>

            <div class="card-body">
                <div>
                    <div><i class="uil uil-phone-alt"></i></div>
                    <div class="text">+91 7925454442</div>
                </div>
                <div>
                    <div><i class="uil uil-envelope"></i></div>
                    <div class="text">contactananya@​yahoo.com</div>
                </div>
                <div>
                    <div><i class="uil uil-location-point"></i></div>
                    <div class="text add">132 Lorem ipsum dolor sit 02156 United States</div>
                </div>
            </div>

            <div class="ellipse01"></div>
            <div class="ellipse02"></div>

            <div class="icon">
                <div class="symbol"><a href="https://twitter.com/ANANYA1004" target="_blank" rel="noopener noreferrer"><img src="twitter.svg" alt="twitter" srcset=""></a></div>
                <div class="symbol"><a href="https://www.instagram.com/envizus_coredev/" target="_blank" rel="noopener noreferrer"><img src="insta.svg" alt="insta" srcset=""></a></div>
                <div class="symbol"><a href="https://www.linkedin.com/in/104ananya" target="_blank" rel="noopener noreferrer"><img src="fb.svg" alt="fb" srcset=""></a></div>
            </div>


        </div>



        <div class="form-sect">

            <form method="POST" action="">
                <div class="one">
                    <label for="first">First Name</label> <br>
                    <input type="text" name="first" id="first">
                </div>

                <div class="two">
                    <label for="last">Last Name</label> <br>
                    <input type="text" name="last" id="last">
                </div>


                <div class="three">
                    <label for="email">Email</label> <br>
                    <input type="email" name="email" id="email">
                </div>

                <div class="four">
                    <label for="phone">Phone Number</label> <br>
                    <input type="text" pattern="[789][0-9]{9}" name="phone" id="phone">
                </div>

                <div class="five">
                    <label for="message">Message</label> <br>
                    <textarea name="message" id="message" cols="30" rows="3" placeholder="Write your message"></textarea>
                </div>


                <div class="g-recaptcha" data-sitekey="6LeiiXgmAAAAAM4pp6AE8oBWGBcrqsnbM29mNt9Q"></div>


                <button type="submit" name="submit" value="Send Message" onclick="sendEmail()">Send Message</button>
            </form>

            <div class="arrow"><img src="letter.png" alt="" srcset=""></div>





            <?php
            if (isset($_POST['submit'])) {
                $first = $_POST['first'];
                $last = $_POST['last'];
                $user_email = $_POST['email'];
                $phone = $_POST['phone'];
                $message = $_POST['message'];

                $user = $first . " " . $last;

                $email_from = 'contactananya@gmail.com';
                $email_subject = "New Form Message";
                $email_body = "Name: $user. \n" .
                    "Email: $user_email. \n" .
                    "Phone: $phone. \n" .
                    "Message: $message. \n";

                $to_email = "contactananya@gmail.com";
                $headers = "From: $email_from \r\n";
                $headers .= "Reply-To: $user_email \r\n";

                $secretKey = "6LeiiXgmAAAAACx5H9vlN7euqMgEnCKpwqbG5unR";
                $responseKey = $_POST['g-recaptcha-response'];
                $userIP = $_SERVER['REMOTE_ADDR'];

                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";

                $response = file_get_contents($url);
                $response = json_decode($response);

                if ($response->success) {
                    mail($to_email, $email_subject, $email_body, $headers);
                    echo '<div class="success status__msg">Message Sent Successfully</div>';
                } else {
                    echo '<div class="error status__msg">Invalid Captcha please try again</div>';
                }
            }
            ?>





        </div>






</body>

</html>