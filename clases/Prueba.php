<?php

declare(strict_types=1);

namespace clases; /* el 'namespace' es la ruta virtual al documento. Por convención y estándar, se iguala a la ruta real, aunque podría no hacerse. 
Se definen después de los declare y antes del resto de elementos */

class Prueba {
    protected string $nombre;
    protected int $edad;

    /* 
    En PHP el constructor vacío no inicializa las variables al valor neutro por defecto; tenemos que hacerlo nosotros. Al utilizar 'strict_types=1' y haber
    especificado el tipo de dato de las propiedades, si las llamamos en el index.php sin haberlas inicializado primero, nos va a devolver error al estar 'unasigned'.
    Con lo cual, debemos definir siempre un constructor vacío por defecto con los valores que queramos si usamos 'strict_types=1'.
    */
    public function __construct() {
        $this->nombre = "Alex";
        $this->edad = 35;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    // public function setNombre(string $nombre): self|Prueba {
    //     $this->nombre = $nombre;
    //     return $this;
    // }

    public function getEdad(): int {
        return $this->edad;
    }

    public function setEdad(int $edad): void {
        $this->edad = $edad;
    }
}
