<?php
require_once __DIR__ . '/App/Controllers/ProductController.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id === null) {
    echo "ID de producto no proporcionado.";
    exit();
}

$controller = new ProductController();
$product = $controller->readById($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    $controller->update($id, $nombre, $descripcion, $precio);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>
    <form action="edit.php?id=<?php echo htmlspecialchars($id); ?>" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($product['nombre']); ?>" required><br><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required><?php echo htmlspecialchars($product['descripcion']); ?></textarea><br><br>

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" value="<?php echo htmlspecialchars($product['precio']); ?>" required><br><br>

        <input type="submit" value="Actualizar Producto">
    </form>
</body>
</html>
