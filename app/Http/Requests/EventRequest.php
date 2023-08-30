<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'event.title' => 'required|string|max:255',
            'event.start_time' => 'required|date_format:Y-m-d\TH:i',
            'event.end_time' => 'required|date_format:Y-m-d\TH:i|after:event.start_time',
        ];
    }
    public function message(){
        return [
        'event.title.required' => 'タイトルは必須です。',
        'event.start_time.required' => '開始時間は必須です。',
        'event.end_time.required' => '終了時間は必須です。',
        ];
    }
}
