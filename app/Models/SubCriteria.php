<?php

namespace App\Models;
use App\Models\Criteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCriteria extends Model
{
    use HasFactory;
    protected $table = 'subcriteria';
    protected $fillable = ['criteria_id', 'name', 'min_score', 'max_score'];


    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}
