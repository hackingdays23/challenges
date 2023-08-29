<!DOCTYPE html>
<html>
<head>
    <title>One Potato, two potatoes</title>
    <style>
        body {
            background-color: #000;
            color: #0ff; /* Cor de texto em tons de ciano (cyberpunk) */
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            color: #f0f; /* Cor de título em tons de magenta (cyberpunk) */
        }
        .container {
            background-color: #111; /* Fundo escuro */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 255, 0, 0.5);
            margin: 20px auto;
            max-width: 800px;
            overflow: hidden;
        }
        label, input, button {
            display: block;
            margin: 10px 0;
        }
        input[type="text"] {
            background-color: #222; /* Cor de fundo mais escura */
            color: #0ff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 100%;
        }
        button {
            background-color: #f0f; /* Cor de botão em tons de magenta (cyberpunk) */
            color: #0ff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #00f; /* Cor de botão ao passar o mouse (azul) */
        }
        iframe {
            border: none;
            width: 100%;
            height: 600px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Search</h1>
        <form method="GET">
            <label for="url">Text:</label>
            <input type="text" name="url" id="url">
            <button type="submit">Search</button>
        </form>
        <div>
            <?php
            if (isset($_GET['url'])) {
                $url = $_GET['url'];
                echo "<h2>Content:</h2>";
                echo "<iframe src='$url'></iframe>";
            }
            ?>
        </div>
    </div>
</body>
</html>
