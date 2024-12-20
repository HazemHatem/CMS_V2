<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class MinWords implements ValidationRule
{
    protected int $minWords;


    /**
     * Create a new rule instance.
     *
     * @param int $minWords The minimum number of words required
     */
    public function __construct(int $minWords)
    {
        $this->minWords = $minWords;
    }


    /**
     * Validate the given attribute using the given $validator.
     *
     * This method validates that the given string has at least the minimum
     * number of words specified when the rule was created.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure  $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (str_word_count($value) < $this->minWords) {
            $fail($this->message());
        }
    }


    /**
     * Get the validation error message for the rule.
     *
     * @return \Illuminate\Translation\PotentiallyTranslatedString
     */
    public function message()
    {
        return __("The :attribute must be at least :minWords words", [
            'minWords' => $this->minWords,
            'attribute' => __(':attribute'),
        ]);
    }
}
