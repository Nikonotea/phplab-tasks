<?php
declare(strict_types=1);
require_once __DIR__ . '/classes/Request.php';

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
    <caption>home work 6 - oop - class request</caption>
    <tr>
        <th id="table-col-name">methods</th>
        <th id="table-col-name">form</th>
        <th id="table-col-name">result</th>
    </tr>
    <tr>
        <td class="td-class-name">
            <span>get</span>
        </td>
        <td>
            <form action="" method="get">
                <label>Value for GET request
                    <input type="text" name="get-page" required pattern="[0-9]*" minlength="1" maxlength="3"
                           placeholder="enter only numbers">
                </label>
                <button type="submit">Submit</button>
            </form>
        </td>
        <td class="td-decoration-result">
            <?php
            $request = new Request();
            $getRequest = $request->query('get-page');
            echo 'This is POST request with <strong>key</strong> = post-page and <strong>value</strong> = ' . $getRequest;
            ?>
        </td>
    </tr>
    <tr>
        <td class="td-class-name">
            <span>post</span>
        </td>
        <td>
            <form action="" method="post">
                <label>Value for POST request
                    <input type="text" name="post-page" required pattern="[0-9]*" minlength="1" maxlength="10"
                           placeholder="enter only numbers">
                </label>
                <button type="submit">Submit</button>
            </form>
        </td>
        <td class="td-decoration-result">
            <?php
            $postRequest = $request->post('post-page');
            echo 'This is POST request with <strong>key</strong> = post-page and <strong>value</strong> = ' . $postRequest; ?>
        </td>
    </tr>
    <tr>
        <td class="td-class-name">
            <span>get + post</span>
        </td>
        <td>
            Should be entered above
        </td>
        <td class="td-decoration-result">
            <?php
            if (isset($getRequest) && isset($postRequest) || isset($postRequest)) {
                $key = 'post-page';
            } elseif (isset($getRequest)) {
                $key = 'get-page';
            } else {
                $key = null;
            }

            echo $request->get($key);
            ?>
        </td>
    </tr>
    <tr>
        <td class="td-class-name">
            <span>all</span>
        </td>
        <td>
            Should be entered above
        </td>
        <td class="td-decoration-result">
            <?php
            if (isset($key)) {
                $allRequests = $request->all();
                if (is_array($allRequests)) {
                    foreach ($allRequests as $key => $item) {
                        echo $key . ' => ' . $item . '; ';
                    }
                } else {
                    echo $allRequests;
                }
            }
            ?>
        </td>
    </tr>
    <tr>
        <td class="td-class-name">
            <span>has</span>
        </td>
        <td>
            Should be entered above
        </td>
        <td class="td-decoration-result">
            <?php
            if (isset($key) && $request->has($key)) {
                echo 'True';
            }
            ?>
        </td>
    </tr>
    <tr>
        <td class="td-class-name">
            <span>ip</span>
        </td>
        <td>
            -
        </td>
        <td class="td-decoration-result">
            <?= $request->ip(); ?>
        </td>
    </tr>
    <tr>
        <td class="td-class-name">
            <span>useragent</span>
        </td>
        <td>
            -
        </td>
        <td class="td-decoration-result">
            <?= $request->userAgent(); ?>
        </td>
    </tr>
</table>

</body>
</html>