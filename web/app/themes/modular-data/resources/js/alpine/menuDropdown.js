export default (hasItems = false) => ({
    showing: false,
    hasItems: hasItems,
    header: document.querySelector('header.wp-block-template-part'),
    init() {
        if (this.isDesktop()) {
            this.showing = false;
        }

        window.addEventListener('resize', () => {
            this.checkVisible();
        });
    },
    toggle(e) {
        if (this.hasItems) {
            e.preventDefault();

            this.showing = !this.showing;

            if (this.showing) {
                this.header.classList.add('menu-open');
            } else {
                this.header.classList.remove('menu-open');
            }
        }
    },
    hide(e) {
        if (!e.target.classList.contains('has-items')) {
            this.header.classList.remove('menu-open');
        }

        this.showing = false;
    },
    checkVisible() {
        this.header.classList.remove('menu-open');
        
        if (this.isDesktop()) {
            this.showing = false;
        }
    },
    isDesktop() {
        return window.innerWidth > 1279;
    }
});
