<?php

declare(strict_types=1);

namespace App\Modules\SpecialDay\Http\DTOs;

use Illuminate\Http\Request;

readonly class SpecialDayDTO
{
    public function __construct(
        public ?string $date
    ) {}

    public static function fromRequest(Request $request, ?int $id = null): self
    {
        $data = $request->validated();

        return new self(
            $data['date'] ?? $request->input('date')
        );
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['date'] ?? null
        );
    }

    public function toArray(): array
    {
        return [
            'date' => $this->date,
        ];
    }
}
