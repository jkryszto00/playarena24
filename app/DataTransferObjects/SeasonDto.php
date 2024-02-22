<?php

namespace App\DataTransferObjects;

use App\Abstracts\DataTransferObject;
use App\Http\Requests\SeasonRequest;
use App\Models\Season;
use Carbon\Carbon;

class SeasonDto extends DataTransferObject
{
    public function __construct(
        readonly string $name,
        readonly \DateTimeImmutable $start_date,
        readonly \DateTimeImmutable $end_date
    ){}

    public static function fromRequest(SeasonRequest $request): self
    {
        return new self(
            name: $request->validated('name'),
            start_date: Carbon::make($request->validated('start_date'))->toDateTimeImmutable(),
            end_date: Carbon::make($request->validated('end_date'))->toDateTimeImmutable()
        );
    }

    public static function fromModel(Season $season): self
    {
        return new self(
            name: $season->name,
            start_date: Carbon::make($season->start_date)->toDateTimeImmutable(),
            end_date: Carbon::make($season->end_date)->toDateTimeImmutable()
        );
    }
}
