<?php

namespace App\DataTransferObjects;

use App\Abstracts\DataTransferObject;
use App\Http\Requests\CompetitionRequest;
use App\Models\Competition;

class CompetitionDto extends DataTransferObject
{
    public function __construct(
        readonly public string $name,
        readonly public string $type
    ){}

    public static function fromRequest(CompetitionRequest $request): self
    {
        return new self(
            name: $request->validated('name'),
            type: $request->validated('type'),
        );
    }

    public static function fromModel(Competition $competition): self
    {
        return new self(
            name: $competition->name,
            type: $competition->type
        );
    }
}
