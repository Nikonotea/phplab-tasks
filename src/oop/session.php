<?php
declare(strict_types=1);
require_once __DIR__ . '/classes/Request.php';
require_once __DIR__ . '/classes/Session.php';


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
    <caption>home work 6 - oop - class session</caption>
    <tr>
        <th id="table-col-name">methods</th>
        <th id="table-col-name">action</th>
        <th id="table-col-name">result</th>
    </tr>
    <tr>
        <td class="td-class-name">
            <span>set</span>
        </td>
        <td class="td-decoration-action">
            <form action="" method="get">
                <label>Key
                    <input type="text" name="session-key" required pattern="\w*" minlength="1" maxlength="10"
                           placeholder="enter session key">
                </label>
                <label>Value
                    <input type="text" name="session-value" required pattern="\w*" minlength="1" maxlength="10"
                           placeholder="enter session value">
                </label>
                <button type="submit">Set data Session</button>
            </form>
            <?php
            $request = new Request();
            $sessionKey = $request->get('session-key');
            $sessionValue = $request->get('session-value');
            $setSession = new Session();
            $setSession->set($sessionKey, $sessionValue);
            ?>
        </td>
        <td class="td-decoration-demonstrate">
        </td>
    </tr>
    <tr>
        <td class="td-class-name">
            <span>get</span>
        </td>
        <td class="td-decoration-action">
        </td>
        <td class="td-decoration-demonstrate">
            <?= $setSession->get($sessionKey);
            ?>
        </td>
    </tr>
    <tr>
        <td class="td-class-name">
            <span>has</span>
        </td>
        <td class="td-decoration-action"></td>
        <td class="td-decoration-demonstrate">
            <?php
            if (isset($sessionKey) && $setSession->has($sessionKey)) {
                echo 'True';
            }
            ?>
        </td>
    </tr>
    <tr>
        <td class="td-class-name">
            <span>all</span>
        </td>
        <td class="td-decoration-action"></td>
        <td class="td-decoration-demonstrate">
            <?php
            if (isset($sessionKey)) {
                $allSession = $setSession->all();
                if (is_array($allSession)) {
                    foreach ($allSession as $key => $item) {
                        echo $key . ' => ' . $item . '; ';
                    }
                } else {
                    echo $allSession;
                }
            }
            ?>
        </td>
    </tr>
    <tr>
        <td class="td-class-name">
            <span>remove</span>
        </td>
        <td class="td-decoration-action">
            <form action="" method="get">
                <label>Key for remove Session
                    <input type="text" name="session-remove" required pattern="\w*" minlength="1" maxlength="10"
                           placeholder="enter session key">
                </label>
                <button type="submit">Remove Session</button>
                <?php
                if ($request->get('session-remove')) {
                    $sessionRemove = $request->get('session-remove');
                    if (($setSession->has($sessionRemove)) === true) {
                        $setSession->remove($sessionRemove);
                    }
                }

                ?>
            </form>
        </td>
        <td class="td-decoration-demonstrate">
        </td>
    </tr>
    <tr>
        <td class="td-class-name">
            <span>clear</span>
        </td>
        <td class="td-decoration-action">
            <form action="" method="get">
                <label>
                    <input type="text" name="session-clear" hidden>
                </label>
                <button type="submit">Remove Session</button>
                <?php
                if ($request->get('clear')) {
                    $setSession->clear();
                }
                ?>
            </form>
        </td>
        <td class="td-decoration-demonstrate">
        </td>
    </tr>
</table>

</body>
</html>