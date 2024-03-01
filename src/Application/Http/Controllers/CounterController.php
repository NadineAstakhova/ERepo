<?php

namespace Src\Application\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Src\Application\Http\Requests\Counter\CounterToTeamCreateRequest;
use Src\Domain\Contracts\CounterServiceInterface;
use Src\Infrastructure\Database\EloquentModels\CounterEloquentModel;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CounterController extends Controller
{
    public function __construct(private readonly CounterServiceInterface $counterService)
    {}

    /**
     * @OA\Post(
     *     path="/counter",
     *     summary="Store a counter",
     *     tags={"Counters"},
     *@OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                       type="object",
     *                       @OA\Property(
     *                           property="name",
     *                           type="string"
     *                       ),
     *                       @OA\Property(
     *                            property="team_id",
     *                            type="integer"
     *                        )
     *                  ),
     *                  example={
     *                      "name":"Dev team",
     *                      "team_id": 1
     *                 }
     *              )
     *          )
     *       ),
     *     @OA\Response(response=202, description="Successful operation"),
     *     @OA\Response(response=422, description="Unprocessable Content")
     * )
     */
    public function storeAction(CounterToTeamCreateRequest $request): Response
    {
        $this->counterService->addCounterToTeam($request->validated());

        return response(
            null,
            ResponseAlias::HTTP_ACCEPTED
        );

    }

    /**
     * @OA\Delete(
     *     path="/counter/{counter}",
     *     summary="Delete a counter",
     *     tags={"Counters"},
     *     @OA\Parameter(
     *          name="counter",
     *          in="path",
     *          description="Counter id",
     *          required=true,
     *       ),
     *     @OA\Response(response=204, description="No Content. Successful operation"),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function deleteAction(CounterEloquentModel $counter): Response
    {
        $this->counterService->removeCounterFromTeam(counterId: $counter->id);

        return response(
            null,
            ResponseAlias::HTTP_NO_CONTENT
        );

    }

}
