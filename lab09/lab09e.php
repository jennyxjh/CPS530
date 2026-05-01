<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lab9style.css">
</head>

<body>
    <h2> Problem 5 </h2>

    <div>
        <?php include ('dbConnection.php'); ?>
        
        <?php
        $rand_img = "SELECT * FROM photos ORDER BY RAND() LIMIT 1";
        $result_rand = mysqli_query($connect, $rand_img);  

        if ($result_rand) {
            $row_rand = mysqli_fetch_assoc($result_rand);
            echo '<div>';
            echo '<img src="images/' . $row_rand["pic_url"] . '" alt="Random Photo">';
            echo '<div>' . $row_rand["subject"] . ' - ' . $row_rand["location"] . ' (' . $row_rand["date_taken"] . ')</div>';
            echo '</div>';
        } else {
            echo '<p>No random image found.</p>';
        }

        // Query to count the total number of images
        $count = "SELECT COUNT(*) AS total_images FROM photos";
        $total = mysqli_query($connect, $count);

        if ($total) {
            $row_count = mysqli_fetch_assoc($total);
            $total_images = $row_count['total_images'];
            echo '<div>';
            echo 'Total number of images in the database: ' . $total_images;
            echo '</div>';
        } else {
            echo '<p>Error counting images in the database.</p>';
        }

        mysqli_close($connect);
?>

    </div> 
</body>
</html>
