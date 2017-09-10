<?php
namespace tests;
use PHPUnit\Framework\TestCase;

/**
 * Class CountLinesTest
 * @package tests
 */
class CountLinesTest extends TestCase
{
    /**
     * @param string $filename
     */
    public function testcountLine($filename = 'C:\xampp\htdocs\propertyGuru-logs\file.txt')
    {
        // Check the parameter is not empty
        $this->assertNotEmpty($filename);
        // Check if file exists
        $this->assertFileExists($filename, 'This file does not exist');
        $logMock = $this->getMockBuilder('tests\CountLinesTest')
            ->setMethods(array('countLine'))
            ->getMock();
        $logMock->expects($this->any())
            ->method('countLine')
            ->will($this->returnValue(1));
        $logMock->countLine($filename);
    }
}
?>