<?php
add_action('cmb2_admin_init', 'metabox_for_comet');

function metabox_for_comet()
{
    $section = new_cmb2_box(array(
        'title' => 'Movies Information',
        'object_types' => array(
            'post'
        ),
        'id' => 'fields-for-posts'
    ));
    $section->add_field(array(
        'name' => 'Movie Trailar URI',
        'id' => '_video-url',
        'type' => 'oembed'
    ));
    $section->add_field(array(
        'name' => 'Movie Rating',
        'id' => '_rating_point',
        'type' => 'text_small'
    ));
    $section->add_field(array(
        'name' => 'Movie Duration',
        'id' => '_movie_duration',
        'type' => 'text_small'
    ));
    $section->add_field(array(
        'name' => 'Movie Release Date',
        'id' => '_movie_date',
        'type' => 'text_date',
        'attributes' => array(
            'data-datepicker' => json_encode(array(
                'dayNames' => array(
                    'Sunday',
                    'Monday',
                    'Tuesday',
                    'Wednesday',
                    'Thursday',
                    'Friday',
                    'Saturday'
                ),
                'monthNamesShort' => explode(',', 'Jan,Feb,Mar,Apr,May,Jun,Jul,Agu,Sep,Oct,Nov,Dec'),
                'yearRange' => '-100:+0'
            ))
        )
    ));
    $section->add_field(array(
        'name' => 'Movie Starring',
        'id' => '_movie_starring',
        'type' => 'text'
    ));
    $section->add_field(array(
        'name' => 'Movie Genres',
        'id' => '_movie_genres',
        'type' => 'text'
    ));
    $section->add_field(array(
        'name' => 'Movie Languages',
        'id' => '_movie_languages',
        'type' => 'text'
    ));
}

add_action('cmb2_admin_init', 'metabox_for_comet2');

function metabox_for_comet2()
{
    $section = new_cmb2_box(array(
        'title' => 'Tv-Show Information',
        'object_types' => array(
            'tv_show'
        ),
        'id' => 'fields-for-tv'
    ));
    $section->add_field(array(
        'name' => 'TV-Show Rating',
        'id' => '_rating_tv',
        'type' => 'text_small'
    ));
    $section->add_field(array(
        'name' => 'TV-Show Duration',
        'id' => '_tv_duration',
        'type' => 'text_small'
    ));
    $section->add_field(array(
        'name' => 'TV-Show Date',
        'id' => '_tv_date',
        'type' => 'text_date',
        'attributes' => array(
            'data-datepicker' => json_encode(array(
                'dayNames' => array(
                    'Sunday',
                    'Monday',
                    'Tuesday',
                    'Wednesday',
                    'Thursday',
                    'Friday',
                    'Saturday'
                ),
                'monthNamesShort' => explode(',', 'Jan,Feb,Mar,Apr,May,Jun,Jul,Agu,Sep,Oct,Nov,Dec'),
                'yearRange' => '-100:+0'
            ))
        )
    ));
    $section->add_field(array(
        'name' => 'TV-Show Starring',
        'id' => '_tv_starring',
        'type' => 'text'
    ));
    $section->add_field(array(
        'name' => 'TV-Show Genres',
        'id' => '_tv_genres',
        'type' => 'text'
    ));
    $section->add_field(array(
        'name' => 'TV-Show Languages',
        'id' => '_tv_languages',
        'type' => 'text'
    ));
    $section->add_field(array(
        'id' => 'wiki_test_repeat_group',
        'type' => 'group',
        'description' => __('Generates reusable form entries', 'cmb2'),
        'options' => array(
            'group_title' => __('Entry {#}', 'cmb2'),
            'add_button' => __('Add Another Entry', 'cmb2'),
            'remove_button' => __('Remove Entry', 'cmb2'),
        )
    ));
    $section->add_group_field($group_field_id, array(
        'name' => 'Entry Title',
        'id' => 'title',
        'type' => 'text'
    ));
    $section->add_group_field($group_field_id, array(
        'name' => 'Description',
        'description' => 'Write a short description for this entry',
        'id' => 'description',
        'type' => 'textarea_small'
    ));
    $section->add_group_field($group_field_id, array(
        'name' => 'Entry Image',
        'id' => 'image',
        'type' => 'file'
    ));
    $section->add_group_field($group_field_id, array(
        'name' => 'Image Caption',
        'id' => 'image_caption',
        'type' => 'text'
    ));
}

add_action('cmb2_admin_init', 'yourprefix_register_repeatable_group_field_metabox');

function yourprefix_register_repeatable_group_field_metabox()
{
    $cmb_group      = new_cmb2_box(array(
        'id' => '_Series_group_',
        'title' => esc_html__('Add Season', 'cmb2'),
        'object_types' => array(
            'tv_show'
        )
    ));
    $group_field_id = $cmb_group->add_field(array(
        'id' => '_group_fields_',
        'type' => 'group',
        'options' => array(
            'group_title' => esc_html__('Season {#}', 'cmb2'),
            'add_button' => esc_html__('Add Another', 'cmb2'),
        )
    ));
    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Season Title', 'cmb2'),
        'id' => '_series_title_',
        'type' => 'text'
    ));
    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Episodes Title', 'cmb2'),
        'id' => '_epi_title_',
        'type' => 'text',
        'repeatable' => true
    ));
    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Episodes URI', 'cmb2'),
        'id' => '_epi_link_',
        'type' => 'text',
        'repeatable' => true
    ));
}
