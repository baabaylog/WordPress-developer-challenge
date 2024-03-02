<?php
if (!defined('WPINC')) die;

add_action( 'wp_ajax_pfa_read_csv_ajax', 'pfa_read_csv_ajax' );
add_action( 'wp_ajax_nopriv_pfa_read_csv_ajax', 'pfa_read_csv_ajax' );

/**
 * Handles pfa_read_csv_ajax.
 */
function pfa_read_csv_ajax() {
	$file = $_FILES['file'];
    try {
        $data = read_csv_file($file['tmp_name']);
        $data = convertToKeyValuePair($data);
        wp_send_json(['status'=>true, 'data'=>$data]);
    } catch (\Throwable $th) {
        $th;
        wp_send_json(['status'=>false, 'message'=>$th->getMessage()]);
    }
	wp_die(); 
}

function read_csv_file($file_path) {
    $csv_data = [];
    if (($handle = fopen($file_path, "r")) !== false) {
        while (($row = fgetcsv($handle, 1000, ",")) !== false) {
            $csv_data[] = $row;
        }
        fclose($handle);
    } else {
        echo "Error: Unable to open file $file_path";
    }
    return $csv_data;
}

function convertToKeyValuePair($data){
    if(!$data) return;
    $headers = $data[0];
    $r = [];
    for ($i=1; $i < count($data); $i++) {
        $obj = new stdClass();
        for ($j = 0; $j < count($headers); $j++) {
            $obj->{$headers[$j]} = $data[$i][$j];
        }
        $r[] = $obj;
    }
    return $r;
}