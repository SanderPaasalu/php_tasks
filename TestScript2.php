<?php 
// Establish connection with mySql server
$con = mysqli_connect("localhost","root","");

mysqli_select_db($con, "test");

// Query mySQL table
$result_a=mysqli_query($con,"SELECT * FROM insurance INNER JOIN patient ON insurance.patient_id = patient._id");

// while loop to display patient info
while($row = mysqli_fetch_array($result_a))
{
    $to_date = strtotime($row['to_date']);
    $from_date = strtotime($row['from_date']);

    $format_fdate = date("m-d-y", "$from_date");
    $format_tdate = date("m-d-y", "$to_date");

    echo $row['pn'].",  ".$row['last'].",   ".$row['first'].",  ".$row['iname'].",  ".$format_fdate.",  ".$format_tdate;
    echo "
    ";
}

// Query mySQL table
$result_b=mysqli_query($con, "SELECT first, last FROM patient");

// while loop to display statistic of first letters of first and last name
while($row = mysqli_fetch_array($result_b))
    {
    $unique=array_unique($row);
    $string .=strtolower(implode($unique));
    $stringParts = str_split($string);
    sort($stringParts);
    $struppr=strtoupper(implode($stringParts));
    $SIZE= strlen($string);
    
    }
    printCharWithFreq($struppr);
    
    // funcion to find out how frequently character appears in First and Last name
    function printCharWithFreq($str)
    {
        global $SIZE;
         
        // size of the string 'str'
        $n = strlen($str);
        // 'freq[]' implemented as hash table
        $freq = array_fill(0, $SIZE, NULL);
        
        // accumulate frequency of each
        // character in 'str'
        for ($i = 0; $i < $n; $i++)
            $freq[ord($str[$i]) - ord('a')]++;
     
        // traverse 'str' from left to right
        for ($i = 0; $i < $n; $i++)
        {
     
            // if frequency of character str[i]
            // is not equal to 0
            if ($freq[ord($str[$i]) - ord('a')] != 0)
            {
     
                // print the character along with
                // its frequency
                echo $str[$i] ."    ". $freq[ord($str[$i]) -
                                      ord('a')]."   ".
                                      bcdiv((( $freq[ord($str[$i]) - ord('a')]/$n)*100),1,2)." %"."
                                      ";

                // update frequency of str[i] to 0
                // so that the same character is
                // not printed again
                $freq[ord($str[$i]) - ord('a')] = 0;
            }
        }
    }    
?>