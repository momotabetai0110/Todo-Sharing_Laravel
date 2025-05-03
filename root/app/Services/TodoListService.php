<?php

namespace App\Services;

use App\Models\TodoList;
use Illuminate\Http\JsonResponse;

class TodoListService
{
    /**
     * 新しいTODOリストを作成する
     *
     * @param string $list_name
     * @return JsonResponse
     */
    public static function postTodoList(string $list_name)
    {
        return TodoList::createTodoList($list_name);
    }
}