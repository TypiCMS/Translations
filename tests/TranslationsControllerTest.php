<?php

use TypiCMS\Modules\Translations\Models\Translation;

class TranslationsControllerTest extends TestCase
{
    public function testAdminIndex()
    {
        $response = $this->call('GET', 'admin/translations');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStoreFails()
    {
        $input = [];
        $this->call('POST', 'admin/translations', $input);
        $this->assertRedirectedToRoute('admin.translations.create');
        $this->assertSessionHasErrors('key');
    }

    public function testStoreSuccess()
    {
        $object = new Translation();
        $object->id = 1;
        Translation::shouldReceive('create')->once()->andReturn($object);
        $input = ['key' => 'test'];
        $this->call('POST', 'admin/translations', $input);
        $this->assertRedirectedToRoute('admin.translations.edit', ['id' => 1]);
    }

    public function testStoreSuccessWithRedirectToList()
    {
        $object = new Translation();
        $object->id = 1;
        Translation::shouldReceive('create')->once()->andReturn($object);
        $input = ['key' => 'test', 'exit' => true];
        $this->call('POST', 'admin/translations', $input);
        $this->assertRedirectedToRoute('admin.translations.index');
    }
}
