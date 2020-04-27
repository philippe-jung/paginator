<?php


namespace Paginator\Test;


use Paginator\DynamicDataSetPaginator;
use Paginator\PaginatorInterface;

class DynamicDataSetPaginatorTest extends AbstractTest {

  public function getPaginator(): PaginatorInterface {
    return new DynamicDataSetPaginator(1, 10);
  }

}
