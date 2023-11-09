<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Hieght as HieghtModel;

class HeightRegisterPostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
  public function rules()
    {
        return [
            'name' => ['required'],

        ];
    }
}