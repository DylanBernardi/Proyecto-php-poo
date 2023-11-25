<h1>Gestion de productos</h1>

<a href="<?= base_url ?>producto/crear" class="button button-small">
    Añadir Producto
</a>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto']=='complete'):?>
    <strong class="alert_green">El producto se ha creado correctamente</strong>
    <?php elseif(isset($_SESSION['producto']) && $_SESSION['producto']!='complete'):?>
        <strong class="alert_red">El producto NO se ha creado correctamente</strong>
        <?php endif;?>
<table>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acciones</th>
    </tr>
    <?php while ($pro = $productos->fetch_object()) : ?>
        <tr>
            <td> <?= $pro->id; ?></td>
            <td> <?= $pro->nombre; ?></td>
            <td> <?= $pro->precio; ?></td>
            <td> <?= $pro->stock; ?></td>
            <td>
            <a href="<?=base_url?>producto/editar?id=<?=$pro->id?>" class ="button button-gestion">Editar</a>
            <a href="<?=base_url?>producto/editar?id=<?=$pro->id?>" class ="button button-gestion button-red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>