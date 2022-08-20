<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $fillable = [
        "pet_name",
        "before_image",
        "after_image",
        "status",
        "user_id"
    ];

    public function formattedStatus()
    {
        switch ($this->status) {
            case "new":
                return "Новая";
            case "processing":
                return "В обработке";
            case "processed":
                return "Услуга оказана";
        }
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function isProcessed() {
        return $this->status === "processed";
    }

    public function isNew() {
        return $this->status === "new";
    }

    public static function homeOrders() {
        return self::where("status", "processed")->latest()->limit(4)->get();

    }
}
