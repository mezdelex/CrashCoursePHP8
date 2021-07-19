<?php

declare(strict_types=1);

namespace clases; /* el 'namespace' es la ruta virtual al documento. Por convención y estándar, se iguala a la ruta real, aunque podría no hacerse. 
Se definen después de los declare y antes del resto de elementos */

final class Prueba3 extends Prueba { // El modificador 'final' indica que la clase no puede ser extendida.

    public function __construct() {
        parent::__construct(); // 'parent' es el 'super()' de PHP. Llamamos al constructor del padre ya que al especificar en el hijo un constructor para modificar el valor nombre, el intérprete devolvería error al no encontrar 'edad' inicializada, ya que si existe un constructor en el hijo no se llama al del padre por defecto.

        $this->nombre = "Paco"; // Como nombre tiene el modificador "protected" puedo acceder a él desde el hijo.
    }

    final public function getNombre(): string { // El modificador 'final' indica que el método no puede ser sobreescrito.
        return $this->nombre . ". Este getter ha sido machacado en el hijo.";
    }
}
