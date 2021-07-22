<?php


namespace Tests\Feature\Manhole;


use Illuminate\Http\Response;
use Tests\TestCase;

class CreateManholeTest extends TestCase {

    public function test_create(): void {

        $requestBody = [
            "radio"      => 17.35,
            "material"   => "steel",
            "decoration" => true,
        ];
        $response    = $this->postJson(url('/api/manhole_cover/build'), $requestBody, self::REQUEST_HEADERS);

        $response->assertOk();
        $data = json_decode($response->getContent(), true);
        $this->assertTrue(in_array($requestBody, $data["data"]), "create manhole response incorrect");
    }

    public function test_invalid_request(): void {
        foreach ($this->invalidDataProvider() as $requestBody) {
            $response = $this->postJson(url('/api/manhole_cover/build'), $requestBody, self::REQUEST_HEADERS);
            $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Because of config() can't de used as dataProvider
     * @return array[]
     */
    public function invalidDataProvider(): array {
        return [
            [
                "radio"      => 17.35,
                "material"   => "invalid_material",
                "decoration" => true,
            ],
            [
                "radio"      => config('parameters.manhole.size.min_value') - 1,
                "material"   => "steel",
                "decoration" => true,
            ],
            [
                "radio"      => 17.35,
                "material"   => "steel",
                "decoration" => "not_boolean",
            ],
        ];
    }
}
