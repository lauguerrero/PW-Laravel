<?php

function convertir_ruta($ruta)
{
    // Reemplaza la parte de la ruta que deseas cambiar
    $nueva_ruta = str_replace("./ImagenesArticulos", "img", $ruta);

    // Devuelve la nueva ruta
    return $nueva_ruta;
}
