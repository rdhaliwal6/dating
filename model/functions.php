<!--// Rajpreet Dhaliwal-->
<!--// 1/16/20-->
<!--// /328/dating/model/functions.php-->
<!--// functions page for dating.-->
<?php
function interest(array $x)
{
    $int = "";
    foreach ($x as $value) {
        $int = $int . " " . $value;
    }
    return $int;
}
