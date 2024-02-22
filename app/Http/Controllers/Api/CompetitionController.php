<?php

namespace App\Http\Controllers\Api;

use App\DataTransferObjects\CompetitionDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompetitionRequest;
use App\Http\Resources\CompetitionApiResource;
use App\Models\Competition;
use App\Repositories\ReadRepository\CompetitionReadRepository;
use App\Service\CompetitionService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class CompetitionController extends Controller
{
    public function __construct(
        readonly protected CompetitionService $service,
        readonly protected CompetitionReadRepository $readRepository
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index(): ResourceCollection
    {
        return CompetitionApiResource::collection($this->readRepository->getAll());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompetitionRequest $request): JsonResource
    {
        $competition = $this->service->create(CompetitionDto::fromRequest($request));

        return new CompetitionApiResource($competition);
    }

    /**
     * Display the specified resource.
     */
    public function show(Competition $competition): JsonResource
    {
        return new CompetitionApiResource($competition);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompetitionRequest $request, Competition $competition): JsonResource
    {
        $this->service->update($competition, CompetitionDto::fromRequest($request));

        return new CompetitionApiResource($competition);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competition $competition): Response
    {
        $this->service->delete($competition);

        return response()->noContent();
    }
}
