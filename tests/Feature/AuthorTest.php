<?php

namespace Tests\Feature;

use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test that authors index page loads successfully.
     */
    public function test_authors_index_page_loads_successfully()
    {
        $response = $this->get(route('authors.index'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.authors.index');
    }

    /**
     * Test that authors create page loads successfully.
     */
    public function test_authors_create_page_loads_successfully()
    {
        $response = $this->get(route('authors.create'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.authors.create');
    }

    /**
     * Test that an author can be created successfully.
     */
    public function test_author_can_be_created_successfully()
    {
        $authorData = [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(),
        ];

        $response = $this->post(route('authors.store'), $authorData);

        $response->assertRedirect(route('authors.index'));
        $response->assertSessionHas('success', 'تم إضافة المؤلف بنجاح');
        
        $this->assertDatabaseHas('authors', [
            'name' => $authorData['name'],
            'description' => $authorData['description'],
        ]);
    }

    /**
     * Test that author creation fails with invalid data.
     */
    public function test_author_creation_fails_with_invalid_data()
    {
        $response = $this->post(route('authors.store'), [
            'name' => '', // Required field is empty
            'description' => str_repeat('a', 1001), // Exceeds max length
        ]);

        $response->assertSessionHasErrors(['name', 'description']);
    }

    /**
     * Test that authors edit page loads successfully.
     */
    public function test_authors_edit_page_loads_successfully()
    {
        $author = Author::factory()->create();

        $response = $this->get(route('authors.edit', $author->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.authors.edit');
        $response->assertViewHas('author', $author);
    }

    /**
     * Test that an author can be updated successfully.
     */
    public function test_author_can_be_updated_successfully()
    {
        $author = Author::factory()->create();
        
        $updateData = [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(),
        ];

        $response = $this->put(route('authors.update', $author->id), $updateData);

        $response->assertRedirect(route('authors.index'));
        $response->assertSessionHas('success', 'تم تحديث المؤلف بنجاح');
        
        $this->assertDatabaseHas('authors', [
            'id' => $author->id,
            'name' => $updateData['name'],
            'description' => $updateData['description'],
        ]);
    }

    /**
     * Test that an author can be deleted successfully.
     */
    public function test_author_can_be_deleted_successfully()
    {
        $author = Author::factory()->create();

        $response = $this->delete(route('authors.destroy', $author->id));

        $response->assertRedirect(route('authors.index'));
        $response->assertSessionHas('success', 'تم حذف المؤلف بنجاح');
        
        $this->assertDatabaseMissing('authors', [
            'id' => $author->id,
        ]);
    }

    /**
     * Test that authors show page loads successfully.
     */
    public function test_authors_show_page_loads_successfully()
    {
        $author = Author::factory()->create();

        $response = $this->get(route('authors.show', $author->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.authors.show');
        $response->assertViewHas('author', $author);
    }
}
