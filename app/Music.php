<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $fillable = ['title', 'type', 'source', 'featured'];

    protected static $types = [
        'youtube' => 'youtube'
    ];

    /**
     * Return available types of music links.
     */
    public static function getTypes() {
        return self::$types;
    }

    public static function unfeatureMusic() {
        $music = Music::where('featured', 1)->first();
        if (!empty($music)) {
            $music->featured = false;
            $music->save();
        }
    }

    /**
     * Parse and return youtube song id from url.
     */
    public static function parseCode($link) {
        preg_match('/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/', $link, $matches);
        return (!empty($matches) && strlen($matches[7]) == 11) ? $matches[7] : false;
    }

    /**
     * Return link to youtube.
     */
    public function getLink() {
        return 'https://www.youtube.com/watch?v=' . $this->source;
    }
}
