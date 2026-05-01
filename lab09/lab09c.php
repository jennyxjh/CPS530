<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lab9style.css">
</head>

<body>
    <h2> Problem 3 </h2>

    <div>
        <?php include ('dbConnection.php'); ?>

        <?php
        $sql = "SELECT * FROM photos WHERE location ='Ontario'";
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<div>
                        <img src='images/" . $row["pic_url"] . "' alt='Photo of " . $row["subject"] . "'>
                        <p>" . $row["subject"] . ", " . $row["location"] . "</p>
                    </div>";
            }
        }
        else {
            echo "No Pictures were taken in Ontario.";
        }
        mysqli_close($connect); 
        ?> 

    </div>
</body>
</html>
