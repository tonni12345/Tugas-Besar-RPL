<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Resto Unikom</title>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f7f7f7; /* Changed background color to a dark shade */
        }
        .container {
            width: 100%;
            max-width: 1200px;
            display: flex;
            align-items: center;
            background-color: #495057; /* Changed container background to a lighter shade */
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
            border: 20px solid #adb5bd; /* Changed border color to a grey shade */
        }
        .left {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .left img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .right {
            flex: 1;
            padding: 40px;
        }
        .right h1 {
            font-size: 48px;
            color: #ffffff; /* Changed text color to white */
            margin-bottom: 20px;
        }
        .right p {
            font-size: 16px;
            line-height: 1.6;
            color: #ced4da; /* Changed paragraph text color to a light grey */
            margin-bottom: 30px;
        }
        .right button {
            background-color: #6c757d; /* Changed button background color to a grey shade */
            color: #ffffff;
            padding: 15px 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .right button:hover {
            background-color: #adb5bd; /* Changed button hover color to a lighter grey */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left">
            <img src="resto1.jpeg" alt="Restaurant Food">
        </div>
        <div class="right">
            <h1>Selamat Datang</h1>
            <h1>Di</h1>
            <h1>Resto Unikom</h1>
            <p>Nikmati pengalaman kuliner terbaik dengan pelayanan istimewa di Resto Unikom. Kami menyajikan berbagai macam masakan lezat yang akan memanjakan lidah Anda.</p>
        </div>
    </div>
</body>
</html>
