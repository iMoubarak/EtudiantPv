<?php
    function remplir_tableau(array $tab)
    {
        for($i=0;$i<100;$i++)
        {
           echo <<<HTML
           <tr>
                <td>{$tab['ordre'][$i]}</td>
                <td>{$tab['nomp'][$i]}</td>
                <td>{$tab['matricule'][$i]}</td>
                <td>{$tab['note_champ'][$i]}</td>
            </tr>
HTML; 
        }
    }
    function count_page(array $tab,int $count):int
    {
        $page = 0;
        for($i=0;$i<$count;$i++)
            if($i+1%11==0)
                $page++;
        return $page;
    }
    
?>