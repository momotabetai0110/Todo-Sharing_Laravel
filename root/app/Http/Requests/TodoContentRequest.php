<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoContentRequest extends FormRequest
{
    /**
     * リクエストの認証を判断
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * バリデーションルール
     */
    public function rules(): array
    {
        $method = $this->method();

        if($method === 'GET'){
            $rules = [
                'list_name' => 'required',
            ];
        }elseif($method === 'POST'){
            $rules = [
                'list_id' => 'required',
                'content_name'=>'required',
            ];
        }elseif($method === 'DELETE'){
            $rules = [
                'content_id'=>'required',
            ];
        }
        return $rules;
    }

    /**
     * バリデーションエラーメッセージ
     */
    public function messages(): array
    {
        return [
            'list_name.required' => 'リスト名は必須です',
            'list_id.required' => 'リストIDは必須です',
            'content_name.required' => 'コンテンツ名は必須です',
            'content_id.required' => 'コンテンツIDは必須です',
        ];
    }
}