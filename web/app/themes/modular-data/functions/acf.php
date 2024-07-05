<?php

namespace RFOrigin;

class Acf
{
    protected static $blocks = [
        'mega-menu'
    ];

    public static function init()
    {
        add_action('init', [__CLASS__, 'registerBlocks']);
        add_filter('acf/settings/save_json', [__CLASS__, 'saveJsonLocation']);
        add_filter('acf/settings/load_json', [__CLASS__, 'loadJsonLocation']);
    }

    public static function saveJsonLocation($path)
    {
        return get_template_directory() . '/acf/json';
    }

    public static function loadJsonLocation($paths): array
    {
        unset($paths[0]);
        $paths[] = get_template_directory() . '/acf/json';
        return $paths;
    }

    public static function registerBlocks(): void
    {
        foreach (self::$blocks as $block) {
            register_block_type(get_template_directory() . "/acf/blocks/{$block}");
        }
    }
}

Acf::init();
