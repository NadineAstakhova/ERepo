<?php

namespace Src\Application\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Src\Application\Http\Requests\Team\TeamCreateRequest;
use Src\Domain\Contracts\TeamServiceInterface;
use Src\Infrastructure\Database\EloquentModels\TeamEloquentModel;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Teams",
 *      description="Team Actions Controller"
 * )
 *
 */
class TeamController extends Controller
{
    public function __construct(private readonly TeamServiceInterface $teamService)
    {}

    /**
     * @OA\Post(
     *     path="/team",
     *     summary="Store a team",
     *     tags={"Teams"},
     *@OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                       type="object",
     *                       @OA\Property(
     *                           property="name",
     *                           type="string"
     *                       )
     *                  ),
     *                  example={
     *                      "name":"Dev team"
     *                 }
     *              )
     *          )
     *       ),
     *     @OA\Response(response=202, description="Successful operation"),
     *     @OA\Response(response=422, description="Unprocessable Content")
     * )
     */
    public function storeAction(TeamCreateRequest $request): Response
    {
        $this->teamService->storeTeam($request->validated());

        return response(
            null,
            ResponseAlias::HTTP_ACCEPTED
        );

    }

    /**
     * @OA\Delete(
     *     path="/team/{team}",
     *     summary="Delete a team",
     *     tags={"Teams"},
     *     @OA\Parameter(
     *          name="team",
     *          in="path",
     *          description="Team id",
     *          required=true,
     *       ),
     *     @OA\Response(response=204, description="No Content. Successful operation"),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function deleteAction(TeamEloquentModel $team)
    {
        $this->teamService->deleteTeam(teamId: $team->id);

        return response(
            null,
            ResponseAlias::HTTP_NO_CONTENT
        );

    }
}
