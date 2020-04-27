<?php


namespace Paginator;


class FixedDataSetPaginator extends AbstractPaginator {

  /**
   * @var mixed
   */
  protected $elements;

  /**
   * Define a Paginator with a fixed data set
   * @param int $elementsPerPage
   * @param mixed $elements Collection of elements to be paginated. Should be an iterable
   * @param int $startPageIndex
   * @throws \Exception
   */
  public function __construct(int $elementsPerPage, $elements, int $startPageIndex = 0) {
    if (!is_iterable($elements)) {
      throw new \Exception('Elements should be iterable');
    }
    $this->elements = $elements;
    parent::__construct($elementsPerPage, count($this->elements), $startPageIndex);
  }

  /**
   * @param int $pageIndex
   * @return array
   */
  public function getElementsForPage(int $pageIndex): array {
    $return = [];

    // Basic logic to return the elements for given page
    $firstElement = $pageIndex * $this->elementsPerPage;
    $lastElement = $firstElement + $this->elementsPerPage;
    if ($lastElement > $this->getTotalElementsCount()) {
      $lastElement = $this->getTotalElementsCount();
    }
    for ($i = $firstElement; $i < $lastElement; $i++) {
      $return[] = $this->elements[$i];
    }

    return $return;
  }
}
