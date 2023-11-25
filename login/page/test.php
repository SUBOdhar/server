<!DOCTYPE html>
<html>

<body>

    <?php
    // get the number of string
    echo strlen("Hello");
    // split the the content
    $str = 'string';
    $chars = preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
    print_r($chars);
    //array start for 1 
    $array = array("a", "b", "c"); // array with keys 0, 1, 2
    array_unshift($array, ""); // add a dummy element at the beginning
    unset($array[0]);
    ?>

</body>

</html>