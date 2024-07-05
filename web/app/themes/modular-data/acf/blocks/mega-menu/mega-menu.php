<div 
    class="navigation-block flex items-center order-last | lg:grow lg:order-none" 
    x-data="menu"
>
    <nav 
        class="w-full"
        :class="menuOpen ? 'visible opacity-100' : 'invisible opacity-0'"
        x-cloak="mobile"
    >
        <ul class="absolute top-full left-0 flex flex-col m-0 p-0 h-[calc(100vh-100%)] w-full bg-light-grey list-none z-10 overflow-auto | lg:static lg:flex-row lg:h-auto lg:bg-transparent">
            <?php foreach (get_field('menu_items') as $menu_item): ?>
                <li 
                    class="group <?php echo str_replace(' ', '-', strtolower($menu_item['label'])); ?> border-b border-mid-grey | lg:border-0" 
                    x-data="menuDropdown(<?php echo $menu_item['child_links'] ? 'true' : 'false'; ?>)"
                >
                    <?php if (!is_admin()) : ?>
                        <!-- Menu item -->
                        <a 
                            href="<?php echo ($menu_item['link'] ? $menu_item['link']['url'] : '#'); ?>" 
                            class="link-item <?php echo $menu_item['child_links'] ? 'has-items' : ''; ?> flex justify-between items-center px-sm py-5 font-medium | lg:px-3 lg:font-normal" 
                            x-on:click="toggle"
                        >
                            <?php echo $menu_item['label']; ?>

                            <?php if ($menu_item['child_links']): ?>
                                <svg xmlns="http://www.w3.org/2000/svg" class="lg:hidden" width="16" height="16" fill="none">
                                    <path fill="#000" d="M11.06 5.727 8 8.78 4.94 5.727l-.94.94 4 4 4-4-.94-.94Z" opacity=".5"/>
                                </svg>
                            <?php endif; ?>
                        </a>

                        <!-- Mega menu -->
                        <?php if ($menu_item['child_links']): ?>
                            <div
                                class="w-full bg-light-grey text-md overflow-x-clip z-10 transition duration-500 | lg:absolute lg:top-full lg:left-0 lg:py-lg lg:bg-light-grey lg:shadow-lg"
                                x-cloak
                                x-show="showing"
                                @click.away="hide"
                            >
                                <div class="container wide | max-lg:p-0">
                                    <div class="lg:flex lg:gap-[10%]">
                                        <?php echo $menu_item['child_title']; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <!-- Static editor version of menu item -->
                        <div class="link-item px-3 py-5">
                            <?php echo $menu_item['label']; ?>
                        </div>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>   

    <!-- Mobile menu toggle -->
    <button 
        class="py-5 bg-transparent z-20 | lg:hidden" 
        <?php if (!is_admin()) : ?>
            x-on:click="toggle"
        <?php endif; ?>
    >
        <!-- Mobile menu open -->
        <svg x-show="!menuOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
            <path d="M3 18H21V16H3V18ZM3 13H21V11H3V13ZM3 6V8H21V6H3Z"></path>
        </svg>

        <!-- Mobile menu close -->
        <svg x-cloak x-show="menuOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </button>
</div>