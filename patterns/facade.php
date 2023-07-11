<?php

class PublishPostEveryWhere {

    private $post;

    public function __construct() {
        add_action('publish_post', [$this, 'publish']);
    }

    public function publish($post_id) {
        $this->post = get_post($post_id);
    }

    public function publish_to_youtube() {
        $video = get_field($this->post->ID, 'video');
        if ($video) {
            $youtube = new Youtube('api_key');
            $youtube->publish($video, $this->post->post_title, $this->post->post_content);
        }
    }

    public function publish_to_tiktok() {
        $video = get_field($this->post->ID, 'video');
        if ($video) {
            $tiktok = new TikTok('api_key');
            $tiktok->publish($video, $this->post->post_title, $this->post->post_content);
        }
    }

    public function publish_to_instagram() {
        $photos = get_field($this->post->ID, 'photos');
        if ($photos) {
            $instagram = new Instagram('api_key');
            $instagram->publish($photos, $this->post->post_title, $this->post->post_content);
        }
    }

    public function publish_to_facebook() {
        $facebook = new Facebook('api_key');
        $media = [
            'video' => get_field($this->post->ID, 'video'),
            'photos' => get_field($this->post->ID, 'video'),
        ];
        $facebook->publish($media, $this->post->post_title, $this->post->post_content);
    }

    public function publish_to_twitter() {
        $twitter = new Twitter('api_key');
        $preview = get_field($this->post->ID, 'photos')[0];
        $twitter->publish($preview, $this->post->post_title, $this->post->post_content);
    }

    public function send_emails() {
        EmailSender::send_emails_to_subscribers($this->post->ID);
    }
}

class Youtube {
    public function __construct($api_key) { }
    public function publish($video, $title, $description, ?array $params = null) {}
}
class TikTok {
    public function __construct($api_key) { }
    public function publish($video, $title, $description, ?array $params = null) {}
}
class Instagram {
    public function __construct($api_key) { }
    public function publish(array $photos, $title, $description) {}
}
class Facebook {
    public function __construct($api_key) { }
    public function publish($media, $title, $description) {}
}
class Twitter {
    public function __construct($api_key) { }
    public function publish($photo, $title, $description) {}
}
class EmailSender {
    public static function send_emails_to_subscribers($post_id) {}
}


new PublishPostEveryWhere();


