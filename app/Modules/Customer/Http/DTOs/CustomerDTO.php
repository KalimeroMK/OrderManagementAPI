<?php

declare(strict_types=1);

namespace App\Modules\Customer\Http\DTOs;

use Illuminate\Http\Request;

readonly class CustomerDTO
{
    public function __construct(
        public ?string $name,
        public ?string $email
    ) {}

    public static function fromRequest(Request $request, ?int $id = null): self
    {
        $data = $request->validated();

        return new self(
            $data['name'] ?? null,
            $data['email'] ?? null
        );
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'] ?? null,
            $data['email'] ?? null
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
