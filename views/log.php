<?php require base_path('views/partials/header.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

  <?php $controller->render($columns, false); ?>

<?php require base_path('views/partials/footer.php') ?>