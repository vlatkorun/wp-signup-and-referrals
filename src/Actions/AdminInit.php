<?php

namespace WPSR\Actions;

use WPSR\Settings;

class AdminInit extends AbstractAction
{
    protected $name = 'admin_init';
    protected $priority = 10;
    protected $argumentsNumber = 1;

    /**
     * Restrict access to the administration screens.
     *
     * Only administrators will be allowed to access the admin screens,
     * all other users will be automatically redirected to the front of
     * the site instead.
     *
     * We do allow access for Ajax requests though, since these may be
     * initiated from the front end of the site by non-admin users.
     */
    public function action()
    {
        if ( ! current_user_can( 'manage_options' ) && ( ! wp_doing_ajax() ) ) {
            wp_redirect( site_url() );
            exit;
        }
        
        $this->registerSettings();
    }

    protected function registerSettings()
    {
        wpsr_with(new Settings())->registerSettings();
    }
}