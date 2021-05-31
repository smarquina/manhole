<?php


namespace App\Manhole\Infrastructure\Requests;


use Illuminate\Validation\Rule;
use Manhole\Domain\Models\Material;
use Shared\Infrastructure\Requests\ApiRequest;

class BuildManholeRequest extends ApiRequest {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * @throws \ReflectionException
     */
    public function rules(): array {
        return [
            "material"   => ['required', Rule::in(Material::getValues())],
            "radio"      => ['required', 'numeric', 'min:' . config('parameters.manhole.size.min_value')],
            "decoration" => ['required', 'boolean'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array {
        return [
            "material"   => trans('manhole.attributes.material'),
            "radio"      => trans('manhole.attributes.radio'),
            "decoration" => trans('manhole.attributes.decoration'),
        ];
    }

}
