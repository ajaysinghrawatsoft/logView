<?php

include('CountLines.php');
include('Pagination.php');

$countLinesObj  = new CountLines(); // creating the object for the CountLine class
$paginationObj  = new Pagination();

//continue only if $_POST is set and it is a Ajax request
if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

    //Get page number from Ajax POST
    if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }

    $fileName = $_POST["file"]; // setting the file path into the variable from post request.

    // check if the file doesn't exists it will throw error message.
    if(!file_exists($fileName))
        echo "<h4> Sorry!! This Log file doesn't exist.</h4>";
    else {
        $get_total_rows = $countLinesObj->countLine($fileName); //hold total records in variable
        $f              = fopen($fileName, 'r'); // opening the file in read mode.
        $item_per_page  = 10;   // total item per page
        $total_pages    = ceil($get_total_rows / $item_per_page);   // calculating total pages
        $lineNo         = 0;
        $currPage       = $page_number;
        $fromLine       = (($currPage * $item_per_page) - $item_per_page) + 1;  // calulating the start position of the line
        $toLine         = $currPage * $item_per_page;   // calculating the end position of the line.

        //Display records fetched from database.
        echo '<ul class="contents">';
        echo '<table class="table"><thead><tr><th>S.No</th><th>Logs</th></tr></thead><tbody>';
        while ($line = fgets($f)) {
            $lineNo++;
            if ($lineNo >= $fromLine && $line != "") {
                echo '<tr><td class="vertical-line">' . $lineNo . '</td><td class="vertical-line">' . $line . '</td></tr>';
            }
            if ($lineNo == $toLine) {
                break;
            }
        }
        echo '</tbody></table>';
        fclose($f);
        echo '</ul>';

        echo '<div align="center">';
        /* We call the pagination function here to generate Pagination link for us.
        As you can see I have passed several parameters to the function. */
        echo $paginationObj->getPagination($page_number, $total_pages);
        echo '</div>';

        exit;
    }
}

?>

