<?php

namespace App\Http\Controllers\Api;

use App\DataTransferObjects\SeasonDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeasonRequest;
use App\Http\Resources\SeasonApiResource;
use App\Models\Season;
use App\Repositories\ReadRepository\SeasonReadRepository;
use App\Service\SeasonService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class SeasonController extends Controller
{
    public function __construct(
        readonly protected SeasonService $service,
        readonly protected SeasonReadRepository $readRepository
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index(): ResourceCollection
    {
        return SeasonApiResource::collection($this->readRepository->getAll());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SeasonRequest $request): JsonResource
    {
        $season = $this->service->create(SeasonDto::fromRequest($request));

        return SeasonApiResource::make($season)->withSeasonRangeAttributes();
    }

    /**
     * Display the specified resource.
     */
    public function show(Season $season): JsonResource
    {
        return SeasonApiResource::make($season)->withSeasonRangeAttributes();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SeasonRequest $request, Season $season): JsonResource
    {
        $this->service->update($season, SeasonDto::fromRequest($request));

        return SeasonApiResource::make($season)->withSeasonRangeAttributes();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Season $season): Response
    {
        $this->service->delete($season);

        return response()->noContent();
    }
}
