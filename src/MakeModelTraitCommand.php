<?php

namespace Aixieluo\LaravelModelTrait;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class MakeModelTraitCommand extends GeneratorCommand
{
    protected $signature = 'make:model-trait {name}';

    protected $description = '创建一个模型trait';

    public function getStub()
    {
        return __DIR__ . '/../Stubs/DummyTrait.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Models\Traits';
    }

    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());
        $custom = str_replace('Trait', '', Str::of($name)->explode("\\")->last());

        return $this->replaceNamespace($stub, $name)->replaceCustomStr($stub, $custom)->replaceClass($stub, $name);
    }

    public function replaceCustomStr(&$stub, $custom)
    {
        $stub = str_replace('{{custom}}', $custom, $stub);

        return $this;
    }
}
