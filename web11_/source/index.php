<!DOCTYPE html>
<html>
<head>
    <title>X? I heard a whistle</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #111;
            color: #f00; /* Vermelho Neon */
        }
        .container {
            background-color: #000;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 255, 0, 0.5);
        }
        h1, h3 {
            color: #f00; /* Vermelho Neon */
        }
        .form-control {
            background-color: #222;
            color: #f00; /* Vermelho Neon */
        }
        .btn-primary {
            background-color: #f00; /* Vermelho Neon */
            border-color: #0ff;
        }
        .btn-primary:hover {
            background-color: #0ff;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Be Brave, don't give up ;)</h1>
        <h2 class="text-center">Talk to me</h1>
        <form method="GET" class="text-center">
            <div class="form-group">
                <input type="text" name="code" class="form-control" placeholder="Text">
            </div>
            <button type="submit" class="btn btn-primary">Get evaluation</button>
        </form>
        <div class="mt-4">
            <?php
            if (isset($_GET['code'])) {
                $code = $_GET['code'];
                
                // Impede o armazenamento em cache da página pelo navegador
                header("Cache-Control: no-store, must-revalidate");
                
                echo "<h3>It's what I really think:</h3>";
                eval($code);
            }
            ?>
        </div>
    </div>
</body>
</html>
