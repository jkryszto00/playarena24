<?php

namespace App\Http\Controllers\Api;

use App\DataTransferObjects\PlayerDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlayerRequest;
use App\Http\Resources\PlayerApiResource;
use App\Models\Player;
use App\Repositories\ReadRepository\PlayerReadRepository;
use App\Service\PlayerService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class PlayerController extends Controller
{
    public function __construct(
        readonly protected PlayerService $service,
        readonly protected PlayerReadRepository $readRepository
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index(): ResourceCollection
    {
        return PlayerApiResource::collection($this->readRepository->getAll());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlayerRequest $request): JsonResource
    {
        $player = $this->service->create(PlayerDto::fromRequest($request));

        return PlayerApiResource::make($player);
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player): JsonResource
    {
        return PlayerApiResource::make($player);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlayerRequest $request, Player $player): JsonResource
    {
        $this->service->update($player, PlayerDto::fromRequest($request));

        return PlayerApiResource::make($player);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player): Response
    {
        $this->service->delete($player);

        return response()->noContent();
    }
}
