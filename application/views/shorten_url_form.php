<!DOCTYPE html>
<html>
<head>
    <title>Shorten URL</title>
</head>
<body>
    <h1>Shorten a URL</h1>
    <form action="<?php echo site_url('shortener/shorten'); ?>" method="post">
        <input type="url" name="original_url" placeholder="Enter the URL" required>
        <button type="submit">Shorten</button>
    </form>

    <h4> Product by <a href="https://medhatech.in" target="_blank"> Medha Tech</a> </h4>
</body>
</html>
