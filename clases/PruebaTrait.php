<?php

declare(strict_types=1);

namespace clases;

require_once "./traits/Trait1.php"; // Importamos el documento del trait.
require_once "./traits/Trait2.php"; // Importamos el documento del trait.
require_once "./traits/Trait3.php"; // Importamos el documento del trait.

use traits\{Trait1, Trait2, Trait3}; // añadimos los namespaces de los traits.

class PruebaTrait {
    // Le decimos a la clase que use dichos traits, como si fuera una inyección. Se pueden inyectar tantos traits como queramos.
    use Trait1;
    use Trait2 { // Si se diera el caso de que varios traits usaran un método con el mismo nombre, podemos especificar qué método queremos que se ejecute con el operador 'insteadof'.
        Trait2::mostrarNombre insteadof Trait1, Trait3;
    }
    use Trait3 {
        Trait3::mostrarNombre as mostrarNombreTrait3; // También podemos asignar un alias a los métodos para diferenciarlos.
    }

    public function __construct() {
        $this->nombre = "Alex"; // Esta variable nombre la obtiene del Trait2 al ser el último llamado y protected ya que es como si la heredara. Aquí sí definimos un constructor ya que es la clase que instanciaremos.
    }
}
