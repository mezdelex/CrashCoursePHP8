<?php

declare(strict_types=1);

namespace clases;

class MonedasCollection2 implements \IteratorAggregate {
    public function __construct(private array $monedas) { // Constructor property promotion
        $this->monedas = $monedas; // Asignación redundante usando property promotion
    }

    public function getIterator() {
        return new \ArrayIterator($this->monedas);
    }
}
