<?php

namespace Src\Application\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Src\Application\Http\Requests\TeamCounter\PaginateRequest;
use Src\Domain\Contracts\TeamCounterServiceInterface;
use Src\Infrastructure\Database\EloquentModels\TeamEloquentModel;
use Src\Infrastructure\Resources\EmployeesWithCounterCollection;
use Src\Infrastructure\Resources\EmployeesWithCounterResource;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class TeamCounterController extends Controller
{
    public function __construct(private readonly TeamCounterServiceInterface $teamCounterService)
    {}

    /**
     * @OA\Get(
     *     path="/team/{team}/total/steps",
     *     summary="Get the current total steps taken by a team",
     *     tags={"Teams Counters"},
     *     @OA\Parameter(
     *          name="team",
     *          in="path",
     *          description="Team id",
     *          required=true,
     *       ),
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function getCurrentTotalStepsForTeam(TeamEloquentModel $team): Response
    {
       $total = $this->teamCounterService->getTotalSteps(teamId: $team->id);

       return response(
            [
                "data" =>
                    [
                        "total_steps" => $total
                    ]
            ],
            ResponseAlias::HTTP_OK
        );
    }


    /**
     * @OA\Get(
     *     path="/team/{team}/employees/steps",
     *     summary="Get how much each team member have walked. The list of team employees with counters",
     *     tags={"Teams Counters"},
     *     @OA\Parameter(
     *          name="team",
     *          in="path",
     *          description="Team id",
     *          required=true,
     *       ),
     *     @OA\Parameter(
     *           name="per_page",
     *           in="path",
     *           description="Employees per page"
     *        ),
     *     @OA\Parameter(
     *            name="page",
     *            in="path",
     *            description="Current page"
     *         ),
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function getEmployeesWithCounterFromTeam(TeamEloquentModel $team, PaginateRequest $request): Response
    {
        $employees = $this->teamCounterService->getEmployeesInTeamWithSteps(
            teamId: $team->id,
            per_page: $request->per_page ?? 20,
            page: $request->page ?? 1
        );

        return response(
               new EmployeesWithCounterCollection($employees),
            ResponseAlias::HTTP_OK
        );

    }

}
