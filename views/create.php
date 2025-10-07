<?php require base_path('views/partials/header.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

   <div class="flex flex-col items-center">
    <form method="POST" class="flex flex-col space-y-4">
            Set name: <input type="text" name="firstName" value="Your Name" class="rounded-md px-3 py-1.5">
                <div>
                    <?php if (isset($errors['firstName'])) : ?>
                        <?php foreach ($errors['firstName'] as $error) : ?>
                            <p class="text-red-500 text-xs mt-2"><?= $error ?></p>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            Set last name: <input type="text" name="lastName" value="Last Name" class="rounded-md px-3 py-1.5">
                <div>
                    <?php if (isset($errors['lastName'])) : ?>
                        <?php foreach ($errors['lastName'] as $error) : ?>
                            <p class="text-red-500 text-xs mt-2"><?= $error ?></p>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div>
                    <?php foreach ($rules as $rul => $role) : ?>
                        <p class="text-red-500 text-xs mt-2">Rules are <?= $rul . " = "  .  $role ?></p>
                    <?php endforeach; ?>
                </div>
            <div class="m-4 flex flex-col">
                <a href="/" class="text-center rounded-md bg-red-600 m-5 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancel</a>
                <input type="submit" value="Add" class="flex justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            </div>
    </form>
</div>

<?php require base_path('views/partials/footer.php') ?>