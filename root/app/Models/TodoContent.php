<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TodoContent extends Model
{
    use HasFactory;

    protected $table = 'todo_content';
    protected $primaryKey = 'content_id';

    protected $fillable = [
        'list_id',
        'content_name',
        'content_last_update'
    ];

    public function list(): BelongsTo
    {
        return $this->belongsTo(TodoList::class, 'list_id', 'list_id');
    }

    public function getTodoContent($list_id)
    {
        return $this->where('list_id', $list_id)->get();
    }
}
