<? 

$b = 113 ; //broj jedinica 
$i = 0; // incrementor 
$z = 10; // broj kolumna  
?> 
<table> 
<? 
    while($i < $b) 
        { 
            if($i == 0 || $i == $a) 
                { 
                    echo "<tr>"; 
                    $a = $a + $z;  
                    $e = $a - 1;  
                    if ($e > $b)  
                        { 
                            $e = $b - 1;  
                        } 
                }     
                 
                echo "<td> ".$i." </td>"; 
             
            if ($i == $e) 
                { 
                    echo "</tr>"; 
                } 
            $i++; 
        } 
?> 
