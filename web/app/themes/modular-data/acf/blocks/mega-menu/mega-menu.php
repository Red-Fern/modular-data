<div 
    class="mega-menu-block flex items-center order-last | xl:justify-center xl:order-none" 
    x-data="menu"
>
    <nav 
        class="menu-bg fixed top-0 px-sm py-2xl h-screen w-full bg-light-grey z-10 transition-[left] duration-300 | xl:static xl:p-0 xl:h-auto xl:bg-transparent"
        :class="menuOpen ? 'left-0' : 'left-full'"
        x-cloak="mobile"
    >
        <!-- Menu items -->
        <ul class="flex flex-col m-0 p-0 w-full h-full list-none overflow-auto | xl:flex-row">
            <?php foreach (get_field('menu_items') as $menu_item): ?>
                <li 
                    class="border-b border-mid-grey | xl:border-0" 
                    x-data="menuDropdown(<?php echo $menu_item['child_links'] ? 'true' : 'false'; ?>)"
                >
                    <?php if (!is_admin()) : ?>
                        <!-- Menu item -->
                        <a 
                            href="<?php echo ($menu_item['link'] ? $menu_item['link']['url'] : '#'); ?>" 
                            class="link-item <?php echo $menu_item['child_links'] ? 'has-items' : ''; ?> relative flex justify-between items-center gap-4 py-4 text-2xl | xl:gap-1 xl:px-2 xl:py-3.5 xl:text-sm | 2xl:px-3 2xl:py-5 2xl:text-base" 
                            :class="showing ? 'active' : ''"
                            x-on:click="toggle"
                        >
                            <?php echo $menu_item['label']; ?>

                            <?php if ($menu_item['child_links']): ?>
                                <svg xmlns="http://www.w3.org/2000/svg" class="transition-colors | max-xl:-rotate-90 max-xl:w-[31px] max-xl:h-[30px]" width="16" height="17" viewBox="0 0 16 17" fill="none">
                                    <path d="M4 6.5L8 10.5L12 6.5" stroke="currentColor" stroke-linecap="square" stroke-linejoin="round"/>
                                </svg>
                            <?php endif; ?>
                        </a>

                        <!-- Mega menu -->
                        <?php if ($menu_item['child_links']): ?>
                            <div
                                class="menu-bg fixed top-0 left-0 h-screen w-full py-2xl px-sm pb-2xl bg-black text-md z-10 transition-[left,visible,opacity] duration-300 | xl:absolute xl:top-full xl:left-0 xl:pt-lg xl:pb-xl xl:h-auto xl:text-sm"
                                x-show="showing"
                                x-transition:enter-start="left-full xl:invisible xl:opacity-0"
                                x-transition:enter-end="left-0 xl:visible xl:opacity-100"
                                x-transition:leave-start="left-0 xl:visible xl:opacity-100"
                                x-transition:leave-end="left-full xl:invisible xl:opacity-0"
                                x-cloak
                                @click.away="hide"
                            >
                                <div class="container wide | max-xl:p-0 max-xl:h-full max-xl:overflow-auto">
                                    <div class="xl:flex xl:gap-xl">
                                        <button
                                            class="flex items-center gap-4 py-4 w-full bg-transparent text-dark-grey text-xl | xl:hidden"
                                            x-on:click="hide"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                                <path d="M18.75 22.5L11.25 15L18.75 7.5" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/>
                                            </svg>

                                            <span>Back</span>
                                        </button>

                                        <div class="hidden w-[28%] | xl:block">
                                            <div class="mb-sm text-md"><?php echo $menu_item['child_title']; ?></div>

                                            <?php echo $menu_item['child_text']; ?>
                                        </div>

                                        <ul class="m-0 p-0 border-t border-mid-grey list-none | xl:grow xl:pr-xl xl:border-0 xl:space-y-sm <?php echo count($menu_item['child_links']) > 3 ? 'xl:columns-2 xl:gap-xl' : '' ?>">
                                            <?php foreach ($menu_item['child_links'] as $child_item): ?>
                                                <?php if ($child_item['link']): ?>
                                                    <li class="border-b border-mid-grey <?php echo count($menu_item['child_links']) > 3 ? 'my-class' : ''; ?> | xl:border-0">
                                                        <a href="<?php echo $child_item['link']['url']; ?>" class="block py-4 text-2xl | xl:p-0 xl:text-xl">
                                                            <?php echo $child_item['link']['title']; ?>
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <!-- Static editor version of menu item -->
                        <div class="px-3 py-5">
                            <?php echo $menu_item['label']; ?>
                        </div>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>   

    <!-- Mobile menu toggle -->
    <button 
        class="relative bg-transparent z-20 | xl:hidden" 
        <?php if (!is_admin()) : ?>
            x-on:click="toggle"
        <?php endif; ?>
    >
        <svg x-show="!menuOpen" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
            <path d="M3.5 14H24.5M3.5 7H24.5M3.5 21H16.3333" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/>
        </svg>

        <svg x-cloak x-show="menuOpen" xmlns="http://www.w3.org/2000/svg" width="28" height="29" viewBox="0 0 28 29" fill="none">
            <path d="M21 7.69287L7 21.6929M7 7.69287L21 21.6929" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/>
        </svg>
    </button>
</div>