<!DOCTYPE html>
    <head>
        <title>Neil's MD5 Cracker</title>
    </head>
    <body>
    <h1>MD5 cracker</h1>
    <p>This application takes an MD5 hash of a four digit string and attempts to hash all four digits combinations to determine the original four digits.</p>

    <pre>
    Debug Output:

    <?php
        $goodtext = "Not found at all";
        // If there is no parameter, this code is all skipped
        if ( isset($_GET['md5']) ) {
            $time_pre = microtime(true);
            $md5 = $_GET['md5'];
            // digit string and how many times search shows
            $txt = "0123456789";
            $show = 15;
            // Outer loop start at 0 to go through the digits for the first position in our "possible" pre-hash text
            for($i=0; $i<strlen($txt); $i++ ) {
                $num1 = $txt[$i];   // The first of 4 digit - obviously at 0 to start
                // Our inner loop - Note the use of new variables $j and $num2 
                for($j=0; $j<strlen($txt); $j++ ) {
                    $num2 = $txt[$j];  // Our second digit
                    // Third loop to go through the digits for the third position in our "possible" pre-hash text
                    for($a=0; $a<strlen($txt); $a++ ) {
                        $num3 = $txt[$a];   // Our third digit
                        // Fourth loop - Note the use of new variables $b and $num4 
                        for($b=0; $b<strlen($txt); $b++ ) {
                            $num4 = $txt[$b];  // Our fourth digit

                            // Concatenate the four digits together to form the "possible" pre-hash text
                            $try = $num1.$num2.$num3.$num4;
                            // Run the hash and then check to see if we match
                            $check = hash('md5', $try);
                            if ( $check == $md5 ) {
                                $goodtext = $try;
                                break;   // Exit the inner loop
                            }                    
                            // Debug output until $show hits 0
                            if ( $show > 0 ) {
                                print "$check $try\n";
                                $show = $show - 1;
                            }
                        }  
                    }      

                }
            }
            // Compute ellapsed time
            $time_post = microtime(true);
            print "Ellapsed time: ";
            print $time_post-$time_pre;
            print "\n";
        }
    ?>
    </pre>
    <!-- Use the very short syntax and call htmlentities() -->
    <p>Original using "htmlentities" Text: <?= htmlentities($goodtext); ?></p>
    <p>This echo + variable $goodtext works too: <?php echo $goodtext ?></p>
    
    <form>
        <input type="text" name="md5" size="60" />
        <input type="submit" value="Crack MD5"/>
    </form>
        <ul>
            <li><a href="index.php">Reset</a></li>
            <li><a href="md5.php">MD5 Encoder</a></li>
            <li><a href="makecode.php">MD5 Code Maker</a></li>
            <li><a href="https://github.com/csev/wa4e/tree/master/code/crack" target="_blank">Source code for this application</a></li>
        </ul>
    </body>
</html>