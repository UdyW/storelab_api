<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserTask extends Model
{
    protected $table = 'user_tasks';

    protected $fillable = ['task', 'user'];

    public function user(): HasOne{
        return $this->hasOne(User::class, 'id', 'user');
    }

    public function task(): HasOne{
        return $this->hasOne(Task::class, 'id', 'task');
    }
}