<?php
    $time = date('H');
    if ($time >= 6 && $time < 12) {
        $bg = "morning.jpg";
        $greeting = "GOOD MORNING!";
        $textColor = "#ff4500";
    } elseif ($time >= 12 && $time < 18) {
        $bg = "afternoon.gif";
        $greeting = "GOOD AFTERNOON!";
        $textColor = "#ffff00";
    } elseif ($time >= 18 && $time < 21) {
        $bg = "evening.jpg";
        $greeting = "GOOD EVENING!";
        $textColor = "#ffffff";
    } else {
        $bg = "night.gif";
        $greeting = "GOOD NIGHT!";
        $textColor = "#ffffff";
    }
 
    if(isset($_POST['image'])) {
        setcookie('fav_image', $_POST['image'], time() + 86400, "/");
    }
    $cookie_img = isset($_COOKIE['fav_img']) ? $_COOKIE['fav_img'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 8 Solutions</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        #greeting {
            width: 100%;
            height: 30vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('<?php echo $bg; ?>');
            background-size: cover;
            color: <?php echo $textColor; ?>;
            font-size: 40px;
        }
        .multiplication {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 30px auto;
            width: 80%;
            max-width: 600px;
        }
        #table {
            margin-top: 20px;
            text-align: center;
            padding: 12px;
            text-align: center;
            width: 100%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        table tr:first-child td, table td:first-child{
            background-color: #f2f2f2; 
            font-weight: bold;
            color: red; 
        }
        #fav {
            width: 100%;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            padding: 30px 0;
        }
        #fav form {
            display: flex;
            justify-content: center;
            gap: 15px;
            align-items: center;
            flex-wrap: wrap;
        }
        #fav img {
            width: 100px;
            height: 100px;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }
        .large-text {
            font-size: 1.5rem;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div id='greeting'>
        <?php echo $greeting; ?>
    </div>

    <div class="multiplication">
        <h2>Generate Multiplication Table</h2>
        <form method="post"> 
            <label for='row'>Rows: </label>
            <input type='number' id='row' name='row' min='3' max='12' required>
            <label for='column'>Columns: </label>
            <input type='number' id='column' name='column' min='3' max='12' required>
            <button type='submit'>Generate Table</button>
        </form>

        <div id='table'>
            <?php
            $nrows = $_POST['row'];
            $ncolumns = $_POST['column'];

            echo "<table>";
            for ($i = 1; $i <= $nrows; $i++) {
                echo "<tr>";
                for ($j = 1; $j <= $ncolumns; $j++) {
                    echo "<td>" . ($i * $j) . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>
    </div>

    <div id='fav'>
        <h2>Select Your Favorite Image</h2>
        <form method="post"> 
            <label>
                <input type="radio" name="image" value="corni.gif" required>
                <img src="corni.gif" alt="Cornicopia">
                Cornicopia
            </label>
            <label>
                <input type="radio" name="image" value="mail.gif" required>
                <img src="mail.gif" alt="Mailbox Turkey">
                Mailbox Turkey
            </label>
            <label>
                <input type="radio" name="image" value="pumpkinpie.gif" required>
                <img src="pumpkinpie.gif" alt="Pumpkin Pie">
                Pumpkin Pie
            </label>
            <label>
                <input type="radio" name="image" value="minnie-mickey.gif" required>
                <img src="minnie-mickey.gif" alt="Minnie & Mickey">
                Minnie & Mickey
            </label>
            <label>
                <input type="radio" name="image" value="sign.gif" required>
                <img src="sign.gif" alt="Thanksgiving Sign">
                Thanksgiving Sign
            </label>
            <button type="submit">Set Favorite Image</button>
        </form>

        <?php
        echo "<br>";
        if (isset($_POST['image'])) {
            echo "<div class='large-text'>Current Image: " . $_POST['image'] . "</div><br>";
        }
        ?>
        


</body>
</html>

