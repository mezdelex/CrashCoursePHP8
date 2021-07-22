<?php

declare(strict_types=1);

namespace clases;

class Moneda {
    public function __construct(private string $tipo, private int  $valor) { // definimos las propiedades con el "constructor property promotion"
        $this->tipo = $tipo; // Esto es redundante ya que con el property promotion, la clase ya asigna el valor del argumento que le pasemos a la propiedad.
        $this->valor = $valor; // Esto es redundante ya que con el property promotion, la clase ya asigna el valor del argumento que le pasemos a la propiedad.
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getValor() {
        return $this->valor;
    }
}
