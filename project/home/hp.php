<?php
session_start();
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "cart";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['gamename']) && isset($_POST['price'])) {
    // Retrieve data from POST request
    $table_length;
    $query1="SELECT COUNT(*) AS table_length FROM `game`;";
    $result1= $conn->query($query1);
      if ($result1 && $result1->num_rows > 0) {
       $row = $result1->fetch_assoc();
        $table_length = $row['table_length'];
      }
      $table_length+=1;
    $gamename = $_POST['gamename'];
    $price = $_POST['price'];
    $query = "INSERT INTO `game`(`serialnum`,`gamename`, `price`) VALUES ('$table_length','$gamename','$price')";
    if ($conn->query($query) === TRUE) {
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
} 

$conn->close();
?>


 <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HomePage</title>
        <style>
        body{
            background: linear-gradient(to bottom, #052d3a, #182537);
            position: static;
            max-width: 100%;
            margin: 0;
        }
        .header{
                background: #171d25;
                display: flex;
                height: 132px;
                padding-top: 1%;
                padding-left: 10%;
                position: sticky;
            }
            .logo,.links,.last{
                display: flex;
                flex-direction: column;
            }
            .last{
                color: white;
                margin-left:20%;
                margin-right: auto; 
            
            }
            .down
            {
                padding: 50px;
                padding-left: 70px;
                margin: 50px;
                display: flex;
                max-height: 100% ;
                height: 600px;
                
            }
            .col{
                background-image: url(images/gta5.jpg);
                background-repeat: no-repeat;
                background-size: cover;
                display: flex;
                flex-direction: row;
                margin-left: 11%;
                height: 551px;
                width: 1100px;
                border: 3px solid rgb(17, 63, 63);
                padding-left: 20px;
                border-radius: 15px;
                transition: background-image 0.7s ease-in;
            }
            .rig{
                cursor: pointer;
                background-repeat: no-repeat;
                background-size: cover;
                background-image: url(images/d1.png);
                background-color: #1b2838;
                margin-left: 86%;
                margin-top: 22%;
                height: 60px;
                width: 60px;
                border-radius: 50%;
            }
            .left{
                cursor: pointer;
                background-repeat: no-repeat;
                background-size: cover;
                background-image: url(images/d2.png);
                background-color: #1b2838;
                margin-top: 22%;
                height: 60px;
                width: 60px;
                border-radius: 50%;
            }
            .headings{
                display: flex;
                vertical-align: middle;

            }
            .content{
                padding-left: 10px;
                padding-top: 0px;
                margin-left: 7%;
                display: flex;
                flex-direction: column;
                height: 550px;
                width: 250px;
        
                border: 3px solid #1b2838;
                padding-bottom: 0px;
                border-radius: 3%;
            }
            .data{
                display: flex;
                flex-direction: row;
                height: 100px;
                
            }

            .search{
                margin-left: 500px;
                
            }
            
            
        
            ul{
                padding-left: 110px;
                display: flex;
                list-style-type: none;
            }
            li{
                padding-top: 30px;
                padding-left: 40px;
                padding-bottom: 40px;
            }
            a{
                margin-top: 5%;
                color: white;
                font: 29px Brutal,sans-serif;
                text-decoration-line:none;
            }
            #lo{
                background-image: url('images/loginlogo.png');
                background-size: cover;
                border-radius: 40%;
                margin-top: 20px;
                margin-left: 50px;
                height: 70px;
                width: 70px;
                border: 2px solid rgb(33, 35, 43);
                background-color: rgb(74, 86, 92);
                cursor: pointer;
            }
            #i{
                background-color: #171d25;
            }
            .name1{
                cursor: pointer;
                border: 2px  burlywood ;
                margin-top: 1px;
                text-align: center;
                display: flex;
                height: 110px;
            
            }
            .name1:hover{
                
                transform: scale(1.1);
                background-color: rgb(10, 12, 17);
            }
            
            .logos{
                margin: 4px;
                max-height: 100%;
                max-width: 100%;
                width:100px;
                height:100px;
                background-size: cover;
                
                
            }
            .text{
                margin-top: 20px;
                margin-left:13px;
                margin-right: 13px;
                overscroll-behavior-y: initial;
            }
            h2{

                color: whitesmoke;
            }
            .secondpart{
                max-height: 100%;
                max-width: 75%;
                margin-left: 275px;
                margin-top: 10px;
                margin-right: 10px;
                display: flex;
            flex-wrap: wrap;
            }
            .submodules{
                cursor: pointer;
                display: block;
                flex: 0 0 calc(18% - 20px); 
                width: 100%;
                margin-left: 30px; 
                margin-right: 10px;
            }
            .submodules:not(:last-child) {
                margin-bottom: 25px; /* Adds gap between rows */
            }
        .buy{
                padding-top: 10px ;
                padding-left: 15px ;
                display: flex;
                flex-direction: column;
            }
            .pic{
                height: 325px;
                
            }
            span{
                padding-top: 10px;
            }
            #basegame{
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
                font-size: large;
                color: rgb(84, 164, 165);
            }
            #gamename{
                font-family: Arial, Helvetica, sans-serif;
            
                font-weight: bold;
                font-size: x-large;
                color: silver;
            }
            #buy{
                font: 20px Brutal,sans-serif ;
                color:white;
                
            }
            .footer{
                max-width: 100%;
                max-height: 100%;
                background-color: aqua;
            }
        h1{
            padding:20px;
            color: orange ;
            cursor: pointer;
            font: 25px sans-serif;
            font-size:x-large;
            font-weight:bold;
            position:relative;
        }
        h1:hover{
            background-color: white;
            color: black;
            border-radius:25px;
        }
        #dropdown-menu {
        position: absolute;
        top: calc(100% + -15px);
        right: 2%;
        background-color: white;
        color:black;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 5px;
        display: none;
        z-index: 1; /* Ensure the dropdown appears on top */
        }

        /* Dropdown specific styling */
        #dropdown {
        list-style: none;
        padding: 0;
        margin: 0;
        }

        #dropdown li {
            font-weight:bold;
            margin:5px;
        padding: 10px;
        font-size: x-large;
        cursor: pointer;
        transition: background-color 0.3s ease;
        }
        #dropdown li:hover {
        background-color: #f0f0f0;
        }
    

        /* style.css */

    footer {
        background-color: #212529;
        color: #fff;
        padding: 50px 0;
        text-align: center;
    }

    .footer-container {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        max-width: 1140px;
        margin: auto;
    }

    .footer-section {
        margin: 0 10px 20px;
    }

    .footer-section h2 {
        margin-bottom: 10px;
    }

    .footer-section a {
        color: #fff;
        text-decoration: none;
        margin-bottom: 5px;
        display: block;
    }

    .footer-section a:hover {
        color: #dddddd;
    }

    .copyright {
        padding-top: 20px;
        border-top: 1px solid #dddddd;
    }

    #aboutus{
        
        font: 18px sans-serif;
        font-weight:bold;
    }
    #sub{
        padding-top:5px;
        font:16px arial;
    }
    #footer1{
        
        font:30px Helvetica;
        font-weight:bold;
    }
    #noid{
        color:black;
        font-weight: bold;
        margin: 5px;
        padding: 10px;
        font-size: x-large;
        cursor: pointer;
        transition: background-color 0.2s;
    }
    #addCart{
        height:40px;
        font: 18px sans-serif;
        font-weight:bold;
        border-radius:20px;
        background:linear-gradient(90deg, #06BFFF 0%, #2D73FF 100%);
        color:whitesmoke;
        display:none;
    }
    .submodules:hover #addCart {
        display: block;
        cursor:pointer; /* Show the button when hovering over the submodule */
    }
        </style>
        <script type="text/javascript" src="home.js"></script>
    </head>
    <body >
        
        <div class="header">
            <div class="logo">
                <img src="images/lll.png" height="100px"  >
            </div>
            <div class="links">
                <ul >
                    <li><a href="http://localhost/project/home/hp.php" onclick="change(0,id)" id="store">STORE</a></li>
                    <li><a href="#secondpart" onclick="change(1,id)" id="disc">DISCOVER</a></li>
                    <li><a href="#aboutus1" onclick="change(2,id)" id="about">ABOUT US</a></li>
                    
                    <li><a href="#aboutus1" onclick="change(3,id)" id="support">SUPPORT</a></li>
                </ul>
            </div>
            <div class="last">
                <?php
                
                    // Check if username is set in the session
                    if (isset($_SESSION['username'])) {
                        $username = $_SESSION['username'];
                        echo "<h1 id=\"dropdown-trigger\" onclick=\"showoptions()\">Welcome, $username!</h1>";
                    } else {
                        echo "<p>Welcome, Guest!</p>"; // Display a default message if username is not set
                    }
                    ?>
                    <div id="dropdown-menu" class="dropdown-menu hidden">
                        <ul id="dropdown">
                        <li id="unga"><a href="http://localhost/project/cart%20folder/cart.php" id="noid">cart</a></li>
                        <li id="unga" onclick="updateCookie('my_cookie',0); checkcookie()">Sign out</li>
                        </ul>
                    </div>
            </div>
        </div>
        <div    class="down">
            <div class="col">
                <div class="left" style="vertical-align: bottom;">

                </div>
                <div class="rig">
                    
                </div>
            </div>
            <div class="data">
                <div class="content">
                    <div class="name1" id="gta" onclick="logochange(0)" ondblclick="windowchange(0)" onmouseover="">
                        <div class="logos" style="background-image: url(images/gtalogo.png);">
                            
                        </div>
                        <div class="text" id="gta5">
                            <h2>GTA V</h2>
                        </div>
                    </div>
                    <div class="name1" id="cyberpunk" onclick="logochange(1) " ondblclick="windowchange(1)">
                        <div class="logos" style="background-image: url(images/cyberlogo.jpg);">
                        </div>
                        <div class="text">
                            <h2>Cyberpunk</h2>
                        </div>
                        
                    </div>
                    <div class="name1" id="fortnite" onclick="logochange(2) " ondblclick="windowchange(2)">
                        <div class="logos" style="background-image: url(images/fortnitelogo.png);"></div>
                        <div class="text">
                            <h2>Fortnite</h2>
                        </div>
                    </div>
                    
                    <div class="name1"  id="miles" onclick="logochange(3)" ondblclick="windowchange(3)">
                        <div class="logos" style="background-image: url(images/mileslogo.png);"></div>
                        <div class="text">
                            <h2>Milesmorales</h2>
                        </div>
                    </div>
                    <div class="name1" id="morales" onclick="logochange(4)" ondblclick="windowchange(4)">
                        <div class="logos" style="background-image: url(images/rocket.jpg);";"></div>
                        <div class="text">
                            <h2>Rocket race</h2>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <div class="secondpart">      
            <div class="submodules" onclick="showadd()">
                <div class="pic">
                    <img src="images/rdr2.jpeg" style="height: 100%; width: 100%; object-fit: contain;">
                </div>
                <div class="buy">
                    <span id="basegame">BASE GAME</span>
                    
                    <span id="gamename">Red Dead Redemption II</span>
                    <span id="buy">Rs.1299/-</span>
                    <br>
                    <button  id="addCart" onclick="databaseentry(5)">addCart</button>
                </div>
            </div>
            <div class="submodules">
                
                <div class="pic">
                    <img src="images/fifa,.jpeg" style="height: 100%; width: 100%; object-fit: contain;">
                </div>
                <div class="buy">
                    <span id="basegame">BASE GAME</span>
                    <span id="gamename">EA Sports Fifa 14</span><br>
                    <span id="buy">Rs.1599/-</span>
                    <br>
                    <button  id="addCart" onclick="databaseentry(6)">addCart</button>
                </div>
            </div>
            <div class="submodules">
                <div class="pic">
                    <img src="images/cod.jpeg" style="height: 100%; width: 100%; object-fit: contain;">
                </div>
                <div class="buy">
                    <span id="basegame">BASE GAME</span>
                    <span id="gamename">Call Of Duty: Modern Warfare</span>
                    <span id="buy">Rs.499/-</span>
                    <br>
                    <button  id="addCart" onclick="databaseentry(7)">addCart</button>
                </div>
            </div>
            <div class="submodules">
                <div class="pic">
                    <img src="images/minecraft.png" style="height: 100%; width: 100%; object-fit: contain;">
                </div>
                <div class="buy">
                    <span id="basegame">BASE GAME</span>
                    <span id="gamename">Minecraft</span><br>
                    <span id="buy">Rs.1299/-</span>
                    <br>
                    <button  id="addCart" onclick="databaseentry(8)">addCart</button>
                </div>
            </div>
            <div class="submodules">
                <div class="pic">
                    <img src="images/assasian.avif" style="height: 100%; width: 100%; object-fit: contain;">
                </div>
                <div class="buy">
                    <span id="basegame">BASE GAME</span>
                    <span id="gamename">Assasians Creed</span><br>
                    <span id="buy">Rs.1599/-</span>
                    <br>
                    <button  id="addCart" onclick="databaseentry(9)">addCart</button>
                </div>
            </div>

            
            <div class="submodules">
                
                <div class="pic">
                    <img src="images/forza.jpeg" style="height: 100%; width: 100%; object-fit: contain;">
                </div>
                <div class="buy">
                    <span id="basegame">BASE GAME</span>
                    <span id="gamename">Forza Horizon 5</span>
                    <span id="buy">Rs.3999/-</span>
                    <br>
                    <button  id="addCart" onclick="databaseentry(10)">addCart</button>
                </div>
            </div>
            <div class="submodules">
                
                <div class="pic">
                    <img src="images/hogwarts.jpeg" style="height: 100%; width: 100%; object-fit: contain;">
                </div>
                <div class="buy">
                    <span id="basegame">BASE GAME</span>
                    <span id="gamename">Hogwarts Legacy</span><br>
                    <span id="buy">Rs.1799/-</span>
                    <br>
                    <button  id="addCart" onclick="databaseentry(11)">addCart</button>
                </div>
            </div>
            <div class="submodules">
                <div class="pic">
                    <img src="images/cod.jpeg" style="height: 100%; width: 100%; object-fit: contain;">
                </div>
                <div class="buy">
                    <span id="basegame">BASE GAME</span>
                    <span id="gamename">Call Of Duty: Modern Warfare</span>
                    <span id="buy">Rs.1799/-</span>
                    <br>
                    <button  id="addCart" ">addCart</button>
                </div>
            </div>
            <div class="submodules">
                <div class="pic">
                    <img src="images/minecraft.png" style="height: 100%; width: 100%; object-fit: contain;">
                </div>
                <div class="buy">
                    <span id="basegame">BASE GAME</span>
                    <span id="gamename">Minecraft</span><br>
                    <span id="buy">Rs.1299/-</span>
                    <br>
                    <button  id="addCart" ">addCart</button>
                </div>
            </div>
            <div class="submodules">
                <div class="pic">
                    <img src="images/assasian.avif" style="height: 100%; width: 100%; object-fit: contain;">
                </div>
                <div class="buy">
                    <span id="basegame">BASE GAME</span>
                    <span id="gamename">Assasians Creed</span><br>
                    <span id="buy">Rs.1299/-</span>
                    <br>
                    <button  id="addCart" >addCart</button>
                </div>
            </div>    
        </div>
        <footer>
            <div class="footer-container">
                <div class="footer-section">
                    <h2 id="footer1">Contact Us</h2>
                    <p>Have any questions about our games? Feel free to reach out!</p>
                    <a href="mailto:support@epicEmporium.com">support@Epic-Emporium.com</a>
                </div>
                <div class="footer-section">
                    <h2 id="footer1">Follow Us</h2>
                    <a href="https://www.instagram.com/manideep_834/?hl=en">Instagram</a>
                    <a href="https://www.linkedin.com/in/mani-deep-82b178258">Linked in</a>
                    <a href="https://mail.google.com/mail/u/0/#inbox">Gmail</a>
                </div>
                <div class="footer-section" id="aboutus1">
                    <h2 id="footer1"><a href="#">About Us</a></h2>
                    <span id="aboutus">Epic Emporium: We Live, Breathe, Game<br></span>

    <span id="sub">We're a passionate bunch at Epic Emporium, founded by gamers, for gamers. We offer a huge selection of games, from the hottest releases to hidden treasures, for all platforms. Our friendly experts are here to recommend the perfect game for you, no matter your skill level..</span>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2024 Epic-Emporium Game store. All Rights Reserved.</p>
            </div>
        </footer>
    </body>
    </html>