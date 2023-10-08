<!--
 E-Commerce 
 Assignment01 Part03
 Maximus Taube
 2095310 
-->

<!-- Simple page that allows users to load User or Property views via buttons changing the entity -->
<!DOCTYPE html>
<html>

<head>
    <title>Entity Choice</title>
</head>

<body>
    <form method="GET" action="">
        <button type="submit" name="entity" value="user">User</button>
        <button type="submit" name="entity" value="property">Property</button>
    </form>
</body>

</html>

<?php
require_once 'db_connect.php';

// Autoload controllers
spl_autoload_register(function ($class_name) {
    include 'Controllers/' . $class_name . '.php';
});

// Set the default entity to user
$entity = isset($_GET['entity']) ? $_GET['entity'] : 'user';

// Check if the entity set and equal to property or user
if (isset($_GET['entity']) && ($_GET['entity'] === 'property' || $_GET['entity'] === 'user')) {
    $entity = $_GET['entity'];
}

// Set the default action to list
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

// Generate the controller class name
$controller_class = ucfirst($entity) . 'Controller';

// Verify the existence of the controller class and execute the method if it is present
if (class_exists($controller_class)) {
    $controller = new $controller_class();

    if (method_exists($controller, $action)) {
        $controller->$action();
    } else {
        echo "Invalid action.";
    }
} else {
    echo "Invalid entity.";
}
?>