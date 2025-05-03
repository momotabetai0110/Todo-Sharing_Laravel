<?php

namespace App\Services;

use App\Models\TodoContent;
use App\Models\TodoList;

class TodoContentService
{

    //TODOリスト内のコンテンツをすべて返す
    public static function getTodoContent($list_name)
    {
        $list = TodoList::where('list_name', $list_name)->first();
        if ($list == null) {
            //TODOリストが存在しない場合
            return ['result' => 0];
        } else {
            //TODOリストがあった場合
            $todo_content = TodoContent::where('list_id', $list->list_id)
                ->select('content_id', 'content_name')
                ->get();
            return response()->json([
                'result' => 1,
                'list_id'=>$list->list_id,
                'data' => $todo_content
            ]);
        }
    }

    public static function postTodoContent($list_id, $content_name)
    {
        TodoContent::create(['list_id' => $list_id, 'content_name' => $content_name]);
    }

    public static function deleteTodoContent($content_id)
    {
        TodoContent::where('content_id', $content_id)->delete();
    }
}
