<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';

    protected $primaryKey = 'id';

    public $timestamps = true;

    // protected $dateFormat = 'U';

    protected $fillable = [
        'name',
        'comment',
    ];
}
