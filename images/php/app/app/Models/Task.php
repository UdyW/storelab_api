<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = ['description'];

    public function task_status(): HasOne{
        return $this->hasOne(TaskStatus::class, 'id', 'status');
    }
}