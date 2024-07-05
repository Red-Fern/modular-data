import Alpine from 'alpinejs';

import menu from './alpine/menu';
import menuDropdown from "./alpine/menuDropdown";

window.Alpine = Alpine;

Alpine.data('menu', menu);
Alpine.data('menuDropdown', menuDropdown);

Alpine.start();