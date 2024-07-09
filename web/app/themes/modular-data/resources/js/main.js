import './alpine';

// Size break out images

const breakOutImages = document.querySelectorAll('.is-style-break-out');

function adjustImageWidth() {
    const windowWidth = window.innerWidth;

    breakOutImages.forEach(image => {
        if (windowWidth < 782) {
            image.style.width = '';
            image.style.left = '';
            return;
        }

        const column = image.closest('.wp-block-column');
        const columnIndex = Array.from(column.parentNode.children).indexOf(column);
        const inLeftCol = columnIndex === 0;

        const columnOffset = column.offsetLeft;
        const columnWidth = column.offsetWidth;

        if (inLeftCol) {
            image.style.width = `calc(100% + ${columnOffset}px)`;
            image.style.left = `-${columnOffset}px`;
        } else {
            const extraWidth = windowWidth - (columnOffset + columnWidth);
            image.style.width = `calc(100% + ${extraWidth}px)`;
            image.style.left = '';
        }
    });
}

window.addEventListener('resize', adjustImageWidth);

adjustImageWidth();