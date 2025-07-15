<?php

declare(strict_types=1);

namespace App\Modules\Order\Http\DTOs;

use Illuminate\Http\Request;

readonly class OrderDTO
{
    public function __construct(
        public int $customer_id,
        public string $order_date,
        public string $status
    ) {}

    public static function fromRequest(Request $request, ?int $id = null): self
    {
        $data = $request->validated();

        return new self(
            $data['customer_id'],
            $data['order_date'],
            $data['status']
        );
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['customer_id'],
            $data['order_date'],
            $data['status']
        );
    }

    public function toArray(): array
    {
        return [
            'customer_id' => $this->customer_id,
            'order_date' => $this->order_date,
            'status' => $this->status,
        ];
    }
}
