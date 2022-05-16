<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ImageExistRule implements Rule
{

    public $modelId;
    public $tableName;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($modelId , $tableName)
    {
        $this->modelId = $modelId;
        $this->tableName = $tableName;
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
        return !! DB::table($this->tableName)->find($this->modelId)->image;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'no :attribute existed';
    }
}
