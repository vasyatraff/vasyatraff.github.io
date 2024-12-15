<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сайт с кнопкой</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }
        button {
            padding: 15px 30px;
            font-size: 18px;
            font-weight: bold;
            color: white;
            background: linear-gradient(45deg, #4CAF50, #81C784);
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        button:hover {
            background: linear-gradient(45deg, #45a049, #66BB6A);
            transform: scale(1.05);
        }
        button:active {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            transform: scale(0.95);
        }
    </style>
</head>
<body>
    <button onclick="window.location.href='https://www.google.com';">Перейти на Google</button>
</body>
</html>
