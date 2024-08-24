<?php
require_once __DIR__ . '/App/Controllers/ProductController.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id === null) {
    echo "ID de producto no proporcionado.";
    exit();
}

$controller = new ProductController();
$controller->delete($id);

header("Location: index.php");
exit();
?>
