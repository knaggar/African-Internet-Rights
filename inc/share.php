<?php
/**
 * @package air
 * @since 2.0
 */

function share_buttons() {
    $services = array (
        'facebook' => array (
            'url'  => 'https://www.facebook.com/sharer/sharer.php?u=%1$s',
            'text' => esc_attr(__('Share on Facebook.', 'air' )),
            'icon' => '<i class="fa fa-facebook"></i>'
        ),
        'twitter' => array (
            'url'  => 'http://twitter.com/home/?status=%1$s%%20-%%20%2$s',
            'text' => esc_attr(__('Tweet this post!', 'air' )),
            'icon' => '<i class="fa fa-twitter"></i>'
        ),
        'googleplus' => array (
            'url'  => 'https://plus.google.com/share?url=%1$s',
            'text' => esc_attr(__('Google+1.', 'air' )),
            'icon' => '<i class="fa fa-google-plus"></i>'
        ),
        'email' => array (
           'url'  => 'https://mail.google.com/mail/?view=cm&amp;fs=1&amp;to&amp;su=%1$s&amp;t=%2$s',
            'text' => esc_attr(__('Email.', 'air' )),
            'icon' => '<i class="fa fa-envelope"></i>'
        ),
    );

    $title    = the_title_attribute( array ( 'echo' => FALSE ) );
    $url      = urlencode( get_permalink() );
    $source   = '';

    echo '<ul class="share">';

        foreach ( $services as $name  => $service )

         {echo '<li>';
            $href = sprintf( $service['url'], $url, urlencode( $title ), urlencode( $source ) );
            $genericon = $service['icon'];

            printf(
                '<a href="%1$s" title="%2$s" alt="%2$s">%3$s</a>',
                $href,
                $service['text'],
                $genericon
            );
        echo '</li>';}


    echo '</ul>';
}
