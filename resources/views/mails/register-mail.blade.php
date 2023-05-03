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
    <div class="flex" style="margin: 0 auto;
    flex-direction: column;
    gap: 10px;
    font-family: 'Inter';">
        <div class="center-div" style="display: block;
        margin: 0 auto;
        width: 400px;
        padding-bottom: 0;
        margin-bottom: 0;">
            <h1 style="padding: 1rem;
            color: white;
            border-radius: 8px;
            width: 100%;
            text-align: center;">Confirmation email</h1>
            <p style="padding: 1rem;
            color: white;
            border-radius: 8px;
            width: 100%;
            text-align: center;">click this button to verify your email</p>
            <div class="verify" style="width: 100%;
            margin-left: 20px;
            margin-right: 20px;
            box-sizing: border-box;">
                <a href="{{ route('user.verify', $token) }}" style="display: inline-block;
                background-color: #0FBA68;
                text-decoration: none;
                padding: 1rem;
                color: white;
                border-radius: 8px;
                width: 100%;
                text-align: center;">VERIFY EMAIL</a>
            </div>
        </div>
    </div>
</body>
</html>
