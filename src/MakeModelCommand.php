<?php

namespace Aixieluo\LaravelModelTrait;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class MakeModelCommand extends GeneratorCommand
{
    protected $signature = 'make:model2 {name} {--t} {--m}';

    protected $type = 'Model';

    protected $description = '自动创建模型，模型对应Trait，模型表，--t表示创建trait，--m表示创建表';

    public function getStub()
    {
        return __DIR__ . '/../Stubs/Dummy.stub';
    }

    public function handle()
    {
        $name = $this->argument('name');
        parent::handle();
        if ($this->option('t')) {
            Artisan::call("make:model-trait {$name}Trait");
        }
        if ($this->option('m')) {
            $tableName = Str::plural(Str::snake($name));
            Artisan::call("make:migration create_{$tableName}_table --create={$tableName}");
        }
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Models';
    }

    public function success(string $type)
    {
        $this->info($type ?? $this->type . ' created successfully.');
    }
}
