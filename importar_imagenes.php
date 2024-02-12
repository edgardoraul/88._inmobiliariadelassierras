<?php
define('ABSPATH', dirname(__FILE__) . '/');

// Función para importar los enlaces a imágenes desde el archivo CSV o Excel
function importar_enlaces_imagenes($archivo) {
    // Incluir WordPress
    require_once(ABSPATH . 'wp-load.php');

    $filas_totales = 0;
    $entradas_modificadas = 0;

    if (($gestor = fopen($archivo, "r")) !== FALSE) {
        // Ignorar primera fila (títulos de las columnas)
        fgets($gestor);

        // Obtener la cantidad total de filas en el archivo
        $filas_totales = count(file($archivo)) - 1; // Restar 1 para excluir la fila de los títulos

        // Bucle a través de las filas del archivo CSV o Excel
        while (($linea = fgets($gestor)) !== FALSE) {
            // Dividir la línea por punto y coma para obtener los datos de la fila
            $datos = explode(';', $linea);
            $id_entrada = $datos[0]; // Obtener el ID de la entrada
            $nombre_campo = $datos[1]; // Obtener el nombre del campo (no se utilizará en esta implementación)
            $enlace_imagen = $datos[2]; // Obtener el enlace de la imagen

            // Verificar si la entrada existe
            if (get_post_status($id_entrada)) {
                // Construir el enlace de la imagen con Thickbox
                $enlace_con_thickbox = '<a href="' . esc_url($enlace_imagen) . '" class="thickbox" title="Imagen">';
                $enlace_con_thickbox .= '<img src="' . esc_url($enlace_imagen) . '" alt="Imagen" style="max-width: 100px; max-height: 100px;">';
                $enlace_con_thickbox .= '</a>';

                // Agregar el enlace de la imagen al metabox "galería" de la entrada
                if (update_post_meta($id_entrada, 'galeria', $enlace_con_thickbox)) {
                    // Incrementar la cantidad de entradas modificadas
                    $entradas_modificadas++;
                    // Mostrar el estado de la fila y el porcentaje de avance
                    $porcentaje_avance = round(($entradas_modificadas / $filas_totales) * 100, 2);
                    echo "Fila procesada: ID de la entrada: $id_entrada - Estado: Exitoso - Porcentaje de avance: $porcentaje_avance%<br>";
                } else {
                    // Mostrar el estado de la fila si hay un error
                    echo "Fila procesada: ID de la entrada: $id_entrada - Estado: Erróneo<br>";
                }
            } else {
                // Mostrar un mensaje si la entrada no existe
                echo "Fila procesada: ID de la entrada: $id_entrada - Estado: Erróneo (Entrada no encontrada)<br>";
            }
            // Forzar el buffer de salida para que se muestren los mensajes
            ob_flush();
            flush();
        }
        fclose($gestor);
    }

    // Mostrar resumen de la importación
    echo "<br>--- Resumen de la importación ---<br>";
    echo "Cantidad total de filas en el archivo: $filas_totales<br>";
    echo "Cantidad de entradas a modificar: $filas_totales<br>";
    echo "Cantidad de entradas modificadas/actualizadas: $entradas_modificadas<br>";
}

// Verificar si se ha enviado el formulario de importación
if (isset($_FILES['archivo'])) {
    // Ruta donde se almacenará el archivo temporalmente
    $ruta_temporal = $_FILES['archivo']['tmp_name'];
    // Llamar a la función para importar los enlaces a imágenes
    importar_enlaces_imagenes($ruta_temporal);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importar CSV o Excel</title>
</head>
<body>
    <h2>Importar CSV o Excel</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="archivo" accept=".csv,.xlsx,.xls">
        <input type="submit" value="Importar">
    </form>
</body>
</html>
