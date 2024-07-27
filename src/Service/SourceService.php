<?php

declare(strict_types=1);

namespace App\Service;

class SourceService
{
    private string|false|null $data = null;

    public function load(?string $path = null): string|false
    {
        $path = $path ?: 'patient.json';

        if (!file_exists($path)) {
            $path = APPLICATION_PATH . '/' . $path;
        }

        return $this->data = file_get_contents($path);
    }

    public function getFormatted(): array
    {
        if (null === $this->data) {
            $this->load();
        }
        return json_decode($this->data, true);
    }
}
