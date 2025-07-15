<?php

declare(strict_types=1);

namespace App\Modules\Role\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
{
    /**
     * @return array<string, string>
     */
    public function rules(): array
    {
        return ['name' => 'required|string|max:255'];
    }
}
