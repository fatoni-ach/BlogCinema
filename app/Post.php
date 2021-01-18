<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'judul', 'slug', 'posted_by','deskripsi', 
        'link_video', 'link_download', 'link_gambar', 'genre',
    ];
    public function link_downloads()
    {
        return $this->hasMany(LinkDownload::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Categorie::class);
    }
}
