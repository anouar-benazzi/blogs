<?php

namespace App\Http\Requests;

use App\Rules\ValidatePassword;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name' => ['required','min:3'],
            'password'=> 'required | confirmed | min:6',
         'email' => ['required', 'email', Rule::unique('users','email')],
         'OldPassword' => ['required', new ValidatePassword(auth()->user())]
         
            
        ];
    }


    public function FiltredAttributes() {
    
        $validatedData = $this->validated();
 
        // Hash password
        $validatedData['password'] = bcrypt($this['password']);

        return $validatedData ;

}
}
