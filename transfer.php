<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
    <style>
        body{
            background-color : rgb(194, 194, 194);
        }
        header{
            width: 100%;
            height:100%;
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

        div img{
            height: 320px;
            width: 450px;
            position: relative;
            left : 33%;
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
        section{
            background-color : rgb(177, 176, 176);
        }
        footer{
            background-color : rgb(194, 194, 194);
            align-items : center;
            text-align : center; 
        }
        table{
            margin : auto;
            width : 60%;
            border-collapse : collapse;
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
        button{
            border-radius : 3px;
            transition: 1.5s;
            text-align : center;
            padding : 8px;
        }
        button:hover{
            background-color:#616C6F;
            color: white;
        }
    </style>
</head>
<body>
    <nav>
        <ul id="menu">
            <li class="ui-state-disabled"><a href="index.html">Home</a></li>
            <li class="ui-state-disabled"><a href="users.php">Display Users</a></li>
            <li class="ui-state-disabled"><a href="selectuser.php">Search user</a></li>
            <li class="ui-state-disabled"><a href="createuser.html">Create user</a></li>
            <li class="ui-state-disabled"><a href="transaction_history.php">Transaction History</a></li>
        </ul>
        <h2><a href="index.html">USER BANK</a></h2>
    </nav>
    <header>
        <h1>Select User to Transfer From</h1>
    <?php
    require_once "config.php";

    $sql = "SELECT * FROM `users`";
    $result = mysqli_query($link, $sql);
    error_reporting(E_ERROR | E_PARSE);
    ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Balance</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        while($rows=mysqli_fetch_assoc($result)){
        ?>
        <tr style="color : black;">
        <td class="py-2"><?php echo $rows['id'] ?></td>
        <td class="py-2"><?php echo $rows['name']?></td>
        <td class="py-2"><?php echo $rows['email']?></td>
        <td class="py-2"><?php echo $rows['balance']?></td>
        <td><a href="selecteduserdetail.php?id= <?php echo $rows['id'] ;?>"><button type="button" class="btn" style="background-color : #A569BD;">Transact</button></a></td> 
        </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
    </header>
    
    <footer>
        <p>Copyright 2022. Made by <b>Vemisetti.Anvith</b><sup>&copy;</sup><br>
        &nbsp;Vemisetti Anvith foundations
        </p>
    </footer>
</body>
</html>