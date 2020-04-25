<?php


namespace Paginator\Test;


use Paginator\PaginatorInterface;
use Paginator\Test\Example\GreekAlphabetPaginator;

class GreekAlphabetHalfTest extends AbstractTest {

  public function getPaginator(): PaginatorInterface {
    return new GreekAlphabetPaginator(1, 12);
  }

}
