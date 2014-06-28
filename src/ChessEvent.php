<?php

namespace Chess;
use Symfony\Component\EventDispatcher\Event;

class ChessEvent extends Event {

  public $name;

  public function __construct($name) {
    $this->name = $name;
  }
}
