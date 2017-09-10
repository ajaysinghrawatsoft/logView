<?php

/**
 * Class CountLines : This class is reponsible for the counting the lines in the file.
 */
class CountLines
{
    /**
     * @param $filename
     * @return integer total number os lines in the file
     */
    public function countLine($filename)
    {
        $f = fopen($filename, 'r');
        $lineCount = 0;
        while (!feof($f)) {
            $line = fgets($f);
            $lineCount++;
        }
        fclose($f);
        return $lineCount;
    }
}

?>