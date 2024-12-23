<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:20',
            'body' => 'required|max:300',
            '1' => 'required|nullable|exists:players,id',
            '2' => 'required|nullable|exists:players,id',
            '3' => 'required|nullable|exists:players,id',
            '4' => 'required|nullable|exists:players,id',
            '5' => 'required|nullable|exists:players,id',
            '6' => 'required|nullable|exists:players,id',
            '7' => 'required|nullable|exists:players,id',
            '8' => 'required|nullable|exists:players,id',
            '9' => 'required|nullable|exists:players,id',
        ];
    }
}
