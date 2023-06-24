<!-- Header -->
<?php include "header.php" ?>
<!-- Update Checker file -->
<?php include "updateChecker.php" ?>

<!-- body -->
<div class="container mt-5">
    <!-- Container to check if you are running the most recent update -->
    <div class="container">
        <?php if ($updateAvailable) { ?>
            <div class="alert alert-info">
                <strong>An update is available!</strong><br>
                Latest Release: <?php echo $latestRelease['name']; ?>
                <br><br>
                <form action="update.php" method="post">
                    <button type="submit" class="btn btn-primary">Update Now</button>
                </form>
            </div>
        <?php } else { ?>
            <div class="alert alert-secondary">
                <strong>Your System is upto date!</strong>
            </div>
        <?php } ?>


        <?php
            // Check if there is a success message in the URL query parameters
            if (isset($_GET['message']) && $_GET['message'] === 'Update successful') {
                echo '<div class="alert alert-success">Updated successfully!</div>';
            }
        ?>
    </div>
    <!-- End of Container checking for updates -->














    <h1 class="text-center">A Simple PHP CRUD Application!</h1>
        <p class="text-center">
            The project uses PHP and MySQL to create a CRUD (Create, Read, Update, Delete) Application.
        </p>
  <div class="container">
    <form action="includes/home.php" method="post">
        <div class="from-group text-center">
            <input type="submit" class="btn btn-primary mt-2" value="Welcome on board!">
        </div>
    </form>
  </div>
</div>



<div class="blockquote-footer fixed-bottom">
    <?php  
    // Output the local version
    echo 'Current Version: ' . $localVersion;
    ?>
</div>

<!-- Footer -->
<?php include "footer.php" ?>