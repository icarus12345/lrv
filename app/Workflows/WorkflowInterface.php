<?php

namespace App\Workflows;

interface WorkflowInterface
{
    public function run();

    public function succeeded();

    public function getResult();
}
