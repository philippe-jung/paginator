<?php


namespace Paginator;


class DynamicDataSetPaginator extends AbstractPaginator {

  /**
   * @param int $pageIndex
   * @return array
   */
  public function getElementsForPage(int $pageIndex): array {
    // This should perform some query on a database or a webservice using some LIMIT and OFFSET mechanism
    // We will simulate that with a random data generator instead
    $return = [];
    if ($pageIndex < $this->getLastPageIndex()) {
      for ($i = 0; $i < $this->getElementsPerPage(); $i++) {
        $return[] = rand(0, 100);
      }
    }
    return $return;
  }

  /**
   * @param int $pageIndex
   * @return int
   */
  public function getElementsCountForPage(int $pageIndex): int {
    // This service should perform a COUNT query on a database or a webservice
    // We will simulate this by always returning a fixed number of elements instead
    if ($pageIndex < $this->getLastPageIndex()) {
      $count = $this->getElementsPerPage();
    } else {
      $count = 0;
    }
    return $count;
  }

}
