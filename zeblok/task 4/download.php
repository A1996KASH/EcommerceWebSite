<?php
function convert_to_csv($input_array, $output_file_name, $delimiter)
{
    /** open raw memory as file, no need for temp files */
    $temp_memory = fopen('php://memory', 'w');
    /** loop through array */
    foreach ($input_array as $line) {
        /** default php csv handler **/
        fputcsv($temp_memory, $line, $delimiter);
    }
    /** rewrind the "file" with the csv lines **/
    fseek($temp_memory, 0);
    /** modify header to be downloadable csv file **/
    header('Content-Type: application/csv');
    header('Content-Disposition: attachement; filename="' . $output_file_name . '";');
    /** Send file to browser for download */
    fpassthru($temp_memory);
}
function convert_to_json($array,$filename){
    $json = json_encode($array);

header('Content-disposition: attachment; filename='.$filename);
header('Content-type: application/json');

echo( $json);
}

/** Array to convert to csv */

$array_to_csv = Array(array("akas","sdadsadjdgagsd"),
                        array("data2","dadsdad")

    );
if(isset($_GET["csv"])){
convert_to_csv($array_to_csv, 'report.csv', ',');
}
if(isset($_GET["json"])){
convert_to_json($array_to_csv,"my.json");
}
?>