<h1>Hello, world!!!</h1>
<p>This is Docker example application in PHP <?php echo phpversion(); ?> on Apache.</p>
<?php
$dsn = 'mysql:host=db;dbname=sbmexample';
$username = 'sbmexample';
$password = 'sbmexample';

try {
    $pdo = new PDO($dsn, $username, $password);

    // Check if the 'quotes' table exists
    $stmt = $pdo->query("SHOW TABLES LIKE 'quotes'");
    if ($stmt->rowCount() === 0) {
        // Table does not exist, create it
        $createTableSQL = "
            CREATE TABLE quotes (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                quote TEXT NOT NULL,
                author VARCHAR(255) DEFAULT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ";
        $pdo->exec($createTableSQL);
        echo "Table 'quotes' created successfully.<br>";
    } else {
        echo "Table 'quotes' already exists.<br>";
    }

    // // Example data to insert
    // $quote = "Omnis mundi creatura quasi liber et pictura, nobis est in speculum.";
    // $author = "Bernard of Cluny";

    // // Prepare INSERT statement with placeholders
    // $stmt = $pdo->prepare("INSERT INTO quotes (quote, author) VALUES (:quote, :author)");

    // // Bind parameters and execute
    // $stmt->execute([
    //     ':quote' => $quote,
    //     ':author' => $author
    // ]);

    // echo "New quote added successfully.<br>";

    // Select all rows from quotes table
    $stmt = $pdo->query("SELECT * FROM quotes");

    $quotes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($quotes) > 0) {
        echo "<br><u><b>Quotes</b></u>:<br><br>";
        foreach ($quotes as $row) {
            echo "ID: " . htmlspecialchars($row['id']) . "<br>";
            echo "Quote: " . htmlspecialchars($row['quote']) . "<br>";
            echo "Author: " . htmlspecialchars($row['author']) . "<br>";
            echo "Created At: " . htmlspecialchars($row['created_at']) . "<hr>";
        }
    } else {
        echo "No quotes found.<br>";
    }

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage() . "<br>";
}
?>
