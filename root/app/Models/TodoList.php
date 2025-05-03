<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TodoList extends Model
{
    use HasFactory;

    protected $table = 'todo_list';
    protected $primaryKey = 'list_id';

    protected $fillable = [
        'list_name',
        'list_last_update',
    ];

    protected $casts = [
        'list_last_update' => 'datetime',
    ];

    public function contents(): HasMany
    {
        return $this->hasMany(TodoContent::class, 'list_id', 'list_id');
    }

    /**
     * 指定された名前でTODOリストを作成する
     *
     * @param string $list_name
     * @return int 0: 作成成功, 1: 既に存在
     */
    public static function createTodoList($list_name)
    {
        try {
            $isExist = static::where('list_name', $list_name)->exists();

            if ($isExist) {
                return 1;
            } else {
                static::create([
                    'list_name' => $list_name,
                    'list_last_update' => now(),
                ]);
                return 0;
            }
        } catch (\Exception $e) {
            return 2;
        }
    }
}
