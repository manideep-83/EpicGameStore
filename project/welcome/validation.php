<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $database = "login";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
   

    if (isset($_POST['log_in'])) {
        // Login
        $username = trim($_POST['Username']);
        $password = trim($_POST['pass']);

        $hashed_password = md5($password);
        
        $query = "SELECT * FROM `authenticate` WHERE `username`='$username' AND `password`='$password'";
        $result = $conn->query($query);

        if ($result && $result->num_rows == 1) {
            $_SESSION['username'] = $username;
            setcookie("my_cookie",1);
            header("Location: http://localhost/project/home/hp.php");
            exit();
        } else {
            $_SESSION['login_message'] = "Invalid username or password";
            header("Location: validation.php");
            exit();
        }
    } elseif (isset($_POST['Register'])) {
        $query1="SELECT COUNT(*) AS table_length FROM `authenticate`;";
        $result1= $conn->query($query1);
        if ($result1 && $result1->num_rows > 0) {
            // Fetching the row as an associative array
            $row = $result1->fetch_assoc();
            // Accessing the value of the 'table_length' column
            $table_length = $row['table_length'];
        } 
        echo $table_length;
        $username = $conn->real_escape_string($_POST['reg_username']);
        $email = $conn->real_escape_string($_POST['reg_email']);
        $password = $conn->real_escape_string($_POST['reg_password']);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO `authenticate` (`serialnum`,`username`,`password`, `email`) VALUES ('$table_length','$username','$password', '$email')";
        if ($conn->query($query) === TRUE) {
            $registration_success_message = "Registration successful. Please log in.";
            header("Location: http://localhost/project/welcome/registered.html");
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin: 0;
            background-color: #171d25;
            overflow-x: hidden;
            overflow-y: scroll;
            max-height: 100%;
            max-width: 100%;
            display: block;
        }
        .hea{
            background-color: #181a21;
            height: 110px;
            max-width: 100%;
            display: flex;
            padding-left: 7%;
            padding-top: 1%;
            padding-bottom: 1%;
        }
        .logo,.label{
            display: flex;
        }
        .label{
            padding-top: 2%;
        }
      
        .child {
            position: relative;
            margin-left: -1%;
            margin-right: -1%;
            max-height: 700px;
            overflow: hidden;
            
        }
        .child::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-image: url('back.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            filter: brightness(40%);
        }
        .sign{
            padding-top: 80px;
            padding-bottom: 15px;
            flex-direction: column;
            align-items: center;
            display: flex;   
            height: 1000px;
            width: 100%;
            filter: brightness(100%);  
        }
        .up{
            width: 50%;
        }

        .details{
            flex: 1;
            margin-left: 1%;
            padding:1% ;
            background-color: #181a21;
            padding-bottom: 75px;
            padding-left: 5%;
            color: aliceblue;
            display: flex;
        }
        .logg {
            margin-right: 0%;
            padding-right: 0%;
            width: 60%;
        }
        .logo1 {
            width: 30%;
            padding-top: 12% ;
            padding-left: 2%;
            padding-right:10%;
        }
        .signu{
            padding-top: 4%;
            flex-direction: column;
            align-items: center;
            display: flex;
            padding-bottom: 4%;

        }
        .enter{
            margin-top: -2%;
            display: none;
            color: white;
            width: 50%;
            flex-direction: column;
            padding-left: 5%;
        }
        .inner{
            width: 100%;
            background-color: #171d25;
        }
        .for{
            display: flex;
            color: white;
            width: 60%;
            flex-direction: column;
            padding-left: 5%;
            padding-top: 3%;
            padding-bottom: 3%;
            max-height:100%;
        }
        .logo2{
            width:30%;
            padding-top: 20%;
            padding-left: 1%;
        }
        .msg{

            color: whitesmoke;
            filter: brightness(100%);
            font: 30px  Brutal,sans-serif;
        }
        #Username,#pass{
            color: whitesmoke;
            background-color: rgba(83, 83, 83, 0.2);
            border: 1px solid #32353c;
            font-size: 20px;
            width: 90%;
            height: 50px;
            padding-left: 4%;
        }
        #email,#email1,#select{
            background-color: rgba(83, 83, 83, 0.2);
            color: whitesmoke;
            font-size: 20px;
            width: 90%;
            height:50px;
            padding-left:4%;
            border: 1px solid black;
            border-radius: 0;
        }
        option{
           background:#171d25 ;
           color: #06BFFF;
        }
        h5,#hj{
            font: 20px  Brutal,sans-serif;
            margin-bottom: 1%;
        }
        #l2{
            color: aliceblue;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        #submit{
            margin-top: 5%;
            margin-left: 25%;
            height: 60px;
            width: 40%;
            font-size: 25px;
            color: whitesmoke;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background:linear-gradient(90deg, #06BFFF 0%, #2D73FF 100%);
        }
        ul{
            padding-left: 100px;
            display: flex;
            list-style-type: none;
        }
        li{
            padding-left: 70px;
           
            
        }
        img{
            height: 100px;
        }
        .logg,.logo1{
            box-sizing: border-box;
        }
        a{
            margin-top: 5%;
            color: whitesmoke;
            font-size: xx-large;
        }
        checkbox{
            size: 10px;
        }
        #button{
            height: 60px;
            width: 15%;
            font-size: 20px;
            color:  black;
            background-color: #06BFFF;
            border: 2px solid  black;
            cursor: pointer;
        }
        span{
            color: azure;
        }
    </style>
    <script type="text/javascript" src="welcom.js"></script>
</head>
<body>
    <div class="hea">
        <div class="logo">
            <img src="logo.png" >
        </div>
        <div class="label">
            <ul >
                <li> <a href="http://localhost/project/home/hp.php">Store</a></li>
                <li> <a href="action.html">Sign in</a></li>
                <li> <a href="#button" id="test">Sign up</a></li>
                <li> <a href="action.html">About us</a></li>
            
            </ul>
            
        </div>
       
    </div>
    <div class="child">
        
        <div class="sign">
            <div class="up">
                <div class="msg" >
                    <h3 class="h3">Sign in</h3>
                </div>
                <div class="details">
                    <div class="logg">
                        <h5>Sign in with account name</h5>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <input type="text" name="Username" id="Username" autocomplete="false">
                        <h5>Password</h5>
                        <input type="password" name="pass" id="pass"><br>
                        <span class="error" style="color:red;">*
                            <?php
                            
                            // Display error message if set
                            echo isset($_SESSION['login_message']) ? $_SESSION['login_message'] : ""; 
                            // Clear the session after displaying the message
                            unset($_SESSION['login_message']);
                            ?>
                        </span>
                        <button  id="submit" name="log_in" onclick="setCookie('my_cookie', '1'); checkCookie();">Sign In</button>
                    </form>
                    </div>
                    <div class="logo1">
                        <img src="lll.png">
                    </div>
                </div>
            </div>

            <div class="enter">
                <h1>Create your account</h1>
                <div class="inner">
                   
                    <div class="for">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <h3 id="hj" >Enter your username</h3>
                            <input type="text" id="email" name="reg_username" required>
                            <h3 id="hj">Email Adress</h3>
                            <input type="email" name="reg_email" id="email" required>
                            <h3 id="hj">Enter password</h3>
                            <input type="password" id="email1" name="reg_password" required>
                            <h3 id="hj">Country of Residence</h3>
                            <select id="select">
                                <option value="in">India</option>
                                <option value="usa">United states of america</option>
                                <option value="Afr">Africa</option>
                                <option value="uk">UK</option>
                                <option value="japan">Japa</option>
                            </select><br>
                            <br><input type="checkbox" id="checkbox">I am Greater than 18 years old
                                <button type="submit" name="Register" id="submit">Submit</button>
                        </form>
                    </div>
                    
                    <div class="logo2">
                        <img src="lll.png">
                    </div>
                  
                </div>
                
            </div>
        </div>
        
    </div>
    <div class="signu">
        <h2 id="l2">New to Epic Emporium?</h2>
        <button type="submit" id="button" onclick="newen()">Create an account</button>
    </div>
</body>
</html>
