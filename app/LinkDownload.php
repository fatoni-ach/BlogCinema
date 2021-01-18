<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkDownload extends Model
{
    //
    protected $fillable = [
        'name', 'slug', 'link_1',
        'link_2', 'link_3', 'post_id',
    ];

    public function post()
    {
        return $this->hasOne(Post::class);
    }
}
