<?php
require 'vendor/autoload.php';

use Github\Client;

// GitHub repository information
$username = 'architect-solutions';
$repositoryName = 'php_crud';

// Local version or commit hash
$localVersion = '1.2.0'; // Replace with your local version or commit hash

// Initialize the GitHub client
$client = new Client();

// Retrieve the latest release
$latestRelease = $client->api('repo')->releases()->latest($username, $repositoryName);

// Retrieve the latest commit
$latestCommit = $client->api('repo')->commits()->all($username, $repositoryName, ['sha' => 'main'])[0];

// Compare local version or commit hash with the latest release or commit
if ($localVersion !== $latestRelease['name']) {
    echo 'An update is available!' . "<br>";
    echo 'Latest Release: ' . $latestRelease['name'] . "<br>";
    echo 'Published Date: ' . $latestRelease['published_at'] . "<br>";
} else {
    echo 'Up to date.' . "<br>";
}

if ($localVersion !== $latestCommit['sha']) {
    echo 'An update is available!' . "<br>";
    echo 'Latest Commit: ' . $latestCommit['sha'] . "<br>";
    echo 'Commit Message: ' . $latestCommit['commit']['message'] . "<br>";
} else {
    echo 'Up to date.' . "<br>";
}
?>
