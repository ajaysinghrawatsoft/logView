<?php

namespace tests;
use PHPUnit\Framework\TestCase;

/**
 * Class PaginationTest
 * @package tests
 */
class PaginationTest extends TestCase
{
    /**
     * @param int $current_page
     * @param int $total_pages
     */
    public function testgetPagination($current_page = 1, $total_pages = 10)
    {
        $this->assertGreaterThan(0,$total_pages,"Total page greater than 0");
        $this->assertNotEquals(0,$total_pages,"Total page not equal 1");
        $this->assertLessThanOrEqual($total_pages,$current_page,"Current Page is less than equal to total page");

        $paginationMock = $this->getMockBuilder('tests\PaginationTest')
            ->setMethods(array('getPagination'))
            ->getMock();
        $paginationMock->expects($this->any())
            ->method('getPagination')
            ->will($this->returnValue(""));
        $paginationMock->getPagination($current_page,$total_pages);
    }
}
?>