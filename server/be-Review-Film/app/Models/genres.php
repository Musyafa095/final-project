<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;
class genres extends Model
{
    use HasFactory, HasUuids;
    protected $table =  'genres';
    protected $fillable =  ['name'];
    public $incrementing = false;
    public $timestamps = false;
  
  

    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
   public function movies()
    {
        return $this->hasMany(movies::class, 'genre_id');
    }
}
