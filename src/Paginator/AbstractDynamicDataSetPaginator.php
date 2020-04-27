<?php


namespace Paginator;


abstract class AbstractDynamicDataSetPaginator extends AbstractPaginator {

  /**
   * This should perform some query on a database or a webservice using some LIMIT and OFFSET mechanism
   * @param int $pageIndex
   * @return array
   */
  abstract public function getElementsForPage(int $pageIndex): array;

  /**
   * This service should perform a COUNT query on a database or a webservice
   * @param int $pageIndex
   * @return int
   */
  abstract public function getElementsCountForPage(int $pageIndex): int;

}
