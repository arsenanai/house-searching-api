<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\House;

class HouseControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test fetching houses without filters.
     *
     * @return void
     */
    public function testFetchHousesWithoutFilters()
    {
        House::factory()->count(5)->create();

        $response = $this->get('/api/houses');

        $response->assertStatus(200);
        $response->assertJsonCount(5);
    }

    /**
     * Test fetching houses with name filter.
     *
     * @return void
     */
    public function testFetchHousesWithNameFilter()
    {
        $house = House::factory()->create(['name' => 'Beautiful House']);
        House::factory()->count(4)->create();

        $response = $this->get('/api/houses?name=Beautiful');

        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertJsonFragment(['name' => 'Beautiful House']);
    }

    /**
     * Test fetching houses with bedrooms filter.
     *
     * @return void
     */
    public function testFetchHousesWithBedroomsFilter()
    {
        House::factory()->create(['bedrooms' => 3]);
        House::factory()->create(['bedrooms' => 4]);

        $response = $this->get('/api/houses?bedrooms=3');

        $response->assertStatus(200);
        $response->assertJsonCount(1);
    }

    /**
     * Test fetching houses with bathrooms filter.
     *
     * @return void
     */
    public function testFetchHousesWithBathroomsFilter()
    {
        House::factory()->create(['bathrooms' => 2]);
        House::factory()->create(['bathrooms' => 3]);

        $response = $this->get('/api/houses?bathrooms=2');

        $response->assertStatus(200);
        $response->assertJsonCount(1);
    }

    /**
     * Test fetching houses with storeys filter.
     *
     * @return void
     */
    public function testFetchHousesWithStoreysFilter()
    {
        House::factory()->create(['storeys' => 1]);
        House::factory()->create(['storeys' => 2]);

        $response = $this->get('/api/houses?storeys=1');

        $response->assertStatus(200);
        $response->assertJsonCount(1);
    }

    /**
     * Test fetching houses with garages filter.
     *
     * @return void
     */
    public function testFetchHousesWithGaragesFilter()
    {
        House::factory()->create(['garages' => 1]);
        House::factory()->create(['garages' => 2]);

        $response = $this->get('/api/houses?garages=1');

        $response->assertStatus(200);
        $response->assertJsonCount(1);
    }

    /**
     * Test fetching houses with price range filter.
     *
     * @return void
     */
    public function testFetchHousesWithPriceRangeFilter()
    {
        House::factory()->create(['price' => 150000]);
        House::factory()->create(['price' => 200000]);
        House::factory()->create(['price' => 250000]);

        $response = $this->get('/api/houses?price_min=180000&price_max=220000');

        $response->assertStatus(200);
        $response->assertJsonCount(1);
    }
}
