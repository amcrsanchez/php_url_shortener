<?php
require_once("functions.php");
require_once("config.php");

$host = $config->host;
$url = $_POST['url'] ?? "";
$url_pattern = "/^[http|https]+:\/\/.+$/";
if (!preg_match($url_pattern, $url)) {
    header('Location:/error.php?http_status_code=400');
    die();
}
$uri = get_uri_from_redirect($url);

if($uri == null){
    $uri = create_map_entry($url);
}

$shortened_url = $host."/r/".$uri;
?>
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
        <h2>Your shortened URL is ready!</h2>
        <div class="shortened-url-container">
            <a href="<?php echo $shortened_url?>" target="_blank" rel="noopener noreferrer">
                <?php echo $shortened_url?>
            </a>
            <div class="copy-container">
                <button onclick="copyUrlToClipboard(this, '<?php echo $shortened_url ?>')">Copy</button>
            </div>
        </div>
        <div class="back-home-container">
            <a href="/">Back to home</a>
        </div>
    </div>
    <script>
        function copyUrlToClipboard(element, url) {
            navigator.clipboard.writeText(url);
            element.innerHTML = "Copied!"
            setTimeout(() => {
                element.innerHTML = "Copy"
            }, 4000);
        }
    </script>
</body>
</html>