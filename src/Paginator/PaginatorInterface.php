<?php


namespace Paginator;


interface PaginatorInterface {

  /**
   * Allows to specify the current page using its index
   * @param int $pageIndex
   */
  public function setCurrentPageIndex(int $pageIndex): void;

  /**
   * Allows to specify the number of elements for each page
   * @param int $elementsPerPage
   */
  public function setElementsPerPage(int $elementsPerPage): void;

  /**
   * Allows to specify the total number of elements that need to be paginated
   * @param int $totalElementsCount
   */
  public function setTotalElementsCount(int $totalElementsCount): void;

  /**
   * Returns an array of elements for given page index.
   * This is where clever logic to retrieve data happens (ie: database or service call)
   * @param int $pageIndex
   * @return array
   */
  public function getElementsForPage(int $pageIndex): array;

  /**
   * Return the index of the current page
   * @return int
   */
  public function getCurrentPageIndex(): int;

  /**
   * Return the index of the last page
   * @return int
   */
  public function getLastPageIndex(): int;

  /**
   * Return the number of elements per page
   * @return int
   */
  public function getElementsPerPage(): int;

  /**
   * Returns the number of elements for given page index
   * @param int $pageIndex
   * @return int
   */
  public function getElementsCountForPage(int $pageIndex): int;

  /**
   * Return the total number of elements
   * @return int
   */
  public function getTotalElementsCount(): int;

}
