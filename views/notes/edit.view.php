<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <form method="POST" action="/note">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <div class="space-y-12">
                    <div class="border-b border-white/10 pb-12">


                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


                            <div class="col-span-full">
                                <label for="body" class="block text-sm/6 font-medium text-white">Description</label>
                                <div class="mt-2">
                                    <textarea id="body" name="body" rows="3"
                                              class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"><?= $note['body'] ?></textarea>
                                </div>
                                <p class="mt-3 text-sm/6 text-gray-400">Edit your note.</p>
                                <p class="mt-3 text-sm/6 text-red-400">
                                    <?php if (isset($errors['body'])) : ?>
                                        <?= $errors['body'] ?>
                                    <?php endif; ?>
                                </p>
                            </div>


                        </div>
                    </div>


                </div>
                <div class="px-4 py-3 text-right sm:px-6 flex gap-x-4 justify-end items-center">


                    <a
                            href="/notes"
                            class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-500"
                    >
                        Cancel
                    </a>

                    <button
                            type="submit"
                            class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"
                    "
                    >
                    Update
                    </button>
                    <button type="button"
                            class="rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500"
                            onclick="document.querySelector('#delete-form').submit()">Delete
                    </button>
                </div>
                <!--                <div class="mt-6 flex items-center gap-x-6">-->
                <!---->
                <!--                    <button type="submit"-->
                <!--                            class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">-->
                <!--                        Update-->
                <!--                    </button>-->
                <!--                </div>-->

            </form>

            <form id="delete-form" class="hidden" method="POST" action="/note">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <!--                <button type="submit"-->
                <!--                        class="rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500">-->
                <!--                    Delete-->
                <!--                </button>-->
            </form>

        </div>
    </main>

<?php require base_path('views/partials/footer.php') ?>