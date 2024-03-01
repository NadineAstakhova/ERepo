<?php

use Src\Infrastructure\Mappers\TeamMapper;
use Tests\TestCase;

class TeamMapperTest extends TestCase
{
    public function test_Team_Mapper_from_Request(): void
    {
        $array = ["name" => "Test Team"];
        $teamReq = TeamMapper::fromRequestArray($array);
        $this->assertEquals($array["name"], $teamReq->name);
    }
}
