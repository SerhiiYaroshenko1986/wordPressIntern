<?php
function sortingArray($arr)
{
    $sortArr = [];
    $pos = 0;
    $max = $arr[0];
    $min = $arr[0];

    // max number
    for ($i = 0; $i < count($arr); $i++) {
        if ($min > $arr[$i]) {
            $min = $arr[$i];
        }
    }

    // min number
    for ($j = 0; $j < count($arr); $j++) {
        for ($k = 0; $k < count($arr); $k++) {
            if ($arr[$k] !== NULL) {
                if ($max < $arr[$k]) {
                    $max = $arr[$k];
                    $pos = $k;
                }
            }
        }

        $sortArr[$j] = $max;
        $arr[$pos] = NULL;
        $max = $min;
    }
    return $sortArr;
}
$arr = [1, 5, 10, 52, 541, 0];
echo "unsort array:  ";
for ($i = 0; $i < count($arr); $i++) {
    echo $arr[$i] . ",";
}
$sortArr = sortingArray($arr);
echo "<br>";
echo "sort array:  ";
for ($i = 0; $i < count($sortArr); $i++) {
    echo $sortArr[$i] . ",";
}
