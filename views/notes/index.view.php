<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <ul>
                <?php foreach ($notes as $note) : ?>
                    <li class="text-white underline list-disc mb-5 pb-5 border-b border-gray-800">
                        <a href="/note?id=<?= $note['id'] ?>">
                            <?= htmlspecialchars($note['body']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <p class="mt-10"><a href="/notes/create" class="underline text-white font-bold">Create New Note</a></p>
        </div>
    </main>

<?php require base_path('views/partials/footer.php') ?>