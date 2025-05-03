<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoContentRequest;
use App\Models\TodoContent;
use App\Services\TodoContentService;

class TodoContentController extends Controller
{
    /**
     * TODOリスト内のコンテンツをすべて返す
     */
    public static function index(TodoContentRequest $request)
    {
        return TodoContentService::getTodoContent($request->list_name);
    }

    /**
     * 新しいコンテンツを登録する
     */
     public static function store(TodoContentRequest $request){
         TodoContentService::postTodoContent($request->list_id,$request->content_name);
         return ['dummy'=>'ok'];
     }

     /**
      * コンテンツを削除する
      */
      public static function destroy(TodoContentRequest $request){
        TodoContentService::deleteTodoContent($request->content_id);
        return ['dummy'=>'ok'];
      }
}
