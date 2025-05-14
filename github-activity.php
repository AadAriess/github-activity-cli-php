<?php

// Define the GitHub API URL template
define('GITHUB_API_URL', 'https://api.github.com/users/%s/events');

// Check if a username was provided
if ($argc < 2) {
    echo "Usage: php github-activity.php <username>\n";
    exit(1);
}

// Get the username from the command line argument
$username = $argv[1];

// Fetch the user's recent activity from GitHub API
$url = sprintf(GITHUB_API_URL, $username);
$context = stream_context_create([
    'http' => [
        'user_agent' => 'PHP GitHub Activity CLI'
    ]
]);

// Fetch the data
$json_data = file_get_contents($url, false, $context);

// If the data couldn't be fetched, print an error
if ($json_data === false) {
    echo "Error: Failed to fetch activity data for user '$username'.\n";
    exit(1);
}

// Decode the JSON response
$activity_data = json_decode($json_data, true);

// Check if the data is empty or invalid
if (empty($activity_data)) {
    echo "Error: No activity found for user '$username'.\n";
    exit(1);
}

// Display the fetched activity
echo "Recent activity for $username:\n";
foreach ($activity_data as $event) {
    $event_type = $event['type']; // Event type (e.g., PushEvent, IssuesEvent, etc.)
    $repo_name = $event['repo']['name']; // Repository name

    // Filter out specific event types you want to display
    if ($event_type == 'PushEvent') {
        $commit_count = count($event['payload']['commits']);
        echo "Pushed $commit_count commit(s) to $repo_name\n";
    } elseif ($event_type == 'IssuesEvent' && $event['payload']['action'] == 'opened') {
        echo "Opened a new issue in $repo_name\n";
    } elseif ($event_type == 'WatchEvent') {
        echo "Starred $repo_name\n";
    }
}
