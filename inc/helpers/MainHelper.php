<?php

/**
 * Created by Coderator boke@ukr.net
 * Main helpers functions
 */

namespace pmd;

class MainHelper
{
    public static function getLinkBySlug($slug)
    {
        $page = get_page_by_path($slug);
        if ($page) {
            $link = get_permalink($page->ID);
        }
        return $link ?? '#';
    }

    public static function the_custom_post_thumbnail($id, $size)
    {
        echo self::get_the_custom_post_thumbnail($id, $size);
    }

    public static function get_the_custom_post_thumbnail($id, $size)
    {
        $thumb = get_the_post_thumbnail($id, $size);
        if ($thumb) {
            return $thumb;
        } else {
            $thumb = get_field('photo_blank', 'options');
            if ($thumb) {
                return wp_get_attachment_image($thumb, $size);
            }
        }
    }

    public static function parseWorkingDays($data)
    {
        $days_arr = explode(',', $data); // explode by days  ['8.00-15.00', '8.00-15.00' ... ]
        $days_arr = array_map(function ($day) {
            $day = explode('-', trim($day)); // explode by hours [ [ [8.00] [15.00] ], [ [8.00], [15.00] ] ...]
            return $day;
        }, $days_arr);

        return $days_arr;
    }

    public static function getDayOfWeek()
    {
        return [
            'Понеділок',
            'Вівторок',
            'Середа',
            'Четвер',
            'П\'ятниця',
            'Субота',
            'Неділя',
        ];
    }

    public static function getTheTitle()
    {
        global $post;
        $postTitle = '';

        if (is_singular()) {
            $postTitle = $post->post_title;
        } elseif (is_archive()) {
            $postTitle = get_the_archive_title();
        } elseif (is_404()) {
            $postTitle =  'Сторінка не знайдена';
        } elseif (is_search()) {
            $postTitle = 'Результат пошуку';
        }
        return $postTitle;
    }

    public static function getPageDescription(): string
    {
        $subTitle = '';

        if (is_singular()) {
            $post_type = get_post_type();

            switch ($post_type) {
                case 'zaklad':
                    $subTitle = 'Адреса: ' . get_field('address');
                    break;
                case 'post':
                    $subTitle = '';
                    break;
                case 'page':
                    $subTitle = '';
                    break;
                default:
                    $subTitle = '';
            }
            $subTitle = sprintf('<p>%s</p>', $subTitle);
        } else if (is_archive()) {
            $subTitle = get_the_archive_description();
        }

        return $subTitle;
    }
}
