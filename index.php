<?php
/**
 * Title  : Gifi_exo
 * User   : simon.cuany
 * Date   : 08.06.2020
 */

require(".constant.php");

function getPDO()
{
    require ".constant.php";
    $dbh = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $user, $pass);
    return $dbh;


    function GetExam()
    {
        try {
            $dbh = getPDO();
            $query = 'SELECT * FROM app_pfinfo.evaluation;'; //initalise the Query variable and the commande to execute
            $statement = $dbh->prepare($query);//Prepare Query
            $statement->execute();
            $queryResult = $statement->fetchAll(); //prepare result for client
            $dbh = null;
            return $queryResult;

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";

        }
    }

    function GetStudent()
    {

        try {
            $dbh = getPDO();
            $query = 'SELECT * FROM app_pfinfo.person where role = 0;'; //initalise the Query variable and the commande to execute

            $statement = $dbh->prepare($query);//Prepare Query
            $statement->execute();
            $queryResult = $statement->fetchAll(); //prepare result for client
            $dbh = null;
            return $queryResult;

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";

        }


    }
}


?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Exercice GIFI</title>
</head>
<body>
<form>
    <label for="Exam">Examen</label><br>
    <select name="Exam" id="Exam">
        <option value="Exam">

            <?php


            ?>
        </option>
        
    </select>
    <br>
    <label for="Student">Eleve</label><br>
    <select name="Student" id="Student">
        <option value="Student">
            <?php

            ?>
        </option>
    </select>

</form>


</body>
</html>

