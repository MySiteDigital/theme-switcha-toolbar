<div id="theme-switcha-toolbar">
    <div id="fixed-menu">
        <?php
            echo wp_nav_menu( 
                [
                    'menu' => 'fixed-menu',
                    'container' => false
                ] 
            );
        ?>
        <button id="theme-switcha-toggle">
            Switch Theme
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20" fill="white">
                <rect x="0" fill="none" width="20" height="20"/>
                <g>
                    <path d="M14.48 11.06L7.41 3.99l1.5-1.5c.5-.56 2.3-.47 3.51.32 1.21.8 1.43 1.28 2.91 2.1 1.18.64 2.45 1.26 4.45.85zm-.71.71L6.7 4.7 4.93 6.47c-.39.39-.39 1.02 0 1.41l1.06 1.06c.39.39.39 1.03 0 1.42-.6.6-1.43 1.11-2.21 1.69-.35.26-.7.53-1.01.84C1.43 14.23.4 16.08 1.4 17.07c.99 1 2.84-.03 4.18-1.36.31-.31.58-.66.85-1.02.57-.78 1.08-1.61 1.69-2.21.39-.39 1.02-.39 1.41 0l1.06 1.06c.39.39 1.02.39 1.41 0z"/>
                </g>
            </svg>
        </button>
    </div>
    <?php echo do_shortcode( '[theme_switcha_thumbs style="true"]' ); ?>
</div>