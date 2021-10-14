<?php
## echo "<h2><b>Hi Bob42!!</b></h2></br></br>";
error_reporting(E_ALL);
// $testrandom = generate_some_values(1,5);
// echo "random nr: " . $testrandom . "<br>";

// $current_timestamp = get_timestamp();
// echo "current timestamp: " . $current_timestamp . "<br>";

// create_log_file(40);

if(isset($_GET["give_data"])) {
    echo create_log_file();
}

function create_log_file($datasetcount = 100) {
    // create logfile with timestamps from now - $datasetcount in +5 minutes
    // save all to logfile
    $filename = "data/log_file01";
    $current_timestamp = get_timestamp();
    $jsontestdata = "";
    // echo "calling for with " . $datasetcount . " datasetcounts <br>";
    for($i = $datasetcount; $i > 0; $i--) {
        ## echo "i: " . $i . "<br>";
        $step = $i * 5 * 60; // timestamp each 5 min
        $timestamp = $current_timestamp - $step;
        $print_timestamp = convert_2_date($timestamp);
        // echo "timestamp: " . $print_timestamp . "<br>";
        $testdata = creat_feak_dataset($timestamp);
        $jsontestdata .= json_encode($testdata);
        $jsontestdata .= "<br>";
    }
    return $jsontestdata . "<br>";
}

function creat_feak_dataset($timestamp) {
    // return {timestamp: timestamp; plants: [plant1: {name: name; hum: hum}, ...]; temp: temp; ... }
    $returnjson = "{";
    $returnjson .= "timestamp:" . $timestamp . ";";
    $returnjson .= "}";

    return $returnjson;

}

function generate_some_values($from = 10, $to = 60) {
    return rand($from, $to);
}

function get_timestamp() {
    $date = new DateTime();
    return $date->getTimestamp();
}

function convert_2_date($timestamp) {
    return date('m/d/Y H:i:s', $timestamp);
}
?>