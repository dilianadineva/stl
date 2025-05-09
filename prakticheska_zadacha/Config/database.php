<?php
$mysqli = new mysqli("localhost", "root", "", "prakticheska_zadacha");

if ($mysqli->connect_error) {
    die("Няма връзка с базата данни: " . $mysqli->connect_error);
}

$result = $mysqli->query("SHOW TABLES LIKE 'articles'");

if ($result->num_rows === 0) {
    $sql = "CREATE TABLE articles (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        content TEXT NOT NULL,
        image VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if ($mysqli->query($sql) === TRUE) {
        echo "Таблицата 'articles' е създадена успешно.";
    } else {
        echo "Възникна грешка: " . $mysqli->error;
    }
}

// $mysqli->close();