<?php


namespace Paginator\Test;


use Paginator\FixedDataSetPaginator;
use Paginator\PaginatorInterface;

class FixedDataSetPaginatorArrayObjectTest extends FixedDataSetPaginatorTest {

  public function getPaginator(): PaginatorInterface {
    return new FixedDataSetPaginator(1, new \ArrayObject(self::DATA_SET));
  }

}
