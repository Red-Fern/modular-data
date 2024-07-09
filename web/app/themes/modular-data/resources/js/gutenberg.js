// Register new styles

/* Button */

wp.blocks.registerBlockStyle('core/button', {
    name: 'white-fill',
    label: 'White Fill',
    isDefault: true
});

wp.blocks.registerBlockStyle('core/button', {
    name: 'white-outline',
    label: 'White Outline'
});

wp.blocks.registerBlockStyle('core/button', {
    name: 'arrow',
    label: 'Arrow'
});

/* Image */

wp.blocks.registerBlockStyle('core/image', {
    name: 'break-out',
    label: 'Break Out'
});

// Unregister default blocks and styles

wp.domReady( () => {
	wp.blocks.unregisterBlockStyle('core/button', 'fill');
	wp.blocks.unregisterBlockStyle('core/button', 'outline');
});