<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeasonApiResource extends JsonResource
{
    protected bool $showSeasonRangeAttributes = false;

    public function withSeasonRangeAttributes(bool $value = true): self
    {
        $this->showSeasonRangeAttributes = $value;

        return $this;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            $this->mergeWhen($this->showSeasonRangeAttributes, [
                'start_date' => $this->resource->start_date->format('Y-m-d'),
                'end_date' => $this->resource->end_date->format('Y-m-d')
            ])
        ];
    }
}
