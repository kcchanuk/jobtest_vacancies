<?php

namespace App\Http\Requests;

trait CommonRuleTrait
{
    /**
     * Return common validation rule for required text
     *
     * @param int|null $max
     * @return array
     */
    public function requiredTextRule(?int $max = null): array
    {
        return ['bail', 'required', 'string', 'max:' . ($max ?? config('params.default.max_text'))];
    }

    /**
     * Return common validation rule for nullable text
     *
     * @param int|null $max
     * @return array
     */
    public function nullableTextRule(?int $max = null): array
    {
        return ['bail', 'nullable', 'string', 'max:' . ($max ?? config('params.default.max_text'))];
    }

    /**
     * Return common validation rule for required textarea
     *
     * @param int|null $max
     * @return array
     */
    public function requiredTextareaRule(?int $max = null): array
    {
        return ['bail', 'required', 'string', 'max:' . ($max ?? config('params.default.max_textarea'))];
    }

    /**
     * Return common validation rule for nullable textarea
     *
     * @param int|null $max
     * @return array
     */
    public function nullableTextareaRule(?int $max = null): array
    {
        return ['bail', 'nullable', 'string', 'max:' . ($max ?? config('params.default.max_textarea'))];
    }

    /**
     * Return common validation rule for required unsigned integer
     *
     * @param int|null $max
     * @return array
     */
    public function requiredUnsignedIntegerRule(?int $max = null): array
    {
        return ['bail', 'required', 'integer', 'min:1', 'max:' . ($max ?? config('params.default.max_integer'))];
    }

    /**
     * Return common validation rule for nullable unsigned integer
     *
     * @param int|null $max
     * @return array
     */
    public function nullableUnsignedIntegerRule(?int $max = null): array
    {
        return ['bail', 'nullable', 'integer', 'min:1', 'max:' . ($max ?? config('params.default.max_integer'))];
    }
}
