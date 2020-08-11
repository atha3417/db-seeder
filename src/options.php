<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.1/styles/default.min.css">

    <title>Available Options</title>
</head>

<body>
    <?php
    require_once __DIR__ . '/../vendor/autoload.php';

    $parsedown = new Parsedown();

    $handle = fopen('readme.md', 'r');
    $text = fread($handle, 70000);
    fclose($handle);

    ?>

    <div class="container" style="border: 1px solid #E1E4E8">
        <div class="row">
            <div class="col">
                <div class="mt-3" style="margin: 60px;"><?= $parsedown->text($text); ?></div>
            </div>
        </div>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.1/highlight.min.js"></script>
    <script>
        hljs.initHighlightingOnLoad();
    </script>

</body>

</html>