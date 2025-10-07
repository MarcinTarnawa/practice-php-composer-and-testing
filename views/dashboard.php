<?php require base_path('views/partials/header.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

    <?php $controller->render($columns); ?>
            <div>
                <?php if (isset($errors['err'])) : ?>
                    <?php foreach ($errors['err'] as $error) : ?>
                        <p class="text-red-500 text-xs mt-2"><?= $error ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
<?php require base_path('views/partials/footer.php') ?>