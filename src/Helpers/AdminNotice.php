<?php

namespace WPSR\Helpers;

class AdminNotice
{
    protected static $instance;

    protected $noticeClass = 'notice';

    protected $noticeTypeClasses = [
        'error' => 'notice-error',
        'success' => 'notice-success',
        'warning' => 'notice-warning',
        'info' => 'notice-info',
    ];

    protected $html = '<div class="%s %s %s"><p>%s</p></div>';

    protected $message = '';

    private function __construct()
    {}

    public static function make()
    {
        if(!static::$instance)
        {
            static::$instance = new static;
        }

        return static::$instance;
    }

    public function error($message, $isDismissible = true)
    {
        $this->notice('error', $message, $isDismissible);
    }

    public function success($message, $isDismissible = true)
    {
        $this->notice('success', $message, $isDismissible);
    }

    public function warning($message, $isDismissible = true)
    {
        $this->notice('warning', $message, $isDismissible);
    }

    public function info($message, $isDismissible = true)
    {
        $this->notice('info', $message, $isDismissible);
    }

    protected function notice($type, $message, $isDismissible = true)
    {
        $noticeTypeClass = array_key_exists($type, $this->noticeTypeClasses) ? $this->noticeTypeClasses[$type] : 'notice-info';
        $isDismissibleClass = $isDismissible ? 'is-dismissible' : '';

        $this->message = sprintf($this->html, $this->noticeClass, $noticeTypeClass, $isDismissibleClass, $message);
        add_action( 'admin_notices', [$this, 'showAdminNotice']);
    }

    public function showAdminNotice()
    {
        if(!empty($this->message))
        {
            echo $this->message;
        }
    }
}