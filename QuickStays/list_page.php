<?php
require_once 'db_connect.php';

// Autoload controllers
spl_autoload_register(function ($class_name) {
    include 'Controllers/' . $class_name . '.php';
});

// Ensure the entity is selected
if (isset($_GET['entity'])) {
    $entity = $_GET['entity'];

    if ($entity === 'user' || $entity === 'property') {
        // Set the action based on the URL parameter
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
    } else {
        echo "Invalid entity.";
    }
} else {
    echo "Entity not selected.";
}
?>