<?php

use http\Params;

function getPDO()
{
    require ".const.php";
    $dbh = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $user, $pass);
    return $dbh;
}

function GetExam()
{
    try {
        $dbh = getPDO();
        $query = 'SELECT testDescription FROM app_pfinfo.evaluation;;';
        $statement = $dbh->prepare($query);
        $statement->execute();
        $queryResult = $statement->fetchAll();
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

        $query = 'SELECT * FROM app_pfinfo.person where role = 0;';
        $statement = $dbh->prepare($query);
        $statement->execute();
        $queryResult = $statement->fetchAll(PDO::FETCH_ASSOC);
        $dbh = null;
        return $queryResult;

    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";

    }


}function insertinto($gradeValue, $fkeval, $fkstudent)
{
$params = ['gradeValue'=>$gradeValue, 'fkfeval' => $fkeval, 'fkStudent' => $fkstudent];
    try {
        $dbh = getPDO();

        $query = 'INSERT INTO grade (gradeValue,fkEval,fkStudent) values ('.$gradeValue.','.$fkeval.','.$fkstudent.')';
        $statement = $dbh->prepare($query);
        $statement->execute($params);
        $queryResult = $statement->fetchAll(PDO::FETCH_ASSOC);
        $dbh = null;
        return $queryResult;

    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";

    }


}



