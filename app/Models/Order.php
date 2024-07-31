<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    // Разрешенные для массового присвоения атрибуты
    protected $fillable = [
        'weight',
        'region',
        'delivery_hours',
        'courier_id',
        'status',
    ];

    // Кастинг полей для преобразования в нужный тип
    protected $casts = [
        'delivery_hours' => 'array',
        'weight' => 'decimal:2',  // Для точности десятичных значений
        'region' => 'integer',
        'courier_id' => 'integer',
        'status' => 'string',
    ];

    // Отношение к модели Courier
    public function courier()
    {
        return $this->belongsTo(Courier::class);
    }
}
