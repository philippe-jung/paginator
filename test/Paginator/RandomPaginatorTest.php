<?php


namespace Paginator\Test;


use Paginator\PaginatorInterface;
use Paginator\Test\Example\RandomPaginator;

class DynamicDataSetPaginatorTest extends AbstractTest {

  public function getPaginator(): PaginatorInterface {
    return new RandomPaginator(1, 10);
  }

}
