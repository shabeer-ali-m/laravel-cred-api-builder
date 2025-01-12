<?php

namespace Laravel\CredApiBuilder\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CredApiBuilderCommand extends Command
{
    protected $signature = 'make:cred-api {name} {model?}';

    protected $description = 'Generate the required files for the CRED API based on a name';

    public function handle()
    {
        $name = $this->argument('name');
        $model = $this->argument('model') ?? $name;

        // Validate name
        if (!preg_match('/^[a-zA-Z][a-zA-Z0-9_]*$/', $name)) {
            $this->error('Invalid name. Must be a valid PHP namespace.');
            return 1;
        }


        $namespace = 'App';
        $paths = [
            'Controllers' => "app/Http/Controllers/Api/{$name}Controller.php",
            'Requests'    => "app/Http/Requests/{$name}Request.php",
            'Services'    => "app/Services/{$name}Service.php",
            'Resources'   => "app/Http/Resources/{$name}Resource.php",
        ];

        foreach ($paths as $type => $path) {
            $folder = dirname($path);
            if (!File::exists($folder)) {
                File::makeDirectory($folder, 0755, true);
                $this->info("Created directory: $folder");
            }

            $stub = file_get_contents(__DIR__ . "/../Stubs/{$type}.stub");
            $content = str_replace(
                ['{{ modelName }}', '{{ modelname }}', '{{ className }}', '{{ classname }}'],
                [$model, strtolower($model), $name, strtolower($name)],
                $stub
            );

            File::put(base_path($path), $content);
            $this->info("Created $type: $path");
        }

        $this->info("Generating CRED API files for $name");

        return 0;
    }
}
