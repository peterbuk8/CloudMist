<?php
    require_once '../backend/company_verify.php';
    
    //check if content posted
    if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['release_date'])
            && isset($_POST['genre']) && isset($_POST['game_data']) && isset($_POST['patch_version'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $r_date = $_POST['release_date'];
        $genre = $_POST['genre'];
        $game_data = $_POST['game_data'];
        $patch_version = $_POST['patch_version'];
        $c_name = $_SESSION['c_name'];
        
        //convert release date
        $temp_date = explode("/", $r_date);
        $release_date = $temp_date[2] . "-" . $temp_date[0] . "-" . $temp_date[1];
        
    
        //check for non-empty content
        if (!empty($name) && !empty($price) && !empty($description) && !empty($release_date) && !empty($genre)
                && !empty($game_data) && !empty($patch_version) && !empty($c_name)){
            $g_insert_query = "INSERT INTO game (name, price, description, release_date, genre, game_data,"
                    . "c_name, patch_version)"
                    . "VALUES ('$name', '$price', '$description', '$release_date', '$genre', '$game_data', '$c_name', '$patch_version')";
            $result = mysqli_query($conn, $g_insert_query);
    
                if ($result) {
                    $msg = "Game has been submitted";
                }
                else {
                    $msg= "Error: Could not submit game";
                }
        }
        else {
            $msg = "Error: Please fill in all fields";
        }
    }
    else {
    }
    
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../css/companystyle.css">
<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<head>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#datepicker" ).datepicker();
        });
    </script>
</head>

<body>
    <div id="sidebar">
        <div class="logo_title">Cloud Mist</div>
        <ul id="sideButton">
            <a href="company_add.php"><li>ADD GAME</li></a>
            <a href="company_patch.php"><li>PATCH GAME</li></a>
            <a href="company_sales.php"><li>SALES</li></a>
            <a href="company_login.php"><li id="logoff">LOGOFF</li></a>
        </ul>
    </div>
    
    <div class="container">
            <header>
                <h1>Welcome <?php printf($_SESSION['c_name']) ?></h1>
            </header>
            <div id="content">
                
                <form method="post" action="company_add.php">
                    <table class="form-field">
                        <col width="500">
                        <col width="500">
                        <col width="500">
                        <col width="500">
                        <tr> 
                            <td> Game Name </td>
                            <td> <input type="text" class="form-field" name="name"> </td>
                        </tr>
                        <tr>
                            <td style="min-width: 90px"> Price($) </td>
                            <td style="min-width: 90px"><input type="number" class="form-field" name="price" step=0.01 value=0.00></td>
                            <td style="min-width: 50px"> Release Date </td>
                            <td style="min-width: 90px"> <input type="text" id="datepicker" name="release_date" class="form-field"></td>
                        </tr>
                        <tr>
                            <td> Description </td>
                            <td colspan = 4>  <textarea class="form-field" name="description" rows="9" cols="75" placeholder="Please enter a brief description"></textarea></td>
                        </tr>
                        <tr>
                            <td> Genre </td>
                            <td> 
                                <select class="form-field" name="genre">
                                    <option value=""> choose genre.. </option>
                                    <option value="Action"> Action </option>
                                    <option value="RPG"> RPG </option>
                                    <option value="Shooter"> Shooter </option>
                                    <option value="Fighting"> Fighting </option>
                                    <option value="Platformer"> Platformer </option>
                                    <option value="Strategy"> Strategy </option>
                                    <option value="Puzzle"> Puzzle </option>
                                    <option value="Rhythm"> Rhythm </option>
                                </select>
                            </td>
                            <td> Version Number</td>
                            <td>
                                <input type="text" class="form-field" name="patch_version">
                            </td>
                        </tr>
                        <tr>
                            <td> Upload Game Data </td>
                            <td>
                                <input class="form-field" type="button" id="get_file" value="Select Game Data">
                                <input class="form-field" type="file" id="my_file" name="game_data">
                            </td>
                        </tr>
                        <tr>
                            <td> <input class="form-field" type="submit" value="  Submit  "> </td>
                        </tr>
                    </table>
                </form>
                
                        <p> <?php 
            if (isset($msg))
                printf($msg);
            ?>
        </p>
                
            </div>
            
	</div>
    
        <script>
	//Grab file
	document.getElementById('get_file').onclick = function() {
	document.getElementById('my_file').click();
	};
        </script>
    

</body>

</html>