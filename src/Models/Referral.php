<?php

namespace WPSR\Models;

use \WP_Query;
use \WP_Post;
use \WP_User;
use WPSR\CustomPosts\Metaboxes\Referrals\ReferralCode;
use WPSR\CustomPosts\Metaboxes\Referrals\ReferralParent;
use WPSR\CustomPosts\Metaboxes\Referrals\UserEmail;
use InvalidArgumentException;
use WPSR\CustomPosts\Referrals as ReferralsCustomPost;
use WPSR\Helpers\Coupon as Generator;

class Referral
{
    protected $referralPost;

    public function setPost($post)
    {
        if(!$post instanceof WP_Post)
        {
            $post = get_post($post);
        }

        if(is_null($post) || $post->post_type !== ReferralsCustomPost::NAME)
        {
            throw new InvalidArgumentException('Invalid post!');
        }

        $this->referralPost = $post;

        return $this;
    }

    public static function make($referral)
    {
        return wpsr_with(new static)->setPost($referral);
    }

    public function getReferralCode()
    {
        return get_post_meta($this->referralPost->ID, ReferralCode::NAME, true);
    }

    public function setReferralCode($code)
    {
        return update_post_meta($this->referralPost->ID, ReferralCode::NAME, $code);
    }

    public function getReferralParent()
    {
        return get_post_meta($this->referralPost->ID, ReferralParent::NAME, true);
    }

    public function setReferralParent($value)
    {
        return update_post_meta($this->referralPost->ID, ReferralParent::NAME, $value);
    }

    public function getUserEmail()
    {
        return get_post_meta($this->referralPost->ID, UserEmail::NAME, true);
    }

    public function setUserEmail($value)
    {
        return update_post_meta($this->referralPost->ID, UserEmail::NAME, $value);
    }

    public function save(array $params)
    {
        /**
         * @TODO Add before fetch user filter
         */

        /**
         * @TODO Add before create filter and action
         */
        $postParams = [
          'post_title' => $params['referral_code']
        ];

        $postId = wp_insert_post($postParams);

        if(is_wp_error($postId))
        {
            return false;
        }

        $this->setPost($postId);

        $this->setReferralCode($params['referral_code']);
        $this->setUserEmail($params['user_email']);
        $this->setReferralParent(0);

        return $postId;
    }

    public function find($referralId)
    {

    }

    public function findByRefferralCode($referralId)
    {

    }

    public function findByUserEmail($referralId)
    {

    }

    public function findByReferralParent($referralId)
    {

    }

    public function findReferralParentChildren($referralId)
    {

    }

    public function hasReferralParentChildren($referralId)
    {

    }

    public function hasReferralParent($referralId)
    {

    }

    public function generateReferralCode()
    {
        return Generator::generate(8);
    }
}