<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>

        .form-group1 {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group1 label {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        .form-group1 input,
        .form-group1 select {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .form-group1 input:focus,
        .form-group1 select:focus {
            border-color: #4A90E2;
            outline: none;
        }

        .form-group1 svg {
            width: 16px;
            height: 16px;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/resources/css/app.css') }}">
</head>

@yield('content')

</html>
