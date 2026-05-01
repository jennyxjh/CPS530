<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lab9style.css">
</head>

<body>  
    <div> 
        <h2> Problem 1 </h2>
        
        <?php include ('dbConnection.php'); ?>
        <?php 
        /* 
        Write a PHP program that populates the table in the database. 
        Have at least 10 records of pictures in the table. You can use 
        a form or enter the information directly by programming. Name 
        your file lab09a.php.
        */

        $dropPhotos = "DROP TABLE photos;";

        if (mysqli_query($connect, $dropPhotos)) {
            echo "Table removed<br>";
        }

        $createPhotos = "CREATE TABLE photos (
            pic_num INT(5) NOT NULL, 
            subject VARCHAR(100) NOT NULL,
            location VARCHAR(100) NOT NULL,
            date_taken INT(4) NOT NULL,
            pic_url VARCHAR(250) NOT NULL
            );";
            $createdT = mysqli_query($connect, $createPhotos);
    
            $insertPhotos = "INSERT INTO photos (pic_num, subject, location, date_taken, pic_url)
                VALUES ('1', 'Machu Pichu', 'Peru', '2021', 'machupichu.jpeg'),
                    ('2', 'Great Wall of China', 'Beijing', '2024', 'greatwall.jpeg'),
                    ('3', 'Pyramids', 'Giza', '2020', 'pyramids.jpeg'),
                    ('4', 'Colosseum', 'Rome', '2023', 'colosseum.jpeg'),
                    ('5', 'Christ The Redeemer', 'Rio de Janeiro', '2011', 'christtheredeemer.jpg'),
                    ('6', 'Taj Mahal', 'Agra', '2024', 'tajmahal.jpeg'),
                    ('7', 'Great Barrier Reefs', 'Australia', '2024', 'reef.jpg'),
                    ('8', 'Mount Everest', 'Nepal', '2018', 'mounteverst.jpg'),
                    ('9', 'The Grand Canyon', 'Arizona', '2022', 'grandcanyon.jpeg'),
                    ('10', 'The CN Tower', 'Ontario', '2019', 'cntower.jpeg')";
    
            if (mysqli_multi_query($connect, $insertPhotos)) {
                echo "Records created successfully";
            }
            else {
                echo "Error ", mysqli_error($connect) . "<br>";
            }
            mysqli_close($connect);
       
        ?>
    </div>

</body>
</html>
