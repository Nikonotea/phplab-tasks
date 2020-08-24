<?php
declare(strict_types=1);
require_once __DIR__ . '/classes/Request.php';
require_once __DIR__ . '/classes/Cookies.php';

$request = new Request();
$cookieKey = $request->get('cookie-key');
$cookieValue = $request->get('cookie-value');
$addCookie = new Cookies();
$addCookie->set($cookieKey, $cookieValue);

error_reporting(E_ALL);
ini_set('display_errors', 'on');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Work 6</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<table class="table-decoration">
    <caption>home work 6 - oop - class cookies</caption>
    <tr>
        <th id="table-col-name">methods</th>
        <th id="table-col-name">action</th>
        <th id="table-col-name">result</th>
    </tr>
    <tr>
        <td class="td-class-name">
            <span>set</span>
        </td>
        <td class="td-decoration-result">
            <form action="" method="get">
                <label>Key
                    <input type="text" name="cookie-key" required pattern="\w*" minlength="1" maxlength="10"
                           placeholder="enter cookie's key">
                </label>
                <label>Value
                    <input type="text" name="cookie-value" required pattern="\w*" minlength="1" maxlength="10"
                           placeholder="enter cookie's value">
                </label>
                <button type="submit">Set Cookie</button>
            </form>
        </td>
        <td class="td-decoration-demonstrate">
        </td>
    </tr>
    <tr>
        <td class="td-class-name">
            <span>get</span>
        </td>
        <td class="td-decoration-result"></td>
        <td class="td-decoration-demonstrate">
            <?= $addCookie->get($cookieKey); ?>
        </td>
    </tr>
    <tr>
        <td class="td-class-name">
            <span>has</span>
        </td>
        <td class="td-decoration-result"></td>
        <td class="td-decoration-demonstrate">
            <?php
            if (isset($cookieKey) && $addCookie->has($cookieKey)) {
                echo 'True';
            }
            ?>
        </td>
    </tr>
    <tr>
        <td class="td-class-name">
            <span>all</span>
        </td>
        <td class="td-decoration-result"></td>
        <td class="td-decoration-demonstrate">
            <?php
            if (isset($cookieKey)) {
                $allCookies = $addCookie->all();
                if (is_array($allCookies)) {
                    foreach ($allCookies as $key => $item) {
                        echo $key . ' => ' . $item . '; ';
                    }
                } else {
                    echo $allCookies;
                }
            }
            ?>
        </td>
    </tr>
    <tr>
        <td class="td-class-name">
            <span>remove</span>
        </td>
        <td class="td-decoration-result">
            <form action="" method="get">
                <label>Key for remove Cookie
                    <input type="text" name="cookie-remove" required pattern="\w*" minlength="1" maxlength="10"
                           placeholder="enter cookie's key">
                </label>
                <button type="submit">Remove Cookie</button>
            </form>
        </td>
        <td class="td-decoration-demonstrate">
            <?php
            $cookieRemove = $request->get('cookie-remove');
            if (($addCookie->has($cookieRemove)) === true) {
                $addCookie->remove($cookieRemove);
            }
            ?>
        </td>
    </tr>
</table>

</body>
</html>