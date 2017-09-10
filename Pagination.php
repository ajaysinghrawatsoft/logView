<?php

/**
 * Class Pagination : Responsible for pagination in the logs in the file
 */
class Pagination {

    /**
     * @param $current_page
     * @param $total_pages
     * @return string
     *
     * Create the pagination for the logs
     */
    public function getPagination($current_page, $total_pages) {
        $pagination = '';
        if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
            $pagination .= '<ul class="pagination_logs">';

            $previous       = $current_page - 1; //previous link
            $next           = $current_page + 1; //next link

            if($current_page > 1){
                $previous_link = ($previous==0)? 1: $previous;
                $pagination .= '<li class="first"><a  href="#" data-page="1" title="First">First</a></li>'; //first link
                $pagination .= '<li><a href="#"  data-page="'.$previous_link.'" title="Previous">Previous</a></li>'; //previous link
            }

            if($current_page < $total_pages){
                $pagination .= '<li><a href="#"  data-page="'.$next.'" title="Next">Next</a></li>'; //next link
                $pagination .= '<li class="last"><a href="#" data-page="'.$total_pages.'" title="Last">Last</a></li>'; //last link
            }

            $pagination .= '</ul>';
        }
        return $pagination; //return pagination links
    }
}

?>