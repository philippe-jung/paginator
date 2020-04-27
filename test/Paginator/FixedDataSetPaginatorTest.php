<?php


namespace Paginator\Test;


use Paginator\FixedDataSetPaginator;
use Paginator\PaginatorInterface;

class FixedDataSetPaginatorTest extends AbstractTest {

  const DATA_SET = [
    'Alpha',
    'Beta',
    'Gamma',
    'Delta'
  ];

  public function getPaginator(): PaginatorInterface {
    return new FixedDataSetPaginator(1, self::DATA_SET);
  }

  public function testResults() {
    $paginator = $this->getPaginator();
    // With 1 elements per page, the first page should only return the first element
    $this->assertEquals([self::DATA_SET[0]], $paginator->getElementsForPage(0));
    // second page should return the second element
    $this->assertEquals([self::DATA_SET[1]], $paginator->getElementsForPage(1));

    // Same tests with 2 elements per page
    $paginator->setElementsPerPage(2);
    $this->assertEquals([self::DATA_SET[0], self::DATA_SET[1]], $paginator->getElementsForPage(0));
    $this->assertEquals([self::DATA_SET[2], self::DATA_SET[3]], $paginator->getElementsForPage(1));
  }

}
