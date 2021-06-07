<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Plan;

class UpdatePlanRequest extends FormRequest
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
        $rules = Plan::$rules;
        $rules['slug'] = "required|unique:plans,slug,{$this->plan},id";
        return $rules;
    }
}
