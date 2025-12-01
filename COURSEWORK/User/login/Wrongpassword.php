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
            background: linear-gradient(135deg, #0f2027, #2c5364);
            display:flex;
            align-items:center;
            justify-content:center;
            color:#e6f7ff;
        }

        /* Centered card */
        .message-card{
            background: rgba(255, 255, 255, 0.06);
            width: 90%;
            max-width:420px;
            padding:28px;
            border-radius:12px;
            box-shadow: 0px 6px 18px rgba(15, 32, 39, 0.45);
            text-align:center;
            border:1px solid rgba(255,255,255,0.04);
            backdrop-filter: blur(8px);
        }

        .message-card h1{font-size:1.4rem;margin-bottom:8px;color:#ff6b6b}
        .message-card p{margin-bottom:18px;color:#dbeef6}

        .btn{
            display:inline-block;
            padding:10px 18px;
            border-radius:8px;
            text-decoration:none;
            color:#002a2f;
            background: #00bcd4;
            box-shadow: 0 4px 12px rgba(0, 188, 212, 0.3);
            font-weight:600;
            transition:all .2s ease;
        }
        .btn:hover{
            background: #0097a7;
            transform:translateY(-2px);
            box-shadow:0 6px 16px rgba(0, 188, 212, 0.4);
            text-decoration:none;
            color:#002a2f;
        }

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