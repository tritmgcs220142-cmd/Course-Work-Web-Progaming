<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wrong Password</title>
    <style>
        /* Page reset */
        *{box-sizing:border-box;margin:0;padding:0}
        html,body{height:100%}

        /* Linear gradient background */
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(120deg,#ff6a88 0%, #ff9472 50%, #ffa69e 100%);
            display:flex;
            align-items:center;
            justify-content:center;
            color:#111;
        }

        /* Centered card */
        .message-card{
            background: rgba(255,255,255,0.92);
            width: 90%;
            max-width:420px;
            padding:28px;
            border-radius:12px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.18);
            text-align:center;
            border:1px solid rgba(0,0,0,0.04);
        }

        .message-card h1{font-size:1.4rem;margin-bottom:8px;color:#d9435e}
        .message-card p{margin-bottom:18px;color:#333}

        .btn{
            display:inline-block;
            padding:10px 18px;
            border-radius:8px;
            text-decoration:none;
            color:#fff;
            background: linear-gradient(90deg,#6dd3ff,#00b4ff);
            box-shadow: 0 6px 14px rgba(0,180,255,0.22);
            font-weight:600;
            transition:transform .12s ease,box-shadow .12s ease,opacity .12s ease;
        }
        .btn:hover{transform:translateY(-3px);box-shadow:0 18px 40px rgba(0,180,255,0.18)}

        @media (max-width:420px){
            .message-card{padding:18px}
        }
    </style>
</head>
<body>
    <main class="message-card">
        <h1>Wrong Password</h1>
        <p>The password you entered is incorrect. Please try again or return to the login page.</p>
        <a class="btn" href="Login.html">Back to Login</a>
    </main>
</body>
</html>