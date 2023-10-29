<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
     //認証関係、権限などを設定。defaultだとfalseだが、そのような設定を使わないときはtrueに直す
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
     //°のカラムの時にどういう適応するかをここに記述
    public function rules(): array
    {
        return [
        //複数バリデーションをチェックしたいとき、|。必須項目..required、記述する文字データ、文字数max:。
            'title' => 'required | string | max:50',
        //  
            'body' => 'required | string | max:2000',
        ];
    }
}
