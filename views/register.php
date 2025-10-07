<?php require base_path('views/partials/header.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Register for a new account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form action="/register" method="POST" class="space-y-6">
             <div>
                <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
                <div class="mt-2">
                <input id="name" name="name" autocomplete="name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Name" />
                </div>
            </div>
                <?php if (isset($errors['name'])) : ?>
                    <?php foreach ($errors['name'] as $error) : ?>
                        <p class="text-red-500 text-xs mt-2"><?= $error ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
            <div>
                <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                <div class="mt-2">
                <input id="email" name="email" autocomplete="email" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Email" />
                </div>
            </div>
                <?php if (isset($errors['email'])) : ?>
                    <?php foreach ($errors['email'] as $error) : ?>
                        <p class="text-red-500 text-xs mt-2"><?= $error ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
            <div>
                <div class="flex items-center justify-between">
                <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                </div>
                <div class="mt-2">
                <input id="password" type="password" name="password" autocomplete="current-password" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Password" />
                </div>
            </div>
                <?php if (isset($errors['passwordcheck'])) : ?>
                    <?php foreach ($errors['passwordcheck'] as $error) : ?>
                        <p class="text-red-500 text-xs mt-2"><?= $error ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
            </div>
            <div>
                <a href="/" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
            </div>
            </form>
        </div>
    </div>
</div>

<?php require base_path('views/partials/footer.php') ?>