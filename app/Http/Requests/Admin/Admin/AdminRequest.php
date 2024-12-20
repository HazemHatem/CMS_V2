<?php

namespace App\Http\Requests\Admin\Admin;

use App\Models\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->admin->id;
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $userId,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'phone' => 'required|numeric|digits_between:10,15|unique:users,phone,' . $userId,
            // 'phone' => ['required', 'numeric', 'digits_between:10,15', Rule::unique('users')->ignore($userId)],
            'rule_id' => 'required|exists:rules,id',
            'description' => 'required|string|min:15',
        ];
    }
}
