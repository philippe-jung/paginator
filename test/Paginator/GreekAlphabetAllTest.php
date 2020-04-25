<?php


namespace Paginator\Test;


use Paginator\PaginatorInterface;
use Paginator\Test\Example\GreekAlphabetPaginator;

class GreekAlphabetAllTest extends AbstractTest {

  public function getPaginator(): PaginatorInterface {
    return new GreekAlphabetPaginator(2);
  }

}
