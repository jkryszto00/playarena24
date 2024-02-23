<?php

namespace App\Http\Controllers\Api;

use App\DataTransferObjects\TeamDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;
use App\Http\Resources\TeamApiResource;
use App\Models\Team;
use App\Repositories\ReadRepository\TeamReadRepository;
use App\Service\TeamService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class TeamController extends Controller
{
    public function __construct(
        readonly protected TeamService $service,
        readonly protected TeamReadRepository $readRepository
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index(): ResourceCollection
    {
        return TeamApiResource::collection($this->readRepository->getAll());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamRequest $request): JsonResource
    {
        $team = $this->service->create(TeamDto::fromRequest($request));

        return new TeamApiResource($team);
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team): JsonResource
    {
        return new TeamApiResource($team);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamRequest $request, Team $team): JsonResource
    {
        $this->service->update($team, TeamDto::fromRequest($request));

        return new TeamApiResource($team);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team): Response
    {
        $this->service->delete($team);

        return response()->noContent();
    }
}
