<?php

namespace App\Http\Requests;

use App\Models\Images;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfilePictureRequest extends FormRequest
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
            //
        ];
    }

    public function FiltredAttributes() {

        if($this->hasFile('photo')){

            $image = Images::create(['photo'=>$this->file('photo')->store('profile','public'),
            'imageable_type' => 'App\Models\User                                                                                                                 ',
            'imageable_id'=> auth()->user()->id]);
   }

}
}
