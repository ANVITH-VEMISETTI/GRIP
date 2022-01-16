<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($link,$sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($link,$sql);
    $sql2 = mysqli_fetch_array($query);



    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  
        echo '</script>';
    }

    else if($amount == 0){

        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    }

  
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  
        echo '</script>';
    }
    

    else {
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$from";
                mysqli_query($link,$sql);
             

                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$to";
                mysqli_query($link,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO transactions(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($link,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='transaction_history.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <style>
        body{
            background-color : rgb(194, 194, 194);
        }

        h1{
            color : purple;
            text-align: center;
        }
        h2{ 
            display : inline;
            position: absolute;
            top: 0;
            right: 20px;
        }

        h2 a
        {
            color : rgb(238, 71, 71);
            text-decoration : none; 
            font-weight : bold;
        }

        h2 a:hover{
            background-color: grey;
            font-weight: bold;
            color : black;
        }

        nav{
            color: rgb(238, 71, 71);
            background-color : white;
        }
        nav ul
        {
            list-style-type: none;
            text-decoration-color: rgb(238, 71, 71);
            padding: 0;
            margin: 0;
            overflow: hidden;
        }
        li{
            float: left;
        }
        li a{
            display: block;
            color: rgb(238, 71, 71);
            font-weight: bolder;
            text-align: center;
            padding: 20px;
            text-decoration: none;
        }
        li a:hover{
            background-color: grey;
            font-weight: bold;
            color : black;

        }
        footer{
            background-color : rgb(194, 194, 194);
            align-items : center;
            text-align : center; 
        }
        table{
            margin : auto;
            width : 80%;
            border-collapse : collapse;
            border-radius : 3px;
        }
        table,td,th{
            border : 3px solid white;
            padding : 5px;
            text-align : center; 
        }
        tr:hover{
            background-color : rgb(177, 176, 176);
        }
        tr:nth-child(even)
        {
            background-color : rgb(177, 176, 176);
        }

        #d2 {
            margin: auto;
            background-color: rgb(230, 224, 224, 0.4);
            background-blend-mode: screen;
            align-items: center;
            text-align: center;
            padding: 20px;
            height: 100%;
            width: 60%;
            border-radius: 10px;
        }

        input {
            text-align: center;
            border: whitesmoke;
            margin: auto;
            padding : 8px;
            border-radius: 5px;
        }
        
        select {
            text-align: center;
            border: whitesmoke;
            margin: auto;
            padding: 8px;
            border-radius: 5px;
        }
        label{
            margin: 10px;
        }


        input[type=submit] {
            background-color: #777;
            border: 1px solid #777;
            color: whitesmoke;
            border-radius: 5px;
            font-family: inherit;
            font-size: 21px;
            width: 80%;
            padding: 8px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        input[type=submit]:hover {
            background-color: rgb(54, 53, 53);
        }

        :-ms-input-placeholder{
            text-align: center;
            font-family: 'Calibri';
            font-weight: 100;
        }
        button{
            border-radius : 3px;
            transition: 1.5s;
            text-align : center;
            padding : 8px;
            width : 15%;
            color : white;
            background-color: rgb(99, 97, 97);
        }
        button:hover{
            background-color : #616C6F;
            color: black;
        }
    </style>
</head>
<body>
    <nav>
        <ul id="menu">
            <li class="ui-state-disabled"><a href="index.html">Home</a></li>
            <li class="ui-state-disabled"><a href="filter.html">Search user</a></li>
            <li class="ui-state-disabled"><a href="createuser.html">Create user</a></li>
            <li class="ui-state-disabled"><a href="transfer.php">Transfer Money</a></li>
            <li class="ui-state-disabled"><a href="transaction_history.php">Transaction History</a></li>
        </ul>
        <h2><a href="index.html">USER BANK</a></h2>
    </nav>
        <h1>Transaction</h1>
        <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  users where id=$sid";
                $result=mysqli_query($link,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <div id="d2">
            <form method="post" name="tcredit" class="tabletext" ><br>
            <table>
                <tr style="color : black;">
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Balance</th>
                </tr>
                <tr style="color : black;">
                    <td><?php echo $rows['id'] ?></td>
                    <td><?php echo $rows['name'] ?></td>
                    <td><?php echo $rows['email'] ?></td>
                    <td><?php echo $rows['balance'] ?></td>
                </tr>
            </table>
            <br><br><br>
            <label for="to" style="color : black;"><b>Transfer to:</b></label>
            <select name="to" id="to" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM users where id!=$sid ORDER BY name ASC";
                $result=mysqli_query($link,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
            <option value="<?php echo $rows['id'];?>">
                    <?php echo $rows['name'] ;?> (Balance: 
                    <?php echo $rows['balance'] ;?> ) 
            </option>
            <?php 
                } 
            ?>
        </select>
        <br>
        <br>
            <label for="amount" style="color : black;"><b>Amount:</b></label>
            <input type="number" name="amount" id="amount" required>   
            <br><br>
            <button name="submit" type="submit" id="myBtn" ><b>Transfer</b></button>
        </form>
            </div>
    <footer>
        <p>Copyright 2022. Made by <b>Vemisetti.Anvith</b><sup>&copy;</sup><br>
        &nbsp;Vemisetti Anvith foundations
        </p>
    </footer>
</body>
</html>