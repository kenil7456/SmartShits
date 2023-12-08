
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Smart Shift</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="login-page-container">
        <div class="login-logo-container">
            <img src="SmartShift.png" alt="Smart Shift" class="login-logo">
            <h1 class="login-page-title">Smart Shifts</h1>
            <h2 class="login-page-slogan">Your Workforce, Our Expertise</h2>
        </div>
        <div class="login-form-container">
            <h2>Welcome Back!</h2>
            <form name="f1" action="superuser.php" class="login-form" method="post" onsubmit="return validation()">
                    
                <label for="username" class="login-label">Username</label>
                <input type="text" name="username" id="username" class="login-input" required>
                
                <label for="password" class="login-label">Password</label>
                <input type="password" name="password" id="password" class="login-input" required>
                
                <button type="submit" class="login-button" id="submit" value="login">Login</button>
            </form>
            <div class="social-login">
                <a href="#" class="icon-button google">
                  <i class="fab fa-google"></i>
                </a>
                <a href="#" class="icon-button microsoft">
                  <i class="fab fa-microsoft"></i>
                </a>
              </div>              
            <!-- <p class="login-signup-text">Don't have an account? <a href="signup.html" class="login-signup-link">Sign up</a></p> -->
        </div>
    </div>
    <script>  
            function validation()  
            {  
                var id=document.f1.user.value;  
                var ps=document.f1.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty"); 
                    echo "User Name and Password fields are empty"; 
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        echo "User Name is empty"; 
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    echo "Password is empty"; 
                    return false;  
                    }  
                }                             
            }  
        </script>
</body>
</html>
