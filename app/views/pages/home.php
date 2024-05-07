<!-- Header -->
<?php require __PATH_APP__ . '/views/inc/header.php'; ?>
<!--// Header -->

<h2>Vista home</h2>
<p>Title: <?php echo $datos['title']; ?></p>
<p>PATH_APP: <?php echo __PATH_APP__; ?></p>
<p>URL_APP: <?php echo __URL_APP__; ?></p>
<p>NAME_APP: <?php echo __NAME_APP__; ?></p>

<h4>Posts</h4>
<?php foreach ($datos['posts'] as $post) { ?>
    <li><?php echo $post->title ?></li>
    <?php }
?>

<!-- Footer -->
<?php require __PATH_APP__ . '/views/inc/footer.php'; ?>
<!--// Footer -->
