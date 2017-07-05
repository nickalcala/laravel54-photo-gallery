<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    public $appends = ['kilo_bytes', 'created_at_diff_for_human', 'photo_file_path', 'tag_list', 'author_name'];

    /**
     * Get the file size in KB.
     * 
     * @return float
     */
    public function getKiloBytesAttribute()
    {
        return ceil($this->size / 1024);
    }

    public function getCreatedAtDiffForHumanAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getPhotoFilePathAttribute()
    {
        return url('images/' . $this->file_name . '.' . $this->extension);
    }

    public function getTagListAttribute()
    {
        return $this->tags;
    }

    public function getAuthorNameAttribute()
    {
        return $this->author->name;
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'photo_tag');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}