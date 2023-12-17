

<?php
require_once 'db_connect.php';


spl_autoload_register(function ($class_name) {
    include 'Controllers/' . $class_name . '.php';
});


$entity = isset($_GET['entity']) ? $_GET['entity'] : 'user';

if ($entity === 'user' || $entity === 'property' || $entity === 'admin' || $entity === 'booking' || $entity === 'cart' || $entity === 'review' || $entity === 'login') {
    
    $action = isset($_GET['action']) ? $_GET['action'] : 'index';

    
    $controller_class = ucfirst($entity) . 'Controller';

    
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
?>