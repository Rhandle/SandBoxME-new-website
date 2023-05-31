<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" , initial-scale="1.0">
    <title>Contact Us!</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="assets\images\logos\sandbox-logo-thumbnail.png">
</head>

<body>
<?php
$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
   $name = $_POST['name'];
   $email = $_POST['email'];
   $message = $_POST['message'];

   if (empty($name)) {
       $errors[] = 'Name is empty';
   }

   if (empty($email)) {
       $errors[] = 'Email is empty';
   } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $errors[] = 'Email is invalid';
   }

   if (empty($message)) {
       $errors[] = 'Message is empty';
   }

   if (empty($errors)) {
       $toEmail = 'rhandlegapuz@rocketmail.com';
       $emailSubject = 'New email from your contact form';
       $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=utf-8'];
       $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", $message];
       $body = join(PHP_EOL, $bodyParagraphs);

       if (mail($toEmail, $emailSubject, $body, $headers)) 
           header('Location: thank-you.html');
       } else {
           $errorMessage = 'Oops, something went wrong. Please try again later';
       }

   } else {

       $allErrors = join('<br/>', $errors);
       $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
   }


?>
    <nav>
        <input type="checkbox" id="nav-check">
        <div class="nav-btn">
            <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About Us</a></li>
            <li></li> <!-- this is a placeholder for the logo -->
            <li><a href="products.html">Products & Services</a></li>
            <li><a href="contact.html" id="active">Contact Us</a></li>
        </ul>
    </nav>
    <div class="logo-circle">
        <img src="assets/images/logos/SandBox-Logo.png" alt="sandbox-logo">
    </div>

    <main>
        <h1>Contact Us</h1>

        <div class="main-container">
            <div class="left-content-container">
                <form method="post" class="form-main">
                    <div class="name">
                        <label>Name</label>
                        <br>
                        <input type="text" name="name" placeholder="Name" class="name">
                    </div>
                    <br>
                    <div>
                        <label>Email Address</label>
                        <br>
                        <input type="text" name="email" placeholder="Email" class="email">
                    </div>
                    <br>
                    
                    <div>
                        <label>Message</label>
                        <br>
                        <input type="text" name="message" placeholder="Message" class="message">
                    </div>
                    <br>
                    <div>
                        <input type="submit" name="submit" value="Submit" class="submit">
                </form>
            </div>

            <div class="right-content-container">
                <div class="social-container">
                    <h2>Follow Us</h2>
                    <ul>
                        <li><a href="https://www.facebook.com/Sandbox-Middle-East-LLC-100114908426818/"><img src="assets/images/icons/facebook-icon.svg" /></a></li>
                        <li><a href=""><img src="assets/images/icons/whatsapp-icon.svg" /></a></li>
                        <li><a href="https://www.instagram.com/sandboxme.ae/"><img src="assets/images/icons/instagram-icon.svg" /></a></li>
                        <li><a href="https://www.linkedin.com/company/sandbox-middle-east/?originalSubdomain=ae"><img src="assets/images/icons/linkedin-icon.svg" style="height: 1.5em" /></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </main>

    <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
    <script>
        const constraints = {
            name: {
                presence: {
                    allowEmpty: false
                }
            },
            email: {
                presence: {
                    allowEmpty: false
                },
                email: true
            },
            message: {
                presence: {
                    allowEmpty: false
                }
            }
        };

        const form = document.getElementById('contact-form');

        form.addEventListener('submit', function(event) {
            const formValues = {
                name: form.elements.name.value,
                email: form.elements.email.value,
                message: form.elements.message.value
            };

            const errors = validate(formValues, constraints);

            if (errors) {
                event.preventDefault();
                const errorMessage = Object
                    .values(errors)
                    .map(function(fieldValues) {
                        return fieldValues.join(', ')
                    })
                    .join("\n");

                alert(errorMessage);
            }
        }, false);
    </script>

    <footer>
        <div class="footer-content">
            <div class="left-footer-container">
                <h1>Follow Us</h1> <!-- following the tutorial: https://codepen.io/candroo/pen/ozBEWY -->
                <ul>
                    <li><a href="https://www.facebook.com/Sandbox-Middle-East-LLC-100114908426818/"><img src="assets/images/icons/facebook-icon.svg" /></a></li>
                    <li><a href=""><img src="assets/images/icons/whatsapp-icon.svg" /></a></li>
                    <li><a href="https://www.instagram.com/sandboxme.ae/"><img src="assets/images/icons/instagram-icon.svg" /></a></li>
                    <li><a href="https://www.linkedin.com/company/sandbox-middle-east/?originalSubdomain=ae"><img src="assets/images/icons/linkedin-icon.svg" style="height: 1.5em" /></a></li>
                </ul>
            </div>
            <div class="right-footer-container">
                <ul>
                    <li><img src="assets/images/icons/location-icon.svg" />
                        <p>Dubai Investments Park 1 , Unit 515 Arenco Building 4, Dubai , AE</p>
                    </li>
                    <li><img src="assets/images/icons/phone-icon.svg" />
                        <p>+971 4 887 8747</p>
                    </li>
                    <li><img src="assets/images/icons/email-icon.svg" />
                        <p>admin@sandboxme.ae</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="copyright-container">
            <p>&copy; 2023 Sandbox Middle East - All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>