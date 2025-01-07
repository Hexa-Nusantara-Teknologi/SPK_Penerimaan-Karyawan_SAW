<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivityModel extends Model
{
    use HasFactory;

    protected $table = 'user_activity';

    protected $fillable = [
        'user_id',
        'criteria_1',
        'criteria_2',
        'criteria_3',
        'criteria_4',
        'criteria_5',
        'criteria_6',
        'status_text',
        'score',
        'start_time',
        'end_time'
    ];

    /**
     * Relasi dengan model User
     * Menghubungkan user_id dengan id di tabel users
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function ranking()
    {
        return $this->hasOne(RankingModel::class, 'user_activity_id', 'id');
    }
}
