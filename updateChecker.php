<!-- Update Checker file -->
<?php
require 'vendor/autoload.php';

use Github\Client;

// GitHub repository information
$username = 'architect-solutions';
$repositoryName = 'php_crud';














// Get the local release tag
// $localVersion = trim(shell_exec('git describe --abbrev=0 --tags'));
$localVersion = 'v1.2.0';

// Retrieve the latest release
$latestRelease = $client->api('repo')->releases()->latest($username, $repositoryName);


// Compare local version with the latest release
if ($localVersion !== $latestRelease['name']) {
    $updateAvailable = true;
} else {
    $updateAvailable = false;
}
?>