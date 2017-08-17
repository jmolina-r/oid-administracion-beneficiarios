<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidRut implements Rule
{
    /**
     * The source control provider instance.
     *
     * @var \App\Source
     */
    public $rut;


    /**
     * Create a new rule instance.
     *
     * @param  \App\Source  $source
     * @param  string  $branch
     * @return void
     */
    public function __construct($rut)
    {
        $this->rut = $rut;
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
        if ($this->rut != 0) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The given rut is invalid.';
    }
}
