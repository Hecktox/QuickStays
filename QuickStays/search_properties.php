<?php
$host = 'localhost'; 
$dbname = 'quickstays_db'; 
$user = 'root'; 
$pass = ''; 

$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

// Check if the form has been submitted and get search criterias
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $city = $_POST['destination']; //refers to city
    $date = $_POST['date'];
    $guests = $_POST['guests']; 

    // Prepare the SQL query
    $sql = "SELECT * FROM properties WHERE City LIKE :city AND AvailabilityDate <= :date";
    $stmt = $pdo->prepare($sql);

    // Bind parameters and execute the query
    $stmt->execute([
        ':city' => '%' . $city . '%',
        ':date' => $date
    ]);

    // Fetch the results
    $properties = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Dispplay results    
    echo '<ul>';
    foreach ($properties as $property) {
        echo '<li>' . htmlspecialchars($property['PropertyName']) . ' - ' . htmlspecialchars($property['City']) . '</li>';
    }
    echo '</ul>';
}
?>
