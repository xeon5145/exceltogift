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

    // getting job role name
    $jobRoleName = $_POST['qbName']; //Name of question bank
    $qblanguage = $_POST['langauge']; //Language of question bank
    // getting job role name

    // switch category 1
    $catswitch1 = '$CATEGORY : top/Default for Ambuja/' . $jobRoleName;
    // switch category 1

    // switch category 2
    $catswitch2 = $catswitch1 . '/Language : ' . $qblanguage;

    // defining arrays
    $topicArray = [];
    // defining arrays

    // switch category 2
    for ($i = 1; $i < count($data); $i++) {

        // switch category 3
        $catswitch3 = $catswitch2 . '/' . $data[$i][1] . ' - ' . $data[$i][2];

        $topic = $data[$i][1];
        array_push($topicArray,$topic);
    }

    $uniqTopicArray = array_unique($topicArray);

    

    for($j = 0 ; $j > count($uniqTopicArray); $j++ )
    {
        echo $getTopic =  $uniqTopicArray[$j][0];
    }

}
?>