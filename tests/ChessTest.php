<?php
use \Chess\Start;
use \Chess\ChessEvent;
use \Chess\Rules;

use Symfony\Component\EventDispatcher\EventDispatcher;

class ChessTest extends PHPUnit_Framework_TestCase {
  public function testAdd() {
    $chess = new Start();
    echo('fr');
  }

  public function testChessGame() {
    $dispatcher = new EventDispatcher();
    $e = new ChessEvent('Phuong');
    $rules = new Rules();
    $dispatcher->addListener('event.helloword', array($rules, 'changeValue'));
    $dispatcher->dispatch('event.helloword', $e);

    echo($e->name);
    $this->assertEquals('Bui Tuan Phuong', $e->name);
  }
}

