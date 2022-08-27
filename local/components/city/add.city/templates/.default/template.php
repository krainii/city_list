<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add city</title>
</head>
<body>
    <?php
        foreach ($arResult['addCity'] as $value) {
            $APPLICATION->IncludeComponent(
                'city:notification',
                '',
                [
                    'status' => $value['status'],
                    'message' => $value['message']
                ],
                false
            );
        }
    ?>
</body>
</html>