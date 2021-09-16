<?php 
// error handler function
function myErrorHandler($errno, $errstr, $errfile, $errline)
{
    $severname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_banknagari";

    $conn = new mysqli($severname, $username, $password, $dbname);
    if (!(error_reporting() & $errno)) {
        // This error code is not included in error_reporting, so let it fall
        // through to the standard PHP error handler
        return false;
    }

    // $errstr may need to be escaped:
    $errstr = htmlspecialchars($errstr);

    switch ($errno) {
    case E_USER_ERROR:
        $eror= "<b>My ERROR</b> [$errno] $errstr<br />\n";
        $eror.= "  Fatal error on line $errline in file $errfile";
        $eror.= ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
        $eror.= "Aborting...<br />\n";
        mysqli_query($conn, "INSERT INTO `db_banknagari`.`tb_log` (`id`, `log`, `jenis_log`, `gate_id`,`date`) VALUES (NULL, '$eror', 'erorr', '01',now());");
        header("location: index.php");
        
        exit(1);

    case E_USER_WARNING:
        $eror= "<b>My WARNING</b> [$errno] $errstr<br />\n";
        mysqli_query($conn, "INSERT INTO `db_banknagari`.`tb_log` (`id`, `log`, `jenis_log`, `gate_id`,`date`) VALUES (NULL, '$eror', 'erorr', '01',now());");
        header("location: index.php");

        break;

    case E_USER_NOTICE:
        $eror="<b>My NOTICE</b> [$errno] $errstr<br />\n";
        mysqli_query($conn, "INSERT INTO `db_banknagari`.`tb_log` (`id`, `log`, `jenis_log`, `gate_id`,`date`) VALUES (NULL, '$eror', 'erorr', '01',now());");
        header("location: index.php");

        break;

    default:
        echo "Reload . . . ";
                mysqli_query($conn, "INSERT INTO `db_banknagari`.`tb_log` (`id`, `log`, `jenis_log`, `gate_id`,`date`) VALUES (NULL, 'Eror Saat Membaca', 'erorr', '01',now());");
        header("location: index.php");
        break;
    }

    /* Don't execute PHP internal error handler */
    return true;
}

// function to test the error handling
function scale_by_log($vect, $scale)
{
    if (!is_numeric($scale) || $scale <= 0) {
        trigger_error("log(x) for x <= 0 is undefined, you used: scale = $scale", E_USER_ERROR);
    }

    if (!is_array($vect)) {
        trigger_error("Incorrect input vector, array of values expected", E_USER_WARNING);
        return null;
    }

    $temp = array();
    foreach($vect as $pos => $value) {
        if (!is_numeric($value)) {
            trigger_error("Value at position $pos is not a number, using 0 (zero)", E_USER_NOTICE);
            $value = 0;
        }
        $temp[$pos] = log($scale) * $value;
    }

    return $temp;
}

// set to the user defined error handler
$old_error_handler = set_error_handler("myErrorHandler");


 ?>