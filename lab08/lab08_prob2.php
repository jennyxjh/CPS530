<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get input values
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 0;
    $columns = isset($_POST['columns']) ? intval($_POST['columns']) : 0;

    // Validate input
    if ($rows < 2 || $rows > 13 || $columns < 2 || $columns > 13) {
        echo "<div class='error'>Please enter numbers between 3 and 12 for both rows and columns.</div>";
        exit;
    }

    // Generate the multiplication table
    echo "<table>";
    echo "<tr><th></th>"; // Empty top-left cell
    for ($col = 1; $col <= $columns; $col++) {
        echo "<th>$col</th>";
    }
    echo "</tr>";

    for ($row = 1; $row <= $rows; $row++) {
        echo "<tr>";
        echo "<th>$row</th>"; // First column header
        for ($col = 1; $col <= $columns; $col++) {
            echo "<td>" . ($row * $col) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>

