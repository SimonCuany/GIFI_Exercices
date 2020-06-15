<?php
/**
 * Title  : Gifi_exo
 * User   : simon.cuany
 * Date   : 08.06.2020
 */

require_once("database.php");

$students = GetStudent();
$exam = GetExam();
var_dump($_POST);
if (isset($_POST['gradeValue'])){
    $gradeValue = $_POST['gradeValue'];
}
if (isset($_POST['idStudent'])){
    $fkS = $_POST['idStudent'];
}
if (isset($_POST['idEval'])){
    $fkE = $_POST['idEval'];
}
$grade = insertinto($gradeValue, $fkE,$fkS);
?>

<div>
    <form method="post" action="#">
        Evaluation: <select name="idEval" style="width: 200px">
            <?php foreach ($exam as $e) { ?>
                <option><?= $e['testDescription'] ?></option>

            <?php } ?>
        </select>
        <br>
        Elève: <select name="idStudent" style="width: 200px">

            <?php foreach ($students as $s) {
                ?>
                <option><?= $s['personFirstName'].' '.$s['personLastName'] ?></option>

            <?php } ?>
        </select>
        <br>
        Note: <input type="text" name="gradeValue">



        <br>
        <input type="submit" name="store" value="Ok">
    </form>
</div>
