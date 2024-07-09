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

// Unregister default blocks and styles

wp.domReady( () => {
	wp.blocks.unregisterBlockStyle('core/button', 'fill');
	wp.blocks.unregisterBlockStyle('core/button', 'outline');
});