<?php
require_once __DIR__ . '/App/Controllers/ProductController.php';

$controller = new ProductController();
$productos = $controller->read();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
</head>
<body>
    <h1>Listado de Productos</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        <?php if (!empty($productos)): ?>
            <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?php echo htmlspecialchars($producto['id']); ?></td>
                <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                <td><?php echo htmlspecialchars($producto['descripcion']); ?></td>
                <td><?php echo htmlspecialchars($producto['precio']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo htmlspecialchars($producto['id']); ?>">Editar</a> | 
                    <a href="delete.php?id=<?php echo htmlspecialchars($producto['id']); ?>">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No hay productos disponibles.</td>
            </tr>
        <?php endif; ?>
    </table>
    <a href="create.php">Crear Nuevo Producto</a>
</body>
</html>
