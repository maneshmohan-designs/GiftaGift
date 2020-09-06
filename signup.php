<html>
<head>
    <link rel="stylesheet" href="signup.css">
    </head>
<body>
    <?php
    include_once('index.php');
    ?>
    <form method="post" action="signup.php" id="signup">
    
    Username<input type="text" name="username"> 
    Password<input type="password" name="password">
       Email <input type="text" name="email"onblur="validateEmail(this.value);">
    Phone Number<input type="number" name="phonenumber">
        <input type="submit" name="submit" value="signup" id="submit">        
    </form>
    </body>
<script type="text/javascript">
    function validateEmail(sEmail) {
  var reEmail = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/;

  if(!sEmail.match(reEmail)) {
    alert("Invalid email address");
    return false;
  }

  return true;

}
    function phonenumber(inputtxt)  
{  
  var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;  
  if((inputtxt.value.match(phoneno)) ) 
        {  
      return true;  
        }  
      else  
        {  
        alert("message");  
        return false;  
        }  
}
    
    </script>
</html>
