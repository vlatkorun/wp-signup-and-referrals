<section class="pattern">
    <h2><?php esc_attr_e( 'Settings', 'wpsr' ); ?></h2>
    <div class="wrap">

        {{--<form action="{{ menu_page_url(\WPSR\AdminMenu\Pages\Settings::PAGE_SLUG, false) }}" method="post" id="wpsr_settings">--}}
        <form action="options.php" method="post" id="wpsr_settings">

            <?php settings_fields(\WPSR\Settings::SETTINGS_OPTIONS_GROUP_NAME); ?>

            <table class="form-table">

                <tr valign="top" class="alternate">
                    <td scope="row">
                        <label>
                            <strong>
                                {{ __('Referral Code Prefix', 'wpsr') }}
                            </strong>
                        </label>
                        <br>
                        <span class="description">
                            <?php esc_attr_e( 'Prefix for the referral code.', 'wpsr' ); ?>
                            <br>
                            <?php esc_attr_e( 'Allowed values: A-Z,a-z,0-9,/,-', 'wpsr' ); ?>
                        </span>
                    </td>
                    <td scope="row">
                        <input type="text" name="{{ \WPSR\Settings::REFERRAL_CODE_PREFIX_NAME }}" value="" class="regular-text" />
                    </td>
                </tr>

                <tr valign="top" class="alternate">
                    <td scope="row">
                        <label>
                            <strong>
                                {{ __('Referral Code Suffix', 'wpsr') }}
                            </strong>
                        </label>
                        <br>
                        <span class="description">
                            <?php esc_attr_e( 'Suffix for the referral code.', 'wpsr' ); ?>
                            <br>
                            <?php esc_attr_e( 'Allowed values: A-Z,a-z,0-9,/,-', 'wpsr' ); ?>
                        </span>
                    </td>
                    <td scope="row">
                        <input type="text" name="{{ \WPSR\Settings::REFERRAL_CODE_SUFFIX_NAME }}" value="" class="regular-text" />
                    </td>
                </tr>

                <tr valign="top" class="alternate">
                    <td scope="row">
                        <label>
                            <strong>
                                {{ __('Sign up Page', 'wpsr') }}
                            </strong>
                        </label>
                        <br>
                        <span class="description">
                            <?php esc_attr_e( 'Sign up html will be appended to its contents.', 'wpsr' ); ?>
                        </span>
                    </td>
                    <td scope="row">
                        <select name="{{ \WPSR\Settings::SIGNUP_PAGE_NAME }}" id="{{ \WPSR\Settings::SIGNUP_PAGE_NAME }}">
                            <option selected="selected" value="0">
                                <?php esc_attr_e( 'Select Page', 'wpsr' ); ?>
                            </option>

                            @if(!empty($pages))
                                @foreach($pages as $page)
                                    <option value="{{ $page->ID }}">{{ $page->post_title }}</option>
                                @endforeach
                            @endif
                        </select>
                    </td>
                </tr>

                <tr valign="top" class="alternate">
                    <td scope="row">
                        <label>
                            <strong>
                                {{ __('Notify Admin on Sign up', 'wpsr') }}
                            </strong>
                        </label>
                        <br>
                        <span class="description">
                            <?php esc_attr_e( 'Should we send email to admin on success.', 'wpsr' ); ?>
                        </span>
                    </td>
                    <td scope="row">
                        <input type="checkbox" value="1" name="{{ \WPSR\Settings::NOTIFY_ADMIN_ON_SIGNUP_NAME }}"  />
                    </td>
                </tr>

                <tr valign="top" class="alternate">
                    <td scope="row">
                        <label>
                            <strong>
                                {{ __('Admin Email', 'wpsr') }}
                            </strong>
                        </label>
                        <br>
                        <span class="description">
                            <?php esc_attr_e( 'If this field is empty email will be send to the default admin account.', 'wpsr' ); ?>
                        </span>
                    </td>
                    <td scope="row">
                        <input type="text" name="{{ \WPSR\Settings::NOTIFY_ADMIN_EMAIL_NAME }}" value="" class="regular-text" />
                    </td>
                </tr>

                <tr valign="top" class="alternate">
                    <td scope="row">
                        <label>
                            <strong>
                                {{ __('Notify User on Sign up', 'wpsr') }}
                            </strong>
                        </label>
                        <br>
                        <span class="description">
                            <?php esc_attr_e( 'Should we send email to user on success.', 'wpsr' ); ?>
                        </span>
                    </td>
                    <td scope="row">
                        <input type="checkbox" value="1" name="{{ \WPSR\Settings::NOTIFY_USER_ON_SIGNUP_NAME }}"  />
                    </td>
                </tr>

                <tr valign="top" class="alternate">
                    <td scope="row">
                        <label>
                            <strong>
                                {{ __('Create WP User on Sign up', 'wpsr') }}
                            </strong>
                        </label>
                        <br>
                        <span class="description">
                            <?php esc_attr_e( 'Should we create WP user account on success.', 'wpsr' ); ?>
                        </span>
                    </td>
                    <td scope="row">
                        <input type="checkbox" @if(!get_option('users_can_register')) disabled @endif   value="1" name="{{ \WPSR\Settings::CREATE_WP_USER_ON_SIGNUP_NAME }}"  id="{{ \WPSR\Settings::CREATE_WP_USER_ON_SIGNUP_NAME }}"/>

                        @if(!get_option('users_can_register'))
                            <span class="notice notice-error wpsr-notice-error">
                                <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                            <?php esc_attr_e( 'Please enable user registration in WordPress settings!', 'wpsr' ); ?>
                            </span>
                        @endif
                    </td>
                </tr>

                <tr valign="top" class="alternate wpsr-hidden">
                    <td scope="row">
                        <label>
                            <strong>
                                {{ __('User Role', 'wpsr') }}
                            </strong>
                        </label>
                        <br>
                        <span class="description">
                            <?php esc_attr_e( 'To which role the user should belong.', 'wpsr' ); ?>
                        </span>
                    </td>
                    <td scope="row">
                        <select name="{{ \WPSR\Settings::WP_USER_SIGNUP_ROLE_NAME }}" id="{{ \WPSR\Settings::WP_USER_SIGNUP_ROLE_NAME }}">
                            <option selected="selected" value="0">
                                <?php esc_attr_e( 'Select Role', 'wpsr' ); ?>
                            </option>

                            @if(!empty($roles))
                                @foreach($roles as $roleSlug => $role)
                                    <option value="{{ $roleSlug }}">{{ $role['name'] }}</option>
                                @endforeach
                            @endif
                        </select>
                    </td>
                </tr>

                <tr valign="top" class="alternate">
                    <td scope="row" colspan="2">
                        <input class="button-primary" type="submit" name="Save" value="{{ __('Save Settings', 'wpsr') }}" />
                        {{--<input type="hidden" name="{{ WPSR\Helpers\WPNonce::NONCE_NAME }}" value="{{ WPSR\Helpers\WPNonce::create() }}">--}}
                    </td>
                </tr>
            </table>
        </form>

    </div>
</section>





