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
    echo $catswitch1 = '$CATEGORY : top/Default for Ambuja/' . $jobRoleName;
    echo "<br>";
    // switch category 1

    // switch category 2
    echo "<br>";
    echo $catswitch2 = $catswitch1 . '/Language : ' . $qblanguage;
    echo "<br>";

    // switch category 2

    for ($i = 1; $i < count($data); $i++) {

        // switch category 3
        echo "<br>";
        echo $catswitch3 = $catswitch2 . '/' . $data[$i][1] . ' - ' . $data[$i][2];
        echo "<br>";

        // switch category 3

        // writing data
        echo "<br>";
        echo $questionopen = '::' . $data[$i][3] . ' {';
        echo "<br>";

        // options and answers
        $answer = $data[$i][8];
        switch ($answer) {
            case 'A' OR 'a' OR '1':
                $option1 = '=' . $data[$i][4];
                $option2 = '~' . $data[$i][5];
                $option3 = '~' . $data[$i][6];
                $option4 = '~' . $data[$i][7];
                break;

            case 'B' OR 'b' OR '2':
                $option1 = '~' . $data[$i][4];
                $option2 = '=' . $data[$i][5];
                $option3 = '~' . $data[$i][6];
                $option4 = '~' . $data[$i][7];
                break;

            case 'C' OR 'c' OR '3':
                $option1 = '~' . $data[$i][4];
                $option2 = '~' . $data[$i][5];
                $option3 = '=' . $data[$i][6];
                $option4 = '~' . $data[$i][7];
                break;

            case 'D' OR 'd' OR '4':
                $option1 = '~' . $data[$i][4];
                $option2 = '~' . $data[$i][5];
                $option3 = '~' . $data[$i][6];
                $option4 = '=' . $data[$i][7];
                break;
        }
        // options and answers
        echo $option1;
        echo '<br>';
        echo $option2;
        echo '<br>';
        echo $option3;
        echo '<br>';
        echo $option4;
        echo '<br>';
        echo $questionclose = '}';
        echo "<br>";
        // writing data
    }
}
else
{
    echo '0';
}
?>