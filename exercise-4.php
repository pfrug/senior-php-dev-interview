<?php
/**
 * Exercise 4: Review and Improve Code Security.
 *
 * As developer, your task is to review the following PHP code snippet
 * that receives data from a registration form and saves it in a MySQL database.
 *
 * The code currently:
 * 1. Connects to the database.
 * 2. Retrieves form data from a POST request.
 * 3. Inserts the new user into the 'users' table.
 *
 * Please identify the potential shortcomings of this code and make the necessary
 * modifications to address them. Consider the following aspects:
 *
 * - Code security: Are there any risks or vulnerabilities in the code that could
 *   be exploited or lead to issues?
 * - Data integrity: Is the code ensuring that the data being saved to the database
 *   is valid and consistent?
 * - Error handling: Is the code handling errors effectively and providing
 *   meaningful feedback?
 *
 * We expect you to analyze the code and propose improvements without explicit guidance
 * on what needs to be changed.
 */

// Database connection
$mysqli = new mysqli("localhost", "username", "password", "database");

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get form data from POST request
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Insert the new user
$insertUserQuery = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
$result = $mysqli->query($insertUserQuery);
if (!$result) {
    die("Error inserting user: " . $mysqli->error);
}

echo "User registered successfully!";
$mysqli->close();
