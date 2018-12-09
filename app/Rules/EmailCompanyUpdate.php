<?php

namespace App\Rules;

use App\Company;
use Illuminate\Contracts\Validation\Rule;

class EmailCompanyUpdate implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (count(Company::where('email',$value)->get())>0){
            if (Company::where('userId',auth()->id())->where('email', $value)->first()){
               return true;
            }else{
               return false;
            }
        }else{
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The email has to be unique.';
    }
}
