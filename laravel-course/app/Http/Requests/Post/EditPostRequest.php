<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class EditPostRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title'=> 'min:3|required|unique:posts,title,'. $this->post['id'],
            'description' => 'required|min:10',
            'user_id' => 'exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'the title is required, please fill it',
            'title.min' => 'this is not the lenght',
        ];
    }
}
