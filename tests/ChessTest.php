<?php
require_once __DIR__ . '/../../../autoload.php';
use \Chess\Start;

class ChessTest extends PHPUnit_Framework_TestCase {
  public function testAdd() {
    $chess = new Start();
    $this->assertEquals(2, 3);
  }
}
