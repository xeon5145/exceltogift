<meta charset="UTF-8">
<?php

require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if (isset($_FILES['questionBank']) && $_FILES['questionBank']['error'] === UPLOAD_ERR_OK) {
    // Get the temporary file name
    $xlsxFile = $_FILES['questionBank']['tmp_name'];

    // Load the XLSX file
    $excelReader = new Xlsx();
    $spreadsheet = $excelReader->load($xlsxFile);

    // Get all the rows from the active sheet
    $data = $spreadsheet->getActiveSheet()->toArray();

    // Display the CSV data (you can also save it to a file or perform other operations)
    echo '<h2>CSV Data:</h2>';

    // getting job role name
    echo $jobRoleName = $_POST['qbName']."<br>";
    echo $qblanguage = $_POST['langauge']."<br>";
    // getting job role name

    for($i = 1 ; $i < count($data);$i++)
    {
        var_dump($data[$i]);

    }
}
?>
