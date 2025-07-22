<?php

namespace App\Services;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use App\Services\Clocker;

class PageTracker
{
    public function __construct(
        private Filesystem $fs,
        private string $filename,
        private Clocker $clock
    ) {}

    public function track(string $page): void
    {
        $data = [];

        if ($this->fs->exists($this->filename)) {
            $content = file_get_contents($this->filename);
            $data = json_decode($content, true) ?? [];
        }

        if (!isset($data[$page])) {
            $data[$page] = ['count' => 0, 'last_visit' => null];
        }

        $data[$page]['count']++;
        $data[$page]['last_visit'] = $this->clock->now();

        $this->fs->dumpFile($this->filename, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function getStats(): array
    {
        if (!$this->fs->exists($this->filename)) {
            return [];
        }

        $content = file_get_contents($this->filename);
        return json_decode($content, true) ?? [];
    }
}
