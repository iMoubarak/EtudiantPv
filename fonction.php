<?php
    function count_page(array $tab,int $count):int
    {
        $page = 0;
        for($i=0;$i<$count;$i++)
            if($i+1%11==0)
                $page++;
        return $page;
    }  
?>