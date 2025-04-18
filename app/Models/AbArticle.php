<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class AbArticle extends Model
{
    use HasFactory;

    protected $table = 'ab_article';
    protected $fillable = ['ab_name', 'ab_price', 'ab_description', 'ab_creator_id', 'ab_createdate'];
    public $timestamps = false;
}
