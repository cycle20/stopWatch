<?php

$timeEntries = [
];

function splitTime($file, $function, $line): void {
    global $timeEntries;

    $time = microtime(true);
    $timeEntries[] = [ $time, "$file:$function:$line" ];
}

function stopWatchReport(): void {
    global $timeEntries;

    $itemCount = count($timeEntries);
    printItem($timeEntries[0]);
    for ($index = 1; $index < $itemCount; $index++) {
        $prevItem = $timeEntries[$index - 1];
        $item = $timeEntries[$index];
        // elapsed time in seconds:
        $delta = round(($item[0] - $prevItem[0]), 3);
        printItem($item, $delta);
    }
}

function printItem(array $entry, float|false $delta = false): void {
    printf("%30s: %10.3f: ", $entry[1], $entry[0]);
    if(!$delta) {
        printf("%10s\n", "START");
    } else {
        printf("%10.3f\n", $delta);
    }
}

splitTime(__FILE__, __FUNCTION__, __LINE__); sleep(1);
splitTime(__FILE__, __FUNCTION__, __LINE__); sleep(3);
splitTime(__FILE__, __FUNCTION__, __LINE__); sleep(1);
splitTime(__FILE__, __FUNCTION__, __LINE__); sleep(2);
splitTime(__FILE__, __FUNCTION__, __LINE__); sleep(1);

print_r($timeEntries);
stopWatchReport();

