<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        .flex {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 10px;
            font-family: 'Inter';
        }
        .center-div {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 10px;
            width: 400px;
            padding-bottom: 0;
            margin-bottom: 0;
        }
        a {
            display: inline-block;
            background-color: #0FBA68;
            text-decoration: none;
            padding: 1rem;
            color: white;
            border-radius: 8px;
            width: 100%;
            text-align: center;
        }
        .verify {
            width: 100%;
            margin-left: 20px;
            margin-right: 20px;
            box-sizing: border-box;
        }
    </style>
    <div class="flex">
        <div class="center-div">
            <h1>Confirmation email</h1>
            <p>click this button to verify your email</p>
            <div class="verify">
                <a href="{{ route('user.verify', $token) }}">VERIFY EMAIL</a>
            </div>
        </div>
    </div>
</body>
</html>
