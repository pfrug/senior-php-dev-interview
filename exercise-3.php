<?php
/**
 * Exercise 3: Ensure Database Integrity and Consistency.
 *
 * In this exercise, your task as a developer is to analyze the provided PHP code snippet
 * that performs two operations on a MySQL database. The current implementation has a potential
 * issue that could lead to inconsistent data in the database.
 *
 * The code currently:
 * 1. Inserts a new user into the 'users' table.
 * 2. Inserts an address for the user into the 'addresses' table.
 *
 * The problem with the current implementation is that if there's an error during the insertion
 * of the address, the user record will still be created without a corresponding address.
 * This could lead to inconsistent data in the database.
 *
 * Question: How would you modify this code to ensure the integrity and consistency of the database
 * while performing these two operations?
 *
 * Guidelines for the exercise:
 * - Analyze the code and identify the issue that could lead to inconsistent data.
 * - Propose a solution that ensures the successful completion of both operations or
 *   the rollback of both in case of an error.
 * - Keep in mind that the goal is to maintain the integrity and consistency of the database.
 */

// Database connection
$mysqli = new mysqli("localhost", "username", "password", "database");

// Insert a new user
$insertUserQuery = "INSERT INTO users (username, email) VALUES ('JohnDoe', 'john.doe@example.com')";
$result = $mysqli->query($insertUserQuery);
if (!$result) {
    die("Error inserting user: " . $mysqli->error);
}
$userId = $mysqli->insert_id;

// Insert the user's address
$insertAddressQuery = "INSERT INTO addresses (user_id, street, city, country) VALUES ($userId, '123 Main St', 'New York', 'USA')";
$result = $mysqli->query($insertAddressQuery);
if (!$result) {
    die("Error inserting address: " . $mysqli->error);
}

echo "User and address inserted successfully!";
$mysqli->close();
