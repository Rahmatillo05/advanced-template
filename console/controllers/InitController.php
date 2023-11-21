<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\helpers\BaseConsole;

class InitController extends Controller
{

    public function actionIndex(): void
    {
        $env_path = __DIR__ . '/../../.env';
        $env_example_path = __DIR__ . '/../../.env.example';
        if (!file_exists($env_path)) {
            copy($env_example_path, $env_path);
            $this->stdout("File .env created.\n", BaseConsole::FG_GREEN);
        } else{
            $this->stdout("File .env already exists.\n", BaseConsole::FG_YELLOW);
        }

        $bash_query = "php yii migrate --interactive=0 --migrationPath=@frontend/modules/file/migrations";
        $output = shell_exec($bash_query);
        $this->stdout("Running: $bash_query\n", BaseConsole::FG_YELLOW);
        $this->stdout($output, BaseConsole::FG_GREEN);
    }

}