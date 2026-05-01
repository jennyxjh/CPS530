<!-- Problem 3: Display Favorite Image -->
<?php if ($imageName): ?>
        <div id="favorite-image">
            <img src="images/<?php echo $imageName; ?>" alt="Favorite" width="150">
            <p>Current image: <?php echo $imageName; ?></p>
        </div>
    <?php else: ?>
        <p>No favorite image selected yet.</p>
    <?php endif; ?>