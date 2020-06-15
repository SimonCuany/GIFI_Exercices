<?php
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
        $query = 'SELECT * FROM app_pfinfo.evaluation;';
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
        $queryResult = $statement->fetchAll();
        $dbh = null;
        return $queryResult;

    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";

    }


}

function GetTeacher()
{

    try {
        $dbh = getPDO();

        $query = 'SELECT * FROM app_pfinfo.person where role = 1;';
        $statement = $dbh->prepare($query);
        $statement->execute();
        $queryResult = $statement->fetchAll();
        $dbh = null;
        return $queryResult;

    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";

    }

}

