<?php

declare(strict_types=1);

namespace Tests\Feature\Modules\SpecialDay;

use App\Modules\SpecialDay\Models\SpecialDay;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SpecialDayCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_ok()
    {
        $response = $this->getJson('/api/v1/special_days');
        $response->assertOk();
    }

    public function test_store_creates_resource()
    {
        $related = $this->createRelatedModels();

        $data = array_merge([
            'date' => '2025-12-25',
        ], $related);

        $response = $this->postJson('/api/v1/special_days', $data);
        $response->assertCreated();
    }

    public function test_show_returns_resource()
    {
        $model = SpecialDay::factory()->create();
        $response = $this->getJson("/api/v1/special_days/{$model->id}");
        $response->assertOk();
    }

    public function test_update_modifies_resource()
    {
        $model = SpecialDay::factory()->create();

        $data = array_merge([
            'date' => '2025-12-31',
        ], $this->createRelatedModels());

        $response = $this->putJson("/api/v1/special_days/{$model->id}", $data);
        $response->assertOk();
    }

    public function test_destroy_deletes_resource()
    {
        $model = SpecialDay::factory()->create();
        $response = $this->deleteJson("/api/v1/special_days/{$model->id}");
        $response->assertNoContent();
    }

    protected function createRelatedModels(): array
    {
        // This will be replaced dynamically
        return [

        ];
    }
}
