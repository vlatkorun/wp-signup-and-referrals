<?php

namespace WPSR\CustomPosts\Metaboxes\Referrals;

use WPSR\CustomPosts\Metaboxes\AbstractMetabox;

class ReferralCode extends AbstractMetabox
{
    const NAME = 'wpsr_referral_code';

    public function args()
    {
        return [
            [
                'id' => static::NAME,
                'title' => __('Referral Code', 'wpsr'),
                'callback' => [$this, 'display'],
            ]
        ];
    }
}