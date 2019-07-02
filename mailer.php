               <img src="img/epic.jpg" alt="img/epic.jpg">

<?php
   error_reporting(-1);
   ini_set('display_errors', 'On');
   set_error_handler("var_dump");
   $myemail = 'sales@godesignpro.com';
   $name = check_input($_POST['name'], "Enter your name");
   $subject = check_input($_POST['subject'], "Enter a subject");
   $email = check_input($_POST['email']);
   $message = check_input($_POST['message'], "Write your message");
   if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
   {
   show_error("E-mail address not valid");
   }
   $message = "
   Name: $name
   E-mail: $email
   Subject: $subject
   Message:
   $message
   ";
   mail($myemail, $subject, $message);
   header('Location: thanks.php');
   exit();
   function check_input($data, $problem='')
   {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   if ($problem && strlen($data) == 0)
   {
   show_error($problem);
   }
   return $data;
   }
   function show_error($myError)
   {
   ?>
<html>
   <body>
      <p>FAIL! Please correct the following error:</p>
      <strong><?php echo $myError; ?></strong>
      <p>You may close this window and try again</p>
   </body>
</html>
<?php
   exit();
   }
   ?>