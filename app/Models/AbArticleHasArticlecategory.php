<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class AbArticleHasArticlecategory extends Model
{
    use HasFactory;

    protected $table = 'ab_article_has_articlecategory';
    protected $fillable = ['ab_articlecategory_id', 'ab_article_id'];
    public $timestamps = false;
}
