<?php

$timeEntries = [
  'lastIndex' => -1
];

function splitTime() {
    global $timeEntries;

    $time = microtime(true);
    $timeEntries[] = $time;
    $timeEntries['lastIndex'] += 1;
}

splitTime(); sleep(1);
splitTime(); sleep(1);
splitTime(); sleep(1);
splitTime(); sleep(1);
splitTime(); sleep(1);

print_r($timeEntries);

