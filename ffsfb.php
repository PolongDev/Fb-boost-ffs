<?php
# MODIFIED BY KEN

require_once 'session_manager.php';

if (!isLogin()) {
    header('Location: key.php');
    # if incorrect password login back to key.php
}

if (isset($_POST['submit'])) {
    $uid = $_POST['uid']; #get uid
    $accessTokens = [
        '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',
        # Add more tokens as needed
    ];

    $followLimit = isset($_POST['follow_limit']) ? intval($_POST['follow_limit']) : 0;
    $followDelay = isset($_POST['follow_delay']) ? intval($_POST['follow_delay']) : 0;

    function makeHttpRequest($method, $url, $headers = [], $data = null) {
        $context = [
            'http' => [
                'method' => $method,
                'header' => $headers,
                'content' => $data,
            ],
        ];

        $context = stream_context_create($context);
        return file_get_contents($url, false, $context);
    }

    function followFacebookAccount($uid, $accessToken) {
        $apiUrl = "https://graph.facebook.com/v18.0/{$uid}/subscribers";
        $headers = [
            'Authorization: Bearer ' . $accessToken,
        ];

        try {
            $response = makeHttpRequest('POST', $apiUrl, $headers);
            $responseData = json_decode($response, true);

            if (isset($responseData['error'])) {
                echo "Error: " . $responseData['error']['message'];
            } elseif (isset($responseData['success']) && $responseData['success'] === true) {
                echo "Successfully followed account {$uid}";
            } else {
                echo "Unexpected response from the server";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    foreach ($accessTokens as $accessToken) {
        if ($followLimit > 0) {
            if ($followLimit <= 0) {
                echo "Follow limit reached. Stopping further follows.";
                break;
            }
            $followLimit--;
        }

        followFacebookAccount($uid, $accessToken);

        if ($followDelay > 0) {
            sleep($followDelay); // Add a delay in seconds
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.19/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
    <title>Facebook Boost Followers</title>

    <style>
        body {
            font-family: "Montserrat", sans-serif;
            text-align: center;
        }

        footer {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            bottom: 0;
            left: 0;
            margin-top: 10px;
            z-index: 9999;
            width: 100%;
            height: 4rem;
            color: red;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body data-theme="dark" style="height:1000px;">

    <form method="POST">

        <center>
            <br><br>
            <img src="https://i.ibb.co/2Pp8bFp/1706450143442.jpg" width="120px" height="120px" style="margin-top:10px; border-radius: 50%; border:1px solid white;">
        </center>
        <div class="">
            <div class="hero-content flex-col lg:flex-row-reverse">
                <div class="text-center lg:text-left">
                    <h1 class="text-5xl font-bold">Facebook ffs</h1>
                </div>
                <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                    <form class="card-body">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Facebook UID</span>
                            </label>
                            <input type="text" placeholder="Working Page/Profile" class="input input-bordered" required name="uid" />
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Follow Limit</span>
                            </label>
                            <input type="number" placeholder="0 for unlimited" class="input input-bordered" name="follow_limit" />
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Follow Delay (seconds)</span>
                            </label>
                            <input type="number" placeholder="0 for no delay" class="input input-bordered" name="follow_delay" />
                        </div>
                        <div class="form-control mt-6">
                            <input type="submit" value="FOLLOW" name="submit" class="btn btn-active" style="border:1px solid grey;">
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>

        <footer class="footer footer-center p-4 bg-base-300 text-base-content">
            <aside>
                <p>Copyright © 2024 - Author : Kenneth Gregorio Perez</p>
            </aside>
        </footer>
    </form>
</body>

</html>
