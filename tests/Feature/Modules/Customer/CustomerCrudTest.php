<?php

declare(strict_types=1);

namespace Tests\Feature\Modules\Customer;

use App\Modules\Customer\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_ok()
    {
        $response = $this->getJson('/api/v1/customers');
        $response->assertOk();
    }

    public function test_store_creates_resource()
    {
        $related = $this->createRelatedModels();

        $data = array_merge([
            'name' => 'test',
            'email' => 'test',
        ], $related);

        $response = $this->postJson('/api/v1/customers', $data);
        $response->assertCreated();
    }

    public function test_show_returns_resource()
    {
        $model = Customer::factory()->create();
        $response = $this->getJson("/api/v1/customers/{$model->id}");
        $response->assertOk();
    }

    public function test_update_modifies_resource()
    {
        $model = Customer::factory()->create();

        $data = array_merge([
            'name' => 'test',
            'email' => 'test',
        ], $this->createRelatedModels());

        $response = $this->putJson("/api/v1/customers/{$model->id}", $data);
        $response->assertOk();
    }

    public function test_destroy_deletes_resource()
    {
        $model = Customer::factory()->create();
        $response = $this->deleteJson("/api/v1/customers/{$model->id}");
        $response->assertNoContent();
    }

    protected function createRelatedModels(): array
    {
        // This will be replaced dynamically
        return [

        ];
    }
}
