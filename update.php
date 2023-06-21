<?php
require 'vendor/autoload.php';

use Github\Client;

// GitHub repository information
$username = 'architect-solutions';
$repositoryName = 'php_crud';

// Get the local release tag
$localVersion = trim(shell_exec('git describe --abbrev=0 --tags'));


// Initialize the GitHub client
$client = new Client();

// Set up authentication using personal access token
$accessToken = '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';
$client->authenticate($accessToken, null, Client::AUTH_ACCESS_TOKEN);

// Retrieve the latest release
$latestRelease = $client->api('repo')->releases()->latest($username, $repositoryName);

// Retrieve the latest commit
$latestCommit = $client->api('repo')->commits()->all($username, $repositoryName, ['sha' => 'main'])[0];

// Compare local version or commit hash with the latest release or commit
if ($localVersion !== $latestRelease['name']) {
    // echo 'An update is available!' . "<br>";
    // echo 'Latest Release: ' . $latestRelease['name'] . "<br>";
    // echo 'Published Date: ' . $latestRelease['published_at'] . "<br>";

    echo'<div class="alert alert-info ">';
    echo'<strong><a href="">Update</strong></a> AVailable!';
    echo'<br>';
    echo'Current version: ' . $localVersion;
    echo'<br>';
    echo'Latest Release: ' . $latestRelease['name'];
    echo'</div>';

    // $releaseUrl = $latestRelease['zipball_url'];
$releaseUrl = "https://github.com/architect-solutions/php_crud/zipball/refs/tags/v1.2.3";

// echo $releaseUrl . '<br>';
//     $localPath = __DIR__;
// echo $localPath;

// Define the file name for the downloaded ZIP archive
$fileName = 'latest_release.zip';

// Download the ZIP archive to the current directory
file_put_contents($fileName, fopen($releaseUrl, 'r'));

echo "ZIP archive downloaded to: " . $fileName . PHP_EOL;
    






// Specify the path to the ZIP file
$zipFile = 'latest_release.zip';

// Specify the path where you want to extract the contents
$extractPath = __DIR__;

// Create a new ZipArchive instance
$zip = new ZipArchive();

// Open the ZIP file
if ($zip->open($zipFile) === true) {
    // Extract the contents to the specified path
    $zip->extractTo($extractPath, ZIPARCHIVE::OVERWRITE);

    // Close the ZIP file
    $zip->close();

    // Delete the ZIP file
    unlink($zipFile);

    echo 'Updated Successfully.';
} else {
    echo 'Failed to extract the ZIP file.';
}




} else {
    // echo'<div class="alert alert-success ">';
    // echo'<strong>You are using the latest version of this app!</strong>';
    // echo'</div>';
}

// if ($localVersion !== $latestCommit['sha']) {
//     echo 'An update is available!' . "<br>";
//     echo 'Latest Commit: ' . $latestCommit['sha'] . "<br>";
//     echo 'Commit Message: ' . $latestCommit['commit']['message'] . "<br>";
// } else {
//     echo 'Up to date.' . "<br>";
// }
?>
