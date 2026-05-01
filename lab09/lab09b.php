<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lab9style.css">
</head>

<body>
    <h2> Problem 2 </h2>

    <div>
        <?php include ('dbConnection.php'); ?>
        <?php 
        /* Make a query and display on a page all the information contained in the database 
        (picture number, subject, location, date, and picture URL). Sort the information in 
        descending order of the date taken (from newer to older). Use CSS to make the information 
        readable and attention grabbing. Name your file lab09b.php. */

        $sql = "SELECT * FROM photos";
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<div class='two'>
                        <p>" . $row["pic_num"] . ". " . $row["subject"] . ", " . $row["location"] . ", " . 
                        $row["date_taken"] . ", " . $row["pic_url"] . "<br></p>
                    </div>";
            }
        }
        else {
            echo "No Results.";
        }
        mysqli_close($connect);
        ?>
    </div>
</body>
</html>
