{{-- <x-layout>
    <div class="flex gap-5 justify-center min-h-screen">
        <div class="min-vh-100 w-35 max-w-30 flex flex-col">
            <div class="mt-10 flex justify-center mb-28">
                <img src="{{asset("images/Group 1@2x.png")}}" class="w-2/4"/>
            </div>
            <div class="flex justify-center">
                <img src="{{asset(asset('images/icons8-checked 1.png'))}}" class="w-14"/>
            </div>
            <p>Your password has been updeted successfully</p>
            <a href="/" class="mt-10 text-white bg-green hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 font-bold">Sign in</a>
        </div>
    </div>
</x-layout> --}}

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
                <a href="">VERIFY EMAIL</a>
            </div>
        </div>
    </div>
</body>
</html>
