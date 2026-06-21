<nav class="bg-gray-800/50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="shrink-0">
                    <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                         alt="Your Company" class="size-8"/>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="/" aria-current="page"
                           class="<?= urlIs('/') ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?> rounded-md px-3 py-2 text-sm font-medium">Home</a>
                        <?php if ($_SESSION['user'] ?? false) : ?>
                            <a href="/notes"
                               class="<?= urlIs('/notes') ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?> rounded-md px-3 py-2 text-sm font-medium">Notes</a>
                        <?php endif; ?>
                        <a href="/about"
                           class="<?= urlIs('/about') ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?> rounded-md px-3 py-2 text-sm font-medium">About</a>
                        <a href="/contact"
                           class="<?= urlIs('/contact') ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?> rounded-md px-3 py-2 text-sm font-medium">Contact</a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <?php if ($_SESSION['user'] ?? false): ?>
                        <p class="text-gray-300"><?= $_SESSION['user']['name'] ?></p>
                        <img src="/img/user-av-1.jpeg" alt=""
                             class="size-8 rounded-full outline -outline-offset-1 outline-white/10"/>
                        <form action="/session" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="text-white">Logout</button>
                        </form>
                    <?php else : ?>
                        <a href="/register"
                           class="<?= urlIs('/register') ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?> rounded-md px-3 py-2 text-sm font-medium">Register</a>
                        <a href="/login"
                           class="<?= urlIs('/login') ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?> rounded-md px-3 py-2 text-sm font-medium">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</nav>