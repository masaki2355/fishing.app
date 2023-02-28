<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostData extends FormRequest
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

                'weather' => 'required|string',
                'tide' => 'required|string',
                'fishing_spot' => 'required|string',
                $rules = [
                    'fish' => 'required|string',
                ],
                'image' => 'required|mimes:jpeg,png,jpg',
                'post' => 'required|max:200'
            ];
    }
}
