<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    protected $table = 'sources';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $dateFormat = 'U';

    protected $fillable = [];
}
