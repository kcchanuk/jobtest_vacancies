<?php

namespace App\Http\Requests;

trait CommonRuleTrait
{
    /**
     * Return common validation rule for text
     *
     * @param int|null $max
     * @return array
     */
    public function textRule(?int $max = null): array
    {
        return ['bail', 'required', 'string', 'max:' . $max ?? config('params.default.max_text')];
    }

    /**
     * Return common validation rule for textarea
     *
     * @param int|null $max
     * @return array
     */
    public function textareaRule(?int $max = null): array
    {
        return ['bail', 'required', 'string', 'max:' . $max ?? config('params.default.max_textarea')];
    }

    /**
     * Return common validation rule for unsigned integer
     *
     * @param int|null $max
     * @return array
     */
    public function unsignedIntegerRule(?int $max = null): array
    {
        return ['bail', 'required', 'integer', 'min:1', 'max:' . $max ?? config('params.default.max_integer')];
    }
}
