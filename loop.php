<?php

require_once('stopWatch.php');


splitTime(__FILE__, __FUNCTION__, __LINE__);
for ($i = 0; $i < 1000 * 1000; $i++) {
    $result = sqrt($i);
}
splitTime(__FILE__, __FUNCTION__, __LINE__);


$storage = [];
for ($i = 0; $i < 1000 * 1000; $i++) {
    $result = sqrt($i);
    $storage[] = $result;
}
splitTime(__FILE__, __FUNCTION__, __LINE__);

stopWatchReport();

