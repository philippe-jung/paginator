<?php


namespace Paginator\Test\Example;


use Paginator\PaginatorInterface;

class GreekAlphabetPaginator implements PaginatorInterface {

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
   * @var array
   */
  protected $elements = [
    'Alpha',
    'Beta',
    'Gamma',
    'Delta',
    'Epsilon',
    'Zeta',
    'Eta',
    'Theta',
    'Iota',
    'Kappa',
    'Lambda',
    'Mu',
    'Nu',
    'Xi',
    'Omicron',
    'Pi',
    'Rho',
    'Sigma',
    'Tau',
    'Upsilon',
    'Phi',
    'Chi',
    'Psi',
    'Omega',
  ];

  /**
   * ExamplePaginator constructor.
   * @param int $elementsPerPage
   * @param int $totalElementsCount
   * @param int $startPageIndex
   */
  public function __construct(int $elementsPerPage, int $totalElementsCount = null, int $startPageIndex = 0) {
    $totalLetters = count($this->elements);
    if (is_null($totalElementsCount)) {
      // Default to all letters
      $totalElementsCount = $totalLetters;
    } elseif ($totalElementsCount > $totalLetters) {
      throw new \Exception('You can only paginate up to ' . $totalLetters . ' letters.');
    }
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
