<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Asset extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'assets';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'author',
        'publication',
        'edition',
        'cost',
        'description',
        'language',
        'pages',
        'rfid_tag',
        'created_at',
        'updated_at',
        'deleted_at',
        'danger_level',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'asset_id');
    }

    public function getAssetName($value){
        Asset::where('rfid_tag', $value)->pluck('name')->first();
    }
}
