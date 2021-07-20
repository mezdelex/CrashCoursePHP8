<?php

declare(strict_types=1);

namespace traits;

trait Trait2 { // Un trait no puede ser instanciado, sólo usado por otra clase u otro trait.
    protected string $nombre;

    public function mostrarNombre() {
        echo $this->nombre . " desde Trait2";
    }
}
