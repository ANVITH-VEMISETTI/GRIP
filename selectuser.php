<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Details</title>
    <style>
        body {
            background-color: rgb(194, 194, 194);
        }

        header {
            width: 100%;
            height: 500px;
            background-color: rgb(194, 194, 194);
        }

        h1 {
            color: purple;
            text-align: center;
        }

        h2 {
            display: inline;
            position: absolute;
            top: 0;
            right: 20px;
        }

        h2 a {
            color: rgb(238, 71, 71);
            text-decoration: none;
            font-weight: bold;
        }

        h2 a:hover {
            background-color: grey;
            font-weight: bold;
            color: black;
        }

        div img {
            height: 320px;
            width: 450px;
            position: relative;
            left: 33%;
        }

        nav {
            color: rgb(238, 71, 71);
            background-color: white;
        }

        nav ul {
            list-style-type: none;
            text-decoration-color: rgb(238, 71, 71);
            padding: 0;
            margin: 0;
            overflow: hidden;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: rgb(238, 71, 71);
            font-weight: bolder;
            text-align: center;
            padding: 20px;
            text-decoration: none;
        }

        li a:hover {
            background-color: grey;
            font-weight: bold;
            color: black;

        }

        section {
            background-color: rgb(177, 176, 176);
        }

        footer {
            background-color: rgb(194, 194, 194);
            align-items: center;
            text-align: center;
        }

        table {
            margin: auto;
            width: 60%;
            border-collapse: collapse;
        }

        table,
        td,
        th {
            border: 3px solid white;
            padding: 5px;
            text-align: center;
        }

        
        select {
            text-align: center;
            border: whitesmoke;
            margin: auto;
            padding : 10px;
            border-radius: 5px;
            width :  40%;
        }

        #d2 {
            margin: auto;
            background-color: rgb(230, 224, 224, 0.4);
            background-blend-mode: screen;
            align-items: center;
            text-align: center;
            padding: 20px;
            height: auto;
            width: 500px;
            border-radius: 10px;
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

        #details{
            margin : auto;
            text-align: center;
        }

        input[type=submit]:hover {
            background-color: rgb(54, 53, 53);
        }


        :-ms-input-placeholder{
            text-align: center;
            font-family: 'Calibri';
            font-weight: 100;
        }
    </style>
</head>

<body>
    <nav>
        <ul id="menu">
            <li class="ui-state-disabled"><a href="index.html">Home</a></li>
            <li class="ui-state-disabled"><a href="users.php">Display Users</a></li>
            <li class="ui-state-disabled"><a href="createuser.html">Create user</a></li>
            <li class="ui-state-disabled"><a href="users.php">Display Users</a></li>
            <li class="ui-state-disabled"><a href="transfer.php">Transfer Money</a></li>
            <li class="ui-state-disabled"><a href="transaction_history.php">Transaction History</a></li>
        </ul>
        <h2><a href="index.html">USER BANK</a></h2>
    </nav>
    <header>
        <h1>Select Name of Customer To Search Deatils</h1>

        <div id="d2">
            <form action="">

                <label for="customers">Select Name of Customer : </label>
                <!-- <input type="search" name="q" id="customers" oninput="showCustomer()" placeholder="ENTER NAME OF USER TO BE SEARCHED" size="50"> -->
                <select name="q" id="customers" onchange="showCustomer()" required>
                    <option value="" disabled selected>Choose</option>
                    <?php
                        include 'config.php';
                        $sid=$_GET['id'];
                        $sql = "SELECT * FROM users ORDER BY name ASC";
                        $result=mysqli_query($link,$sql);
                        if(!$result)
                        {
                            echo "Error ".$sql."<br>".mysqli_error($conn);
                        }
                        while($rows = mysqli_fetch_assoc($result)) {
                    ?>
                    <option value="<?php echo $rows['id'];?>">
                            <?php echo $rows['name'] ;?>
                    </option><br>
                    <?php 
                        } 
                    ?>
                </select>
                <br>
                <input type="submit" value="search">
            </form>
        </div>
        <br>
        <div id="details"><b>Customer info will be listed here...</b></div>

        <script>
            function showCustomer() {
                var select = document.getElementById('customers');
				var option = select.options[select.selectedIndex];
                var str = option.text;

                var xhttp;
                if (str == "") {
                    document.getElementById("details").innerHTML = "";
                    return;
                }
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("details").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "filter.php?q=" + str, true);
                xhttp.send();
            }
        </script>
    </header>
    <footer>
        <p>Copyright 2022. Made by <b>Vemisetti.Anvith</b><sup>&copy;</sup><br>
            &nbsp;Vemisetti Anvith foundations
        </p>
    </footer>
</body>

</html>