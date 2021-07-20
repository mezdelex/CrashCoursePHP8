<?php

declare(strict_types=1);

namespace traits;

trait Trait3 { // Un trait no puede ser instanciado, sólo usado por otra clase u otro trait.
    protected string $nombre;

    public function mostrarNombre() {
        echo $this->nombre . " desde Trait3";
    }
}
