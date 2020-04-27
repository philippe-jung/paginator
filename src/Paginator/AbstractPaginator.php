<?php


namespace Paginator;


abstract class AbstractPaginator implements PaginatorInterface {

  /**
   * @var int
   */
  protected $currentPageIndex;
  /**
   * @var int
   */
  protected $elementsPerPage;
  /**
   * @var int
   */
  protected $totalElementsCount;

  /**
   * ExamplePaginator constructor.
   * @param int $elementsPerPage
   * @param int $totalElementsCount
   * @param int $startPageIndex
   */
  public function __construct(int $elementsPerPage, int $totalElementsCount, int $startPageIndex = 0) {
    $this->setElementsPerPage($elementsPerPage);
    $this->setTotalElementsCount($totalElementsCount);
    $this->setCurrentPageIndex($startPageIndex);
  }

  /**
   * @param int $elementsPerPage
   */
  public function setElementsPerPage(int $elementsPerPage): void {
    $this->elementsPerPage = $elementsPerPage;
  }

  /**
   * @param int $totalElementsCount
   */
  public function setTotalElementsCount(int $totalElementsCount): void {
    $this->totalElementsCount = $totalElementsCount;
  }

  /**
   * @param int $pageIndex
   * @return int
   */
  public function getElementsCountForPage(int $pageIndex): int {
    return count($this->getElementsForPage($pageIndex));
  }

  /**
   * @param int $pageIndex
   */
  public function setCurrentPageIndex(int $pageIndex): void {
    $this->currentPageIndex = $pageIndex;
  }

  /**
   * @return int
   */
  public function getCurrentPageIndex(): int {
    return $this->currentPageIndex;
  }

  /**
   * @return int
   */
  public function getLastPageIndex(): int {
    return (int) ($this->totalElementsCount / $this->elementsPerPage);
  }

  /**
   * @return int
   */
  public function getElementsPerPage(): int {
    return $this->elementsPerPage;
  }

  /**
   * @return int
   */
  public function getTotalElementsCount(): int {
    return $this->totalElementsCount;
  }

}
