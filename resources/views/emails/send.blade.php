<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
    <style>
        /* Add your custom CSS styles for the email template here */
        /* Example CSS styles for a simple and clean email template */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
        }

        p {
            color: #555555;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>{{ $subject }}</h1>
        <p>{{ $emailMessage }}</p>
    </div>
</body>

</html>
