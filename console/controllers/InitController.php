<?php

namespace console\controllers;

use yii\console\Controller;
use yii\helpers\Console;

class InitController extends Controller
{

    public function actionIndex(): void
    {
        $env_path = __DIR__ . '/../../.env';
        $env_example_path = __DIR__ . '/../../.env.example';
        if (!file_exists($env_path)) {
            copy($env_example_path, $env_path);
            $this->stdout("File .env created.\n", Console::FG_GREEN);
        } else{
            $this->stdout("File .env already exists.\n", Console::FG_YELLOW);
        }

        $bash_query = "php yii migrate --interactive=0 --migrationPath=@frontend/modules/file/migrations";
        $output = shell_exec($bash_query);
        $this->stdout("Running: $bash_query\n", Console::FG_YELLOW);
        $this->stdout($output, Console::FG_GREEN);
    }

}