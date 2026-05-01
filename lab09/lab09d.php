<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lab9style.css">    
</head>

<body>
    <h2> Problem 4 </h2>

    <div>
        <div class="form"> 
            <form method="post">
                <label for="location">Choose a location:</label>
                <select name="location" id="location">
                    <option value="Agra">Agra</option>
                    <option value="Arizona">Arizona</option>
                    <option value="Australia">Australia</option>
                    <option value="Bejing">Bejing</option>
                    <option value="Giza">Giza</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Ontario">Ontario</option>
                    <option value="Peru">Peru</option>
                    <option value="Rio de Janeiro">Rio de Janeiro</option>
                    <option value="Rome">Rome</option>
                </select>

                <label for='year'>Year: </label>
                <input type='number' id='year' name='year' min='2010' max='2024' required>
                <input type="submit" class="submit">
            </form>
            <br>
        </div>  

        <?php include ('dbConnection.php'); ?>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $location = $_POST['location'];
            $year = $_POST['year'];

            $sql = "SELECT * FROM photos WHERE location='$location' AND date_taken='$year'";
            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div>";
                    echo '<img src="images/' . $row["pic_url"] . '" alt="Photo of ' . $row["subject"] . '">';
                    echo "</div>";
                    echo "<br>";
                    echo  $row["subject"] . ", " . $row["location"]; 
                }
            } else {
                echo "No results.";
            }
        }
        mysqli_close($connect);
        ?>
    </div>
</body>
</html>