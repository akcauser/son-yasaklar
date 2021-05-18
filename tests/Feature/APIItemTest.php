<?php

namespace Tests\Feature;

use App\Models\Item;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class APIItemTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Index Test
     * Create 5 record and get them.
     * 
     * @return void
     */
    public function test_index()
    {
        // 5 record added to database
        Item::factory()->count(5)->create();

        $response = $this->get('api/items');

        $response->assertJsonCount(5, 'data');
        $response->assertStatus(200);
    }

    /**
     * Store Test
     * Make a template and call create api with this data.
     * 
     * @return void
     */
    public function test_store()
    {
        // create a record template and get attributes
        $item = Item::factory()->make()->getAttributes();

        $response = $this->postJson('api/items', $item);

        $response->assertStatus(200);
        $response->assertJson([]);

        // assert database with will create data.
        $this->assertDatabaseHas('items', $item);
    }

    /**
     * Update Test
     * Create a record. After create new template, then call update api. 
     * 
     * @return void
     */
    public function test_update()
    {
        // add a record
        $item = Item::factory()->create();

        // create new record template 
        $newItem = Item::factory()->make()->getAttributes();

        $response = $this->putJson('api/items/' . $item->id, $newItem);

        $response->assertStatus(200);
        $response->assertJson([
            'id' => $item->id,

        ]);

        // assert database with will create data.
        $this->assertDatabaseHas('items', $newItem);
    }


    /**
     * Destroy Test
     * Create a record. Call delete request.
     * 
     * @return void
     */
    public function test_destroy()
    {
        // add a record
        $item = Item::factory()->create();

        $response = $this->delete('api/items/' . $item->id);

        $response->assertStatus(200);

        // assert database with will create data.
        $this->assertDeleted('items', $item->getAttributes());
    }

    /**
     * Show Test
     * Create a record and get this data with Api.
     * 
     * @return void
     */
    public function test_show()
    {
        // 5 record added to database
        $item = Item::factory()->create();

        $response = $this->get('api/items/' . $item->id);

        $response->assertJson([
            'id' => $item->id,

        ]);
        $response->assertStatus(200);
    }
}
