<?php

declare(strict_types=1);

namespace App\Modules\SpecialDay\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SpecialDayResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            //             'date' => $this->date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
