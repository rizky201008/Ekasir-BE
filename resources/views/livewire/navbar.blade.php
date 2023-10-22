<div>
    <nav class="w-full fixed md:position bg-white flex flex-wrap md:flex-nowrap justify-between py-4 px-8 z-10">
        <div class="">
            <a href="/" class="font-bold text-xl">Ekasir</a>
        </div>
        <span
            class="material-symbols-outlined icon text-[24px] text-black hover:text-sky-500 flex items-center cursor-pointer md:hidden"
            @click="$dispatch('nav-clicked')">
            menu
        </span>
        <ul
            class="{{ $navActive ? 'flex' : 'hidden' }} md:flex flex-col w-full md:justify-end md:flex-row list-none items-center gap-[2rem]">
            <li>
                <a wire:navigate
                    class="text-slate-950 hover:text-sky-500 border-b-2 border-sky-500 border-opacity-0 hover:border-b-2 py-2 hover:border-sky-500 transition-all duration-300"
                    href="/">Beranda</a>
            </li>
            <li>
                <a wire:navigate
                    class="text-slate-950 hover:text-sky-500 border-b-2 border-sky-500 border-opacity-0 hover:border-b-2 py-2 hover:border-sky-500 transition-all duration-300"
                    href="/categories">Kategori</a>
            </li>
            <li>
                <a wire:navigate
                    class="text-slate-950 hover:text-sky-500 border-b-2 border-sky-500 border-opacity-0 hover:border-b-2 py-2 hover:border-sky-500 transition-all duration-300"
                    href="/login">Masuk</a>
            </li>
            <li>
                <a wire:navigate
                    class="text-slate-950 hover:text-sky-500 border-b-2 border-sky-500 border-opacity-0 hover:border-b-2 py-2 hover:border-sky-500 transition-all duration-300"
                    href="/register">Daftar</a>
            </li>
        </ul>
    </nav>
</div>
