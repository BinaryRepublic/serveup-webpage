<?php
    // Securing the form against mail injection
    function IsInjected($str)
    {
        $injections = array(
            '(\n+)',
            '(\r+)',
            '(\t+)',
            '(%0A+)',
            '(%0D+)',
            '(%08+)',
            '(%09+)'
        );

        $inject = join('|', $injections);
        $inject = "/$inject/i";

        if(preg_match($inject,$str))
        {
            return true;
        }
            else
        {
            return false;
        }
    }

    $name = $_POST['name'];
    $visitors_email = $_POST['mail'];
    $message = $_POST['message'];

    $email_from = $visitors_email;
    $email_subject = "New Form Submission";
    $email_body = "You have received a new message from the user $name.\n Here is the message:\n $message";

    $to = 'mika.hally@code.berlin';
    $headers = "From: $email_from \r\n";
    $headers = "Reply-To: $visitors_email \r\n";

    if(IsInjected($visitors_email)) {
        echo "Bad email value!";
        exit;
    } else {
        mail($to,$email_subject,$email_body,$headers);
        $success = "Thank you for your message. We will get back to you as soon as possible.";
        echo '
            <script type="text/javascript">
                localStorage.openModal = true;
                window.location = "../index.html#contact";
            </script>
        ';
    }
