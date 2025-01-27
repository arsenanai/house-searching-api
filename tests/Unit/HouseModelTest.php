<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\House;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HouseModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating a house.
     *
     * @return void
     */
    public function testCreateHouse()
    {
        $house = House::create([
            'name'      => 'Modern House',
            'price'     => 300000,
            'bedrooms'  => 4,
            'bathrooms' => 3,
            'storeys'   => 2,
            'garages'   => 1,
        ]);

        $this->assertDatabaseHas('houses', [
            'name'      => 'Modern House',
            'price'     => 300000,
            'bedrooms'  => 4,
            'bathrooms' => 3,
            'storeys'   => 2,
            'garages'   => 1,
        ]);
    }

    /**
     * Test updating a house.
     *
     * @return void
     */
    public function testUpdateHouse()
    {
        $house = House::factory()->create();

        $house->update([
            'name'  => 'Updated House',
            'price' => 350000,
        ]);

        $this->assertDatabaseHas('houses', [
            'name'  => 'Updated House',
            'price' => 350000,
        ]);
    }

    /**
     * Test deleting a house.
     *
     * @return void
     */
    public function testDeleteHouse()
    {
        $house = House::factory()->create();

        $house->delete();

        $this->assertDatabaseMissing('houses', [
            'id' => $house->id,
        ]);
    }
}
