<?php
declare(strict_types=1);
include_once 'cms-config.php';
include_once ROOT . '/cms-includes/global-functions.php';
include_once ROOT . '/cms-includes/models/Database.php';
include_once ROOT . '/cms-includes/models/Template.php';

// use Database
// klassen protected - kan inte nå åtkomst
// Call to protected Database::__construct() from invalid context
// $database = new Database();

// use Temmplate
$template = new Template();

$title = "Template";

?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/cms-content/styles/style.css">
</head>
<body>
    
    <?php include ROOT . '/cms-includes/partials/header.php'; ?>
    <?php include ROOT . '/cms-includes/partials/nav.php'; ?>

    <h1><?= $title ?></h1>

    <?php

    new DisplayDBVersion();

    // use setup method - create table
    $result = $template->setup();


    // testa åtkomst utan klassen Database
    // $dsn = "mysql:host=". DB_HOST .";dbname=". DB_NAME;
    // $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

    // print_r($pdo);

    // PDO query()
    // Enkel fråga utan variabler
    // $sql = "SELECT * FROM template";

    // fråga efter ett specifikt innehåll
    // $sql = "SELECT * FROM template WHERE id = 2";
    
    // använd en variabel för "value" - i det här fallet id
    // $value = 3;
    // $sql = "SELECT * FROM template WHERE id = " . $value;

    // vad händer om vi äventyrar en dynamiskt uppbyggd sql fråga
    // $value = "4 OR 1=1";
    // $sql = "SELECT * FROM template WHERE id = " . $value;

    // $value = "4; RENAME TABLE template TO temp";
    // $sql = "SELECT * FROM template WHERE id = " . $value;

    // $value = "4; DROP TABLE template";
    // $sql = "SELECT * FROM template WHERE id = " . $value;

    // se upp med att skapa dynamiskt uppbyggda sql frågor - googla "Bobby tables";
    //  SQL injection

    // $stmt = $pdo->query($sql);
    // $result = $stmt->fetchAll();
    // print_r2($result);

    // För att förhindra SQL injection används placeholders, typ
    // $sql = "SELECT * FROM template WHERE id = :value";
    // PDO metod prepare()
    // se klassen Template.php

    $result = $template->selectAll();
    print_r2($result);


    ?>

    <?php include ROOT . '/cms-includes/partials/footer.php'; ?>

</body>
</html>