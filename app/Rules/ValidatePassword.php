<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Rule;

class ValidatePassword implements Rule {

    public function __construct(User $user)
    {
        //
        $this->user = $user;
    }

    public function passes($attribute, $value)
    {
        //
        return Hash::check($value,$this->user->password);
    }

    public function message()
    {
        //
        return 'the validation error meesage';
    }

}