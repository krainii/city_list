<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
CJSCore::Init(array("jquery"));
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
<input id="step" hidden value="<?php echo $arResult['step']?>">
<input id="count" hidden value="<?php echo $arResult['count']?>">
    <div id="result"></div>
<script>
    BX.message({
        iblock: '<? echo $arResult['iblock']; ?>'
    });
</script>
</body>
</html>