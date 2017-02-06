<?php

namespace WPSR;

use ReflectionClass;
use InvalidArgumentException;
use Illuminate\Support\Str;

class Settings
{
    const SETTINGS_OPTIONS_GROUP_NAME = 'wpsr_settings';

    const REFERRAL_CODE_PREFIX_NAME = 'wpsr_referral_code_prefix';
    const REFERRAL_CODE_SUFFIX_NAME = 'wpsr_referral_code_suffix';
    const CREATE_WP_USER_ON_SIGNUP_NAME = 'wpsr_create_wp_user_on_signup';
    const WP_USER_SIGNUP_ROLE_NAME = 'wpsr_wp_user_signup_role';
    const SIGNUP_PAGE_NAME = 'wpsr_signup_page';
    const NOTIFY_ADMIN_ON_SIGNUP_NAME = 'wpsr_notify_admin_on_signup';
    const NOTIFY_ADMIN_EMAIL_NAME = 'wpsr_notify_admin_email';
    const NOTIFY_USER_ON_SIGNUP_NAME = 'wpsr_notify_user_on_signup';

    public function registerSettings()
    {
        foreach($this->getSettings() as $key => $optionName)
        {
            $sanitizeMethod = Str::studly(strtolower('SANITIZE_' . str_replace("_NAME", "_SETTING", $key)));

            if(!method_exists($this, $sanitizeMethod))
            {
                throw new InvalidArgumentException(sprintf('Sanitize method: %s does not exists in class: %s', $sanitizeMethod, Settings::class));
            }

            register_setting(static::SETTINGS_OPTIONS_GROUP_NAME, constant(get_class($this) . '::' . $key), [$this, $sanitizeMethod]);
        }
    }

    public function getSettings()
    {
        $reflection = new ReflectionClass(__CLASS__);
        $settings = $reflection->getConstants();

        if(array_key_exists('SETTINGS_OPTIONS_GROUP_NAME', $settings))
        {
            unset($settings['SETTINGS_OPTIONS_GROUP_NAME']);
        }

        return $settings;
    }

    public function SanitizeReferralCodePrefixSetting($value)
    {
        return preg_replace('#[^A-Za-z0-9-/_]#', '', $value);
    }

    public function SanitizeReferralCodeSuffixSetting($value)
    {
        return preg_replace('#[^A-Za-z0-9-/_]#', '', $value);
    }

    public function SanitizeCreateWpUserOnSignupSetting($value)
    {
        $value = (int) $value;
        return in_array($value, [0, 1]) ? $value : 0;
    }

    public function SanitizeWpUserSignupRoleSetting($value)
    {
        return preg_replace('#[^A-Za-z0-9-]#', '', $value);
    }

    public function SanitizeSignupPageSetting($value)
    {
        $value = (int) $value;
        return is_integer($value) ? $value : 0;
    }

    public function SanitizeNotifyAdminOnSignupSetting($value)
    {
        $value = (int) $value;
        return in_array($value, [0, 1]) ? $value : 0;
    }

    public function SanitizeNotifyUserOnSignupSetting($value)
    {
        $value = (int) $value;
        return in_array($value, [0, 1]) ? $value : 0;
    }

    public function SanitizeNotifyAdminEmailSetting($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) ? $value : '';
    }
}