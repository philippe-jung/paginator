<?php


namespace Paginator\Test;


use Paginator\PaginatorInterface;
use PHPUnit\Framework\TestCase;

abstract class AbstractTest extends TestCase {

  abstract public function getPaginator(): PaginatorInterface;

  /**
   * @var PaginatorInterface
   */
  private $paginatorInstance;

  /**
   * Initialise a Paginator
   */
  protected function setUp(): void {
    $this->paginatorInstance = $this->getPaginator();
  }

  /**
   * @return int
   */
  protected function getExpectedLastIndex(): int {
    // Last page index should be "total elements" / "elements per page"
    return (int) ($this->paginatorInstance->getTotalElementsCount() / $this->paginatorInstance->getElementsPerPage());
  }

  /**
   * @return int
   */
  protected function getExpectedElementsCountForPage(): int {
    // Each page should have between "elements per page" and no more "total elements" elements
    // (eg: you could have less elements in total than "elements per page)
    return (int) min($this->paginatorInstance->getElementsPerPage(), $this->paginatorInstance->getTotalElementsCount());
  }

  /**
   * @return int
   */
  protected function getNonExistingPageIndex(): int {
    return $this->paginatorInstance->getLastPageIndex() + 1;
  }

  public function testGetCurrentPageIndex() {
    // Check getCurrentPageIndex and setCurrentPageIndex work as expected
    $initialValue = $this->paginatorInstance->getCurrentPageIndex();
    $newValue = $initialValue + 1;
    $this->paginatorInstance->setCurrentPageIndex($newValue);
    $this->assertEquals($newValue, $this->paginatorInstance->getCurrentPageIndex());
  }

  public function testGetElementsPerPage() {
    // Check getElementsPerPage and setElementsPerPage work as expected
    $initialValue = $this->paginatorInstance->getElementsPerPage();
    $newValue = $initialValue + 1;
    $this->paginatorInstance->setElementsPerPage($newValue);
    $this->assertEquals($newValue, $this->paginatorInstance->getElementsPerPage());
  }

  public function testGetTotalElementsCount() {
    // Check getTotalElementsCount and setTotalElementsCount work as expected
    $initialElementsCount = $this->paginatorInstance->getTotalElementsCount();
    $newElementsCount = $initialElementsCount + 1;
    $this->paginatorInstance->setTotalElementsCount($newElementsCount);
    $this->assertEquals($newElementsCount, $this->paginatorInstance->getTotalElementsCount());
  }

  public function testGetLastPageIndex() {
    // Check last page index is what it should be
    $this->assertEquals($this->getExpectedLastIndex(), $this->paginatorInstance->getLastPageIndex());
  }

  public function testGetElementsForPage() {
    // Check we have the correct number of elements returned for the first page
    $this->assertCount($this->getExpectedElementsCountForPage(), $this->paginatorInstance->getElementsForPage(0));
    // Check we have 0 elements returned for a non existing page
    $this->assertCount(0, $this->paginatorInstance->getElementsForPage($this->getNonExistingPageIndex()));
  }

  public function testGetElementsCountForPage() {
    // Check we have the correct number of elements returned for the first page
    $this->assertEquals($this->getExpectedElementsCountForPage(), $this->paginatorInstance->getElementsCountForPage(0));
    // Check we have 0 elements returned for a non existing page
    $this->assertEquals(0, $this->paginatorInstance->getElementsCountForPage($this->getNonExistingPageIndex()));
  }

}
