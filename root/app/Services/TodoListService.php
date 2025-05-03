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
    public static function postTodoList(string $list_name): JsonResponse
    {
        $result = TodoList::createTodoList($list_name);

        switch ($result) {
            case 0:
                return response()->json(['result'=> 0,'message' => 'TODOリストが作成されました'], 201);
            case 1:
                return response()->json(['result'=> 1,'message' => '同じ名前のTODOリストが既に存在します'], 201);
            case 2:
                return response()->json(['result'=> 2,'message' => 'TODOリストの作成に失敗しました'], 500);
            default:
                return response()->json(['result'=> 3,'message' => '予期せぬエラーが発生しました'], 500);
        }
    }
}