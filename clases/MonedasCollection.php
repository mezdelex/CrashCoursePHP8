<?php

declare(strict_types=1);

namespace clases;

class MonedasCollection implements \Iterator {
    public function __construct(private array $monedas) { // Constructor property promotion
        $this->monedas = $monedas; // Asignación redundante usando property promotion
    }

    // Implementamos todos los métodos de \Iterator
    public function current() {
        return current($this->monedas);
    }

    public function next() {
        next($this->monedas);
    }

    public function key() {
        return key($this->monedas);
    }

    public function valid() {
        return current($this->monedas); // Castea el retorno a boolean
    }

    public function rewind() {
        reset($this->monedas);
    }
}
