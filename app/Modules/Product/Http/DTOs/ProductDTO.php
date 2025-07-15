<?php

declare(strict_types=1);

namespace App\Modules\Product\Http\DTOs;

use Illuminate\Http\Request;

readonly class ProductDTO
{
    public function __construct(
        public string $name,
        public float $price
    ) {}

    public static function fromRequest(Request $request, ?int $id = null): self
    {
        $data = $request->validated();

        return new self(
            $data['name'],
            $data['price']
        );
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['price']
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'price' => $this->price,
        ];
    }
}
