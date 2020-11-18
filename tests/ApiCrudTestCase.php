<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiCrudTestCase extends TestCase {

    protected $model;
    protected $endpoint;

    use RefreshDatabase;

    public function testList()
    {
        $data = factory($this->model, 10)->create();
        $response = $this->getJson('api/v1/' . $this->endpoint);
        $response->assertStatus(200)->assertJson($data->toArray());
    }

    public function testShow()
    {
        $data = factory($this->model)->create();
        $response = $this->getJson('api/v1/' .$this->endpoint . '/' . $data->id);
        $response->assertStatus(200)->assertJson($data->toArray());
    }

    public function testNotFound()
    {
        $response = $this->getJson('api/v1/' .$this->endpoint . '/1');
        $response->assertStatus(404);
    }

    public function testInsert()
    {

        $data = factory($this->model)->make()->toArray();
        $response = $this->postJson('api/v1/' .$this->endpoint, $data);
        $response->assertStatus(200)->assertJson($data);
    }

    public function testUpdate()
    {
        $data = factory($this->model)->create();
        $dataToUpdate = factory($this->model)->make()->toArray();
        $response = $this->putJson('api/v1/' .$this->endpoint . '/' . $data->id, $dataToUpdate);
        $response->assertStatus(200)->assertJson($dataToUpdate);
    }

    public function testDelete()
    {
        $data = factory($this->model)->create();
        $response = $this->deleteJson('api/v1/' .$this->endpoint . '/' . $data->id, ['id'=>$data->id]);
        $response->assertStatus(200)->assertJson($data->toArray());
    }

}
