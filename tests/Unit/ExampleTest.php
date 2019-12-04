<?php

namespace Tests\Unit;

use App\Services\DataService;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Tests\TestCase;
use Illuminate\Http\Request;

class ExampleTest extends TestCase
{
    use WithFaker;

    public function testGetDataList()
    {
        $FakerSearchCode = $this->faker->numberBetween;
        $FakerEventCode  = $this->faker->numberBetween;

        $requestMock = Mockery::mock(Request::class);
        $requestMock->shouldReceive('input')->with('search_code', 0)->andReturn($FakerSearchCode);
        $requestMock->shouldReceive('input')->with('event_code', 0)->andReturn($FakerSearchCode);

        $expected = [$FakerSearchCode, $FakerEventCode];
        $actual   = app(DataService::class)->getDataList($requestMock);
        $this->assertEquals($expected, $actual);

    }
}
