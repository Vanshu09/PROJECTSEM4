<?php
# -- this is insert.php --

/**
 * The follwing Condition checks whether a client requested the insert.php through
 * the POST method with the u_name, u_age, and u_email
 * 
 * u_name, u_age, and u_email - You can also see these in the HTML Form (index.html) -
 * These are keys to access the actual data provided by a user.
 */
if (isset($_POST['u_name']) && isset($_POST['u_email']) && isset($_POST['u_subject']) && isset($_POST['u_message'])) :

    # Database Connection my_test_db is the Database name.
    $db_conn = mysqli_connect("localhost", "root", "", "form");

    # Assigning user data to variables for easy access later.
    $name = $_POST['u_name'];
    $email = $_POST['u_email'];
    $subject = $_POST['u_subject'];
    $message = $_POST['u_message'];

    # SQL query for Inserting the Form Data into the users table.
    $sql = "INSERT INTO `user` (`name`, `email`, `Subject`, `message`) VALUES ('$name', '$email', '$subject', '$message')";

    # Executing the Above SQL query.
    $query = mysqli_query($db_conn, $sql);

    # Checks that the query executed successfully
    if ($query) {
        echo 'New data inserted successfully. <a href="./Portfolio.html">Go Back</a>';
    } else {
        echo "Failed to insert new data.";
    }
    exit;
endif;

/**
 * This message occurs when a user tries to access Insert.php without -
 * the required method and credentials.
 */
echo '404 Page Not Found. <a href="./Portfolio.html">Go Home</a>';
