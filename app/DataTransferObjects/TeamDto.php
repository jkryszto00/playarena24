<?php

namespace App\DataTransferObjects;

use App\Abstracts\DataTransferObject;
use App\Http\Requests\TeamRequest;
use App\Models\Team;

class TeamDto extends DataTransferObject
{
    public function __construct(
        readonly public string $name
    ){}

    public static function fromRequest(TeamRequest $request): self
    {
        return new self(
            name: $request->validated('name')
        );
    }

    public static function fromModel(Team $team): self
    {
        return new self(
            name: $team->name
        );
    }
}
