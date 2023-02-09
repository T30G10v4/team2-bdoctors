<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DocProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'curriculum_vitae',
        'photo',
        'studio_address',
        'tel',
        'services',
        'slug',
        'user_id',

    ];

    public static function generateSlug($id)
    {
        return Str::slug($id);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
