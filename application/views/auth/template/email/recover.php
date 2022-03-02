<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang='pt-br'>

<head>
    <style>
        body {
            background-color: #f3f3f3;
            font-family: 'Calibri', sans-serif;
        }

        .box {
            background-color: #fff;
            padding: 40px;
            display: block;
            margin: auto;

        }

        .info {
            margin-top: 25px;
            font-size: 10px;
        }

        .content {
            background-color: #ef7fa0;
            padding: 5px 20px;
            display: inline-block;
        }

        p {
            font-size: 16px;
        }

        a {
            margin-bottom: 15px;
        }

        hr {
            border: 1px solid #f9f9f9;
        }
    </style>
</head>

<body>
    <div class='box'>
        <h2><?= $language['title']; ?></h2>
        <?= $language['paragraph']; ?>
        <a href='<?= $site; ?>redefine?e=<?= $email ?>&t=<?= $token ?>' style='padding: 10px 15px;
                    background: #ef7fa0; text-decoration: none; border-radius: 2.5px; text-transform: uppercase;
                    color: #000; display: inline-block;'><?= $language['button']; ?></a>

        <hr>

        <div class='info'>
            <?= $language['bottom']; ?>
        </div>
    </div>
</body>



</html>