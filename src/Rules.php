<?php
namespace Chess;
use Chess\ChessEvent;

class Rules {
  public function changeValue(ChessEvent $e) {
    $e->name = 'Bui Tuan Phuong';
  }
}
