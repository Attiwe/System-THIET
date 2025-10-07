<?php

namespace Tests\Feature;

use App\Models\Publishing;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PublishingTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test that publishings index page loads successfully.
     */
    public function test_publishings_index_page_loads_successfully()
    {
        $response = $this->get(route('publishings.index'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.publishings.index');
    }

    /**
     * Test that publishings create page loads successfully.
     */
    public function test_publishings_create_page_loads_successfully()
    {
        $response = $this->get(route('publishings.create'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.publishings.create');
    }

    /**
     * Test that a publishing can be created successfully.
     */
    public function test_publishing_can_be_created_successfully()
    {
        $publishingData = [
            'publishing_name' => $this->faker->company() . ' للنشر',
            'phone' => $this->faker->phoneNumber(),
            'publishing_description' => $this->faker->sentence(),
        ];

        $response = $this->post(route('publishings.store'), $publishingData);

        $response->assertRedirect(route('publishings.index'));
        $response->assertSessionHas('success', 'تم إضافة دار النشر بنجاح');
        
        $this->assertDatabaseHas('publishings', [
            'publishing_name' => $publishingData['publishing_name'],
            'phone' => $publishingData['phone'],
            'publishing_description' => $publishingData['publishing_description'],
        ]);
    }

    /**
     * Test that publishing creation fails with invalid data.
     */
    public function test_publishing_creation_fails_with_invalid_data()
    {
        $response = $this->post(route('publishings.store'), [
            'publishing_name' => '', // Required field is empty
            'phone' => '', // Required field is empty
            'publishing_description' => str_repeat('a', 1001), // Exceeds max length
        ]);

        $response->assertSessionHasErrors(['publishing_name', 'phone', 'publishing_description']);
    }

    /**
     * Test that publishings edit page loads successfully.
     */
    public function test_publishings_edit_page_loads_successfully()
    {
        $publishing = Publishing::factory()->create();

        $response = $this->get(route('publishings.edit', $publishing->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.publishings.edit');
        $response->assertViewHas('publishing', $publishing);
    }

    /**
     * Test that a publishing can be updated successfully.
     */
    public function test_publishing_can_be_updated_successfully()
    {
        $publishing = Publishing::factory()->create();
        
        $updateData = [
            'publishing_name' => $this->faker->company() . ' للنشر',
            'phone' => $this->faker->phoneNumber(),
            'publishing_description' => $this->faker->sentence(),
        ];

        $response = $this->put(route('publishings.update', $publishing->id), $updateData);

        $response->assertRedirect(route('publishings.index'));
        $response->assertSessionHas('success', 'تم تحديث دار النشر بنجاح');
        
        $this->assertDatabaseHas('publishings', [
            'id' => $publishing->id,
            'publishing_name' => $updateData['publishing_name'],
            'phone' => $updateData['phone'],
            'publishing_description' => $updateData['publishing_description'],
        ]);
    }

    /**
     * Test that a publishing can be deleted successfully.
     */
    public function test_publishing_can_be_deleted_successfully()
    {
        $publishing = Publishing::factory()->create();

        $response = $this->delete(route('publishings.destroy', $publishing->id));

        $response->assertRedirect(route('publishings.index'));
        $response->assertSessionHas('success', 'تم حذف دار النشر بنجاح');
        
        $this->assertDatabaseMissing('publishings', [
            'id' => $publishing->id,
        ]);
    }

    /**
     * Test that publishings show page loads successfully.
     */
    public function test_publishings_show_page_loads_successfully()
    {
        $publishing = Publishing::factory()->create();

        $response = $this->get(route('publishings.show', $publishing->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.publishings.show');
        $response->assertViewHas('publishing', $publishing);
    }
}
