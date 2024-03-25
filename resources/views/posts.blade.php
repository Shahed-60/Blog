<!DOCTYPE html>
<link rel="stylesheet" href="css/app.css">
<title>My blog</title>

<body>
    <?php foreach ($posts as $post) : ?>
    <article>
        <?= $post ?>
    </article>
    <?php endforeach; ?>
</body>

</html>
