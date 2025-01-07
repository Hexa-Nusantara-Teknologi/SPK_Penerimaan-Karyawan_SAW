<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RankingModel extends Model
{
    use HasFactory;

    protected $table = 'ranking';

    protected $fillable = [
        'user_activity_id',
        'status',
        'created_at',
        'updated_at',
    ];

    /**
     * Relasi ke model UserActivity
     * Menghubungkan user_activity_id dengan id di tabel user_activity.
     */
    public function user_activity()
    {
        return $this->belongsTo(UserActivityModel::class, 'user_activity_id', 'id');
    }

    /**
     * Relasi tidak langsung ke model User melalui UserActivity
     * Mengambil data user melalui user_activity.
     */
    public function user()
    {
        return $this->hasOneThrough(
            UsersModel::class,
            UserActivityModel::class,
            'id',               // Foreign key di UserActivityModel (user_id)
            'id',               // Foreign key di UsersModel
            'user_activity_id', // Local key di RankingModel
            'user_id'           // Local key di UserActivityModel
        );
    }
}
