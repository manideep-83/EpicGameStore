<?php
session_start();
                                
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'cart';

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <style>
        .container{
            
            max-height: 100%;
            width:70%;
            border: 2px solid black;
            margin: 14%;
            margin-top: 10%;
            background: #171d25;
            color:white;
        }
        .maincon{
            display: flex;
        }
        
        .container2{
            margin-top:3%;
            margin-right: 1%;
            padding: 2%;
            padding-left:2%;
            padding-right:-2%;
            
            height: 80%;
            width: 20%;
        
            
            
        }
        table {
            width: 100%;
            height: 100%;
            border-collapse: collapse;
         /* Orange border */
        }

tr {
    height: 30px; 
}
th{
    font-size:x-large;
    font:Verdana;
    justify-content:center;
    align-items:center;
}
tr{
    font-size:large;

}
th{
    border-left:2px solid black;
    border-right:2px solid black;
    margin-bottom:5px;
}
th, td {
    
    padding: 15px;
    text-align: left;
}
td{
    border: 2px solid black; 
}

th {
    background-color: #f2f2f2; /* Light gray background */
}

.container1 {
    border: 2px solid #333; 
    margin: 3%;
    width: 60%;
    height: 80%;
    padding: 3%;
    background-color:aliceblue;
    color:black;
}
body{
    max-height:100%;
    background: linear-gradient(135deg,rgb(69, 131, 150),rgb(16, 16, 67));
    
}
img{
    height:100px;
    margin-top:10%;
}
.total-price{
    margin-left:40%;
    font:20px sans-serif;
}
#purchase{
    height:50px;
    width:200px;
    margin-left:320px;
    font:20px sans-serif;
    background:linear-gradient(50deg,skyblue,black);
    color:white;
    border-radius:25px;
}
#purchase:hover{
    cursor:pointer;
    background:linear-gradient(150deg,grey,skyblue);
    color:whitesmoke;
    font-weight:bold;
    font-size:large;
}
    </style>
</head>
<body>
    <div class="container">
            <h1><center>Thank you for shopping on Epic-Emporium Game Store</center></h1>
            <h2><center> Cart Area</center></h2>
            <div class="maincon">
                <div class="container1">
                 
                        <table>
                            <tr>
                                <th>serial Number</th>
                                <th>Game Name</th>
                                <th>Price</th>
                            </tr>
                            <?php
                                // Retrieve cart items from the database and display them in a table
                                $sql = "SELECT * FROM game";
                                $result = $conn->query($sql);
                                $totalPrice=0;
                                if ($result->num_rows > 0) {
                                    // Output game data
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['serialnum']. "</td>";
                                        echo "<td>" . $row['gamename'] . "</td>";
                                        echo "<td>$" . $row['price'] . "</td>";
                                        echo "</tr>";
                                        $totalPrice += $row['price'];
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>No games found</td></tr>";
                                }
                                $conn->close();
                                ?>

                        </table>
                        <div class="total-price">
                            <p>Total Price: $<?php echo number_format($totalPrice, 2); ?></p>
                        </div>
                        <button type="submit" id="purchase">purchase
                   
                </div>
                <div class="container2">
                                <img src="http://localhost/project/cart%20folder/lll.png">
                </div>
            </div>
            
    </div>
</body>
</html>