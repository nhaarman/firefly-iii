<?php
/**
 * CategoryControllerTest.php
 * Copyright (C) 2016 Sander Dorigo
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */


/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-01-19 at 15:39:27.
 */
class CategoryControllerTest extends TestCase
{

    /**
     * @covers FireflyIII\Http\Controllers\CategoryController::create
     */
    public function testCreate()
    {
        $this->be($this->user());
        $response = $this->call('GET', '/categories/create');
        $this->assertEquals(200, $response->status());
    }

    /**
     * @covers FireflyIII\Http\Controllers\CategoryController::delete
     */
    public function testDelete()
    {
        $this->be($this->user());
        $response = $this->call('GET', '/categories/delete/1');
        $this->assertEquals(200, $response->status());
    }

    /**
     * @covers FireflyIII\Http\Controllers\CategoryController::destroy
     */
    public function testDestroy()
    {
        $this->be($this->user());

        $args = [
            '_token' => Session::token(),
        ];

        $this->session(['categories.delete.url' => 'http://localhost']);

        $response = $this->call('POST', '/categories/destroy/2', $args);
        $this->assertSessionHas('success');
        $this->assertEquals(302, $response->status());
    }

    /**
     * @covers FireflyIII\Http\Controllers\CategoryController::edit
     */
    public function testEdit()
    {
        $this->be($this->user());
        $response = $this->call('GET', '/categories/edit/1');
        $this->assertEquals(200, $response->status());
    }

    /**
     * @covers FireflyIII\Http\Controllers\CategoryController::index
     */
    public function testIndex()
    {
        $this->be($this->user());
        $response = $this->call('GET', '/categories');
        $this->assertEquals(200, $response->status());
    }

    /**
     * @covers FireflyIII\Http\Controllers\CategoryController::noCategory
     */
    public function testNoCategory()
    {
        $this->be($this->user());
        $response = $this->call('GET', '/categories/list/noCategory');
        $this->assertEquals(200, $response->status());
    }

    /**
     * @covers FireflyIII\Http\Controllers\CategoryController::show
     */
    public function testShow()
    {
        $this->be($this->user());
        $response = $this->call('GET', '/categories/show/1');
        $this->assertEquals(200, $response->status());

    }

    /**
     * @covers FireflyIII\Http\Controllers\CategoryController::showWithDate
     */
    public function testShowWithDate()
    {
        $this->be($this->user());
        $response = $this->call('GET', '/categories/show/1/20150101');
        $this->assertEquals(200, $response->status());
    }

    /**
     * @covers FireflyIII\Http\Controllers\CategoryController::store
     */
    public function testStore()
    {
        $this->be($this->user());
        $this->session(['categories.create.url' => 'http://localhost']);
        $args = [
            '_token' => Session::token(),
            'name'   => 'Some kind of test cat.',
        ];

        $response = $this->call('POST', '/categories/store', $args);
        $this->assertEquals(302, $response->status());
        $this->assertSessionHas('success');
    }

    /**
     * @covers FireflyIII\Http\Controllers\CategoryController::update
     */
    public function testUpdate()
    {
        $this->be($this->user());
        $this->session(['categories.edit.url' => 'http://localhost']);
        $args = [
            '_token' => Session::token(),
            'name'   => 'Some kind of test category.',
        ];

        $response = $this->call('POST', '/categories/update/1', $args);
        $this->assertEquals(302, $response->status());
        $this->assertSessionHas('success');
    }
}