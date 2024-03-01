<?php

namespace Src\Application\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Src\Domain\Contracts\EmployeeStepCounterServiceInterface;
use Src\Infrastructure\Database\EloquentModels\CounterEloquentModel;
use Src\Infrastructure\Database\EloquentModels\EmployeeEloquentModel;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class EmployeeCounterController extends Controller
{
    public function __construct(private readonly EmployeeStepCounterServiceInterface $employeeStepCounterService)
    {}

    /**
     * @OA\Post(
     *     path="/employee/{employee}/counter/{counter}",
     *     summary="Increment specific step counter for an employee and a common step counter for a team",
     *     tags={"Counters"},
     *     @OA\Parameter(
     *          name="employee",
     *          in="path",
     *          description="Employee id",
     *          required=true,
     *      ),
     *     @OA\Parameter(
     *           name="counter",
     *           in="path",
     *           description="Counter id",
     *           required=true,
     *       ),
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=422, description="Unprocessable Content"),
     *     @OA\Response(response=404, description="Not Found"),
     *     @OA\Response(response=401, description="An employee and a counter have different teams")
     * )
     */
    public function incrementAction(EmployeeEloquentModel $employee, CounterEloquentModel $counter): Response
    {
        if($employee->team_id !== $counter->team->id){
            return response(
                ["error" => "An employee doesn't have access to this counter"],
                ResponseAlias::HTTP_UNAUTHORIZED
            );
        }

        $steps = $this->employeeStepCounterService->incrementEmployeeStepCounter(employee: $employee, counter: $counter);

        return response(
            $steps,
            ResponseAlias::HTTP_OK
        );

    }
}
