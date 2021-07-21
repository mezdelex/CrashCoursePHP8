<?php

declare(strict_types=1);

namespace excepciones;

class MiExcepcion extends \Exception { // Todas las excepciones heredan de la clase base
    protected $message = "Esto es un mensaje de MiExcepción.";
}
