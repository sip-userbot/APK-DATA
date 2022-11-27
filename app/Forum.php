<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Kelas;
use App\User;
use App\School_info;

class Forum extends Model
{
    // Model untuk table forum

    protected $table = 'forum';
    
    protected $fillable = [
        'user_id', 'school_info_id', 'title', 'description', 'created_at', 'updated_at'
    ];

    public function kelas() {
        return $this->belongsTo(Kelas::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function schoolInfo() {
        return $this->belongsTo(School_info::class);
    }
}
