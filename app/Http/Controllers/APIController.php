<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIController extends Controller
{

    public function stress($n=100000000) {
        $time = microtime();
        $time = explode(' ', $time);
        $time = $time[1] + $time[0];
        $start = $time;

        // CPU stress test
        $a = 0; 
        for($i = 0; $i < 100000000; $i++) {
            $a += $i;
        }

        $time = microtime();
        $time = explode(' ', $time);
        $time = $time[1] + $time[0];
        $finish = $time;
        $total_time = round(($finish - $start), 4);
        echo 'Page generated in '.$total_time.' seconds.';

    }
    public function sleep($time=10){
        // current time
        echo date('h:i:s') . "\n";

        // sleep for 10 seconds
        sleep($time);

        // wake up !
        echo date('h:i:s') . "\n";
    }

    public function triangle($n=5) {
        // number of spaces 
        $k = 2 * $n - 2; 
    
        // outer loop to handle 
        // number of rows 
        // n in this case 
        for ($i = 0; $i < $n; $i++) 
        { 
            
            // inner loop to handle 
            // number spaces 
            // values changing acc.  
            // to requirement 
            for ($j = 0; $j < $k; $j++) 
                echo " "; 
    
            // decrementing k after 
            // each loop 
            $k = $k - 1; 
    
            // inner loop to handle  
            // number of columns 
            // values changing acc.  
            // to outer loop 
            for ($j = 0; $j <= $i; $j++ ) 
            { 
                
                // printing stars 
                echo "* "; 
            } 
    
            // ending line after 
            // each row 
            echo "\n"; 
        } 
    }
}
