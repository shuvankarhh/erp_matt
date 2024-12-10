<?php

namespace App\Services\Vendor\Tauhid\Pagination;

class Pagination
{
    public static function default($paginator)
    {
        $page_number_range = 7; // It has to be odd number.
        $current_page = $paginator->currentPage();
        $last_page = $paginator->lastPage();

        // checking extra number in part 1
        $part1_extra = 0;
        $is_set_part1_from = 0;
        $part1_from = $current_page - ($page_number_range - 1);
        $part1_to = $current_page;
        for($i=$part1_from; $i<$current_page; $i++)
        {
            if($i > 0)
            {
                if($is_set_part1_from == 0)
                {
                    $part1_from = $i;
                    $is_set_part1_from = 1;
                }
            }else
            {
                $part1_extra++;
            }
        }

        // checking extra number in part 2
        $part2_extra = 0;
        $part2_from = $current_page + 1;
        $part2_to = $current_page + ($page_number_range);
        for($i=$part2_from; $i<$part2_to; $i++)
        {
            if($i > $last_page)
            {
                $part2_extra++;
            }
        }

        // adding extra number
        if($part1_extra > 0)
        {
            $part2_from = $current_page + 1;
            $part2_to = $current_page + $part1_extra + 1;
            $is_part1_extra = 1;
        }

        // adding extra number
        if($part2_extra > 0)
        {
            $part1_from = $current_page - $part2_extra;
            $part1_to = $current_page;
            $part2_to = $last_page + 1;
        }

        // showing current page in middle
        if(($page_number_range-1)/2 > $part1_extra && ($page_number_range-1)/2 > $part2_extra)
        {
            $part1_from = $current_page - ($page_number_range-1)/2;
            $part2_from = $current_page + 1;
            $part2_to = $current_page + ($page_number_range-1)/2 + 1;
        }

        //triming negetive numbers
        if($part1_from < 1)
        {
            $part1_from = 1;
        }
        
        return view('partials._pagination', [
            'paginator' => $paginator,
            'pagination_links' => array("current_page" => (int) $current_page, "last_page" => (int) $last_page, "part1_from" => (int) $part1_from, "part1_to" => (int) $part1_to, "part2_from" => (int) $part2_from, "part2_to" => (int) $part2_to),
        ]);
    }
}
