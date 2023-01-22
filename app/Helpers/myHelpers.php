<?php
function fechaActual(string $formato) {
    $fechaActual = new DateTime();
    return $fechaActual->format($formato);
}
