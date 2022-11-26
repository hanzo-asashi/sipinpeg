<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSkpd extends Model
{
    use HasFactory;

    protected $table = 'user_instansi';

    protected $fillable = ['user_id', 'instansi_id'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function instansi(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Instansi::class,'instansi_id','instansi_id');
    }

}
