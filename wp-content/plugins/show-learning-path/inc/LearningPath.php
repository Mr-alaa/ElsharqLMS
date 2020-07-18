<?php


class LearningPath
{
    function getLearningPath()
    {
        $args = array(
            'post_type' => 'learningpath',
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'orderby' => 'title',
            'order' => 'ASC',
        );
        $loop = new WP_Query($args);

        return $loop;
    }
}
