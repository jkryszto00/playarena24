<?php

namespace App\DataTransferObjects;

use App\Abstracts\DataTransferObject;
use App\Http\Requests\PlayerRequest;
use App\Models\Player;
use Carbon\Carbon;

class PlayerDto extends DataTransferObject
{
    public function __construct(
        readonly public string $first_name,
        readonly public ?string $last_name = null,
        readonly public ?\DateTimeImmutable $birthdate = null
    ){}

    public static function fromRequest(PlayerRequest $request): self
    {
        return new self(
            first_name: $request->validated('first_name'),
            last_name: $request->validated('last_name'),
            birthdate: Carbon::make($request->validated('birthdate'))->toDateTimeImmutable()
        );
    }

    public static function fromModel(Player $player): self
    {
        return new self(
            first_name: $player->first_name,
            last_name: $player?->last_name,
            birthdate: Carbon::make($player?->birthdate)->toDateTimeImmutable(),
        );
    }
}
