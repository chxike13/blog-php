<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TpArticle extends Model
{
    protected $table = 'tp_article';
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
}
