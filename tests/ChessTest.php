<?php
use \Chess\Start;
use \Chess\ChessEvent;
use \Chess\Rules;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\EventListener\RouterListener;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;


class ChessTest extends PHPUnit_Framework_TestCase {

  public function testChessGame() {
    $dispatcher = new EventDispatcher();
    $e = new ChessEvent('Phuong');
    $rules = new Rules();
    $dispatcher->addListener('event.helloword', array($rules, 'changeValue'));
    $dispatcher->dispatch('event.helloword', $e);

    echo($e->name);
    // $this->assertEquals('Bui Tuan Phuong', $e->name);
  }

  public function testUrl() {
    $routes = new RouteCollection();
    $routes->add('hello', new Route('/hello', array('_controller' =>
      function (Request $request) {
        return new Response("Hello");
      }
    )));
    $matcher = new UrlMatcher($routes, new RequestContext());

    // create the Request object
    $dispatcher = new EventDispatcher();
    $dispatcher->addSubscriber(new RouterListener($matcher));

    $resolver = new ControllerResolver();
    $kernel = new HttpKernel($dispatcher, $resolver);

    $request = Request::create('/hello');

    $response = $kernel->handle($request);
    echo ($response->getContent());
    //
    // actually execute the kernel, which turns the request into a response
    // // by dispatching events, calliwaang a controller, and returning the response
    // $response = $kernel->handle($request);
  }
}

