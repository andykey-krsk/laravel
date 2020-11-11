<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class News
 * @package App\Models
 * @property string $title
 * @property string $photo
 * @property string $short_text
 * @property string $full_text
 * @property integer $category_id
 */

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $primaryKey = 'id';

    public $timestamps = true;

    //protected $dateFormat = 'U';

    protected $fillable = [
        'title',
        'photo',
        'short_text',
        'full_text',
        'category_id',
        'source_id',
    ];

}
