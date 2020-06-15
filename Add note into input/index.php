<?php
/**
 * Title  : Gifi_exo
 * User   : simon.cuany
 * Date   : 08.06.2020
 */

require_once("database.php");

$students = selectMany("Select * from person where role=0", []);
$evals = selectMany("Select idEvaluation, testDescription, moduleShortName from evaluation 
	inner join moduleinstance on fkModuleInstance = idModuleInstance 
    inner join module on fkModule = idModule", []);
?>

<div>
    <form method="post" action="addgrade.php">
        Evaluation: <select name="idEval">
            <?php foreach ($evals as $eval) { ?>
                <option value="<?= $eval['idEvaluation'] ?>"><?= $eval['testDescription'] ?>, module <?= $eval['moduleShortName'] ?></option>
            <?php } ?>
        </select>
        <br>
        Elève: <select name="idStudent">
            <?php foreach ($students as $student) { ?>
                <option value="<?= $student['idPerson'] ?>"><?= $student['personFirstName'] ?> <?= $student['personLastName'] ?></option>
            <?php } ?>
        </select>
        <br>
        Note: <input type="text" name="gradeValue">
        <br>
        <input type="submit" name="store" value="Ok">
    </form>
</div>
