<?php

namespace Styde\Html\Tests;

use Illuminate\Support\Facades\Artisan;

class FormMakeCommandTest extends TestCase
{
    /** @test */
    function it_can_run_the_make_command()
    {        
        unlink(app_path('Http/Forms/UserForm.php'));
        unlink(app_path('Http/Forms/FormModel.php'));
        rmdir(app_path('Http/Forms'));
        $this->assertDirectoryNotExists(app_path('Http/Forms'));

        $result = Artisan::call('make:form', ['name' => 'UserForm']);

        $this->assertDirectoryExists(app_path('Http/Forms'));
        $this->assertFileExists(app_path('Http/Forms/UserForm.php'));
        $this->assertFileExists(app_path('Http/Forms/FormModel.php'));
    }
}