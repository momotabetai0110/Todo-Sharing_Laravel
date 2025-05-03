<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoListRequest;
use App\Services\TodoListService;
use Illuminate\Http\JsonResponse;

class TodoListController extends Controller
{
    /**
     * 新しいTODOリストを作成
     */
    public function store(TodoListRequest $request)
    {
        return TodoListService::postTodoList($request->list_name);
    }
}
