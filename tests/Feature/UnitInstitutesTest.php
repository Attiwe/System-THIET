<?php

namespace Tests\Feature;

use App\Models\UnitInstitutes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UnitInstitutesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('unit_institutes');
    }

    /**
     * Test that unit institutes index page loads successfully.
     */
    public function test_unit_institutes_index_page_loads_successfully()
    {
        $response = $this->get(route('unit_institutes.index'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.unit_institutes.index');
    }

    /**
     * Test that unit institutes create page loads successfully.
     */
    public function test_unit_institutes_create_page_loads_successfully()
    {
        $response = $this->get(route('unit_institutes.create'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.unit_institutes.create');
    }

    /**
     * Test that a unit institute can be created successfully.
     */
    public function test_unit_institute_can_be_created_successfully()
    {
        $file = UploadedFile::fake()->image('unit_institute.jpg');
        
        $unitInstituteData = [
            'vision' => $this->faker->paragraph(3),
            'message' => $this->faker->paragraph(2),
            'image' => $file,
        ];

        $response = $this->post(route('unit_institutes.store'), $unitInstituteData);

        $response->assertRedirect(route('unit_institutes.index'));
        $response->assertSessionHas('success', 'تم إضافة وحدة المعهد بنجاح');
        
        $this->assertDatabaseHas('unit_institutes', [
            'vision' => $unitInstituteData['vision'],
            'message' => $unitInstituteData['message'],
        ]);
    }

    /**
     * Test that unit institute creation fails with invalid data.
     */
    public function test_unit_institute_creation_fails_with_invalid_data()
    {
        $response = $this->post(route('unit_institutes.store'), [
            'vision' => '', // Required field is empty
            'message' => '', // Required field is empty
            'image' => '', // Required field is empty
        ]);

        $response->assertSessionHasErrors(['vision', 'message', 'image']);
    }

    /**
     * Test that unit institutes edit page loads successfully.
     */
    public function test_unit_institutes_edit_page_loads_successfully()
    {
        $unitInstitute = UnitInstitutes::factory()->create();

        $response = $this->get(route('unit_institutes.edit', $unitInstitute->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.unit_institutes.edit');
        $response->assertViewHas('unitInstitute', $unitInstitute);
    }

    /**
     * Test that a unit institute can be updated successfully.
     */
    public function test_unit_institute_can_be_updated_successfully()
    {
        $unitInstitute = UnitInstitutes::factory()->create();
        
        $updateData = [
            'vision' => $this->faker->paragraph(3),
            'message' => $this->faker->paragraph(2),
        ];

        $response = $this->put(route('unit_institutes.update', $unitInstitute->id), $updateData);

        $response->assertRedirect(route('unit_institutes.index'));
        $response->assertSessionHas('success', 'تم تحديث وحدة المعهد بنجاح');
        
        $this->assertDatabaseHas('unit_institutes', [
            'id' => $unitInstitute->id,
            'vision' => $updateData['vision'],
            'message' => $updateData['message'],
        ]);
    }

    /**
     * Test that a unit institute can be deleted successfully.
     */
    public function test_unit_institute_can_be_deleted_successfully()
    {
        $unitInstitute = UnitInstitutes::factory()->create();

        $response = $this->delete(route('unit_institutes.destroy', $unitInstitute->id));

        $response->assertRedirect(route('unit_institutes.index'));
        $response->assertSessionHas('success', 'تم حذف وحدة المعهد بنجاح');
        
        $this->assertDatabaseMissing('unit_institutes', [
            'id' => $unitInstitute->id,
        ]);
    }

    /**
     * Test that unit institutes show page loads successfully.
     */
    public function test_unit_institutes_show_page_loads_successfully()
    {
        $unitInstitute = UnitInstitutes::factory()->create();

        $response = $this->get(route('unit_institutes.show', $unitInstitute->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.unit_institutes.show');
        $response->assertViewHas('unitInstitute', $unitInstitute);
    }
}
