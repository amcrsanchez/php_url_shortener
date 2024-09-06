<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
</head>
<body>
    <div class="container">
        <h1>URL Shortener</h1>
        <h2>Paste your url below</h2>
        <form action="./shorten.php" method="post" class="form">
            <input type="url" name="url" class="url-input" placeholder="url to shorten" required="required">
            <input type="submit" value="shorten" class="shorten-btn">
        </form>
    </div>
</body>
</html>
