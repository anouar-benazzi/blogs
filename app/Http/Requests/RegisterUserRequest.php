<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
       return [    'name' => ['required','min:3'],
       'role_id' => 'required',
    'email' => ['required', 'email', Rule::unique('users','email')],
    'password'=> 'required | confirmed | min:6'] ;
    }

    public function FiltredAttributes() {

        $validatedData = $this->validated();
         // Hash password
         $validatedData['password'] = bcrypt($this['password']);

         return $validatedData;
    }

}
