<?php require base_path('views/partials/header.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

    <div class="flex flex-col items-center">
    <form method="post" class="flex flex-col space-y-4">
        Set name: <input type="text" name="firstName" value="<?= htmlspecialchars($value['firstName']);?>" class="rounded-md px-3 py-1.5">
            <div>
                <?php if (isset($errors['firstName'])) : ?>
                    <?php foreach ($errors['firstName'] as $error) : ?>
                        <p class="text-red-500 text-xs mt-2"><?= $error ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        Set last name: <input type="text" name="lastName" value="<?= htmlspecialchars($value['lastName']);?>" class="rounded-md px-3 py-1.5">
            <div>
                <?php if (isset($errors['lastName'])) : ?>
                    <?php foreach ($errors['lastName'] as $error) : ?>
                        <p class="text-red-500 text-xs mt-2"><?= $error ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
                    </div>
        <div class="m-4 flex flex-col">
            <a href="/" class="rounded-md bg-red-600 m-5 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancel</a>
            <input type="submit" value="Edit" class="flex justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
        </div>
    </form>
</div>

<?php require base_path('views/partials/footer.php') ?>