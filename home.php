<?php

// -----------------------------------------------------------------------------
// Step 1: Start the session
// This must be the very first thing in your PHP file, before any HTML output.
// It starts a new session or resumes an existing one.
session_start();

// -----------------------------------------------------------------------------
// Step 2: Set session variables
// You can create or modify session variables by adding key-value pairs
// to the $_SESSION superglobal array.
// The array works just like any other associative array in PHP.
$_SESSION['name'] = 'Neel Shaheb';
$_SESSION['user_id'] = 123;
$_SESSION['is_logged_in'] = true;

// You can also check if a session variable is already set.
if (!isset($_SESSION['view_count'])) {
    $_SESSION['view_count'] = 1;
} else {
    $_SESSION['view_count']++;
}

// -----------------------------------------------------------------------------
// Step 3: Access and use session variables
// You can now access these variables on this page or any other page
// where you've called session_start() at the top.
echo "Hello, " . $_SESSION['name'] . "!<br>";
echo "Your user ID is: " . $_SESSION['user_id'] . "<br>";
echo "You have viewed this page " . $_SESSION['view_count'] . " times.<br>";

// -----------------------------------------------------------------------------
// Step 4: Unset individual session variables
// Use unset() to remove a specific variable from the session.
// This is different from destroying the whole session.
// For example, if you wanted to log a user out but keep some of their preferences:
unset($_SESSION['is_logged_in']);
echo "Is logged in: " . (isset($_SESSION['is_logged_in']) ? 'Yes' : 'No') . "<br>";

// -----------------------------------------------------------------------------
// Step 5: Destroy the entire session
// When you want to completely end the user's session (e.g., on a logout page).
// This removes all data and the session cookie.
session_destroy();
echo "Session has been destroyed.<br>";

// Now, if you try to access the name variable, it will no longer exist.
echo "After destroying, name is: " . (isset($_SESSION['name']) ? $_SESSION['name'] : 'Not found');

?>
