<?php


namespace App\Http\Controllers\Admin\Concerns;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HandlesUploads
{
    protected function storeUpload(UploadedFile $file, string $directory): string
    {
        return $file->store($directory, 'public');
    }

    protected function replaceUpload(?string $oldPath, UploadedFile $file, string $directory): string
    {
        $this->deleteUpload($oldPath);

        return $this->storeUpload($file, $directory);
    }

    protected function deleteUpload(?string $path): void
    {
        if ($path) {
            Storage::disk('public')->delete($path);
        }
    }

    protected function parseCommaList(?string $value): array
    {
        if (blank($value)) {
            return [];
        }

        return collect(explode(',', $value))
            ->map(fn ($item) => trim($item))
            ->filter()
            ->values()
            ->all();
    }

    protected function parseResultLines(?string $value): array
    {
        if (blank($value)) {
            return [];
        }

        return collect(explode("\n", $value))
            ->map(fn ($line) => trim($line))
            ->filter()
            ->map(function ($line) {
                [$value, $label] = array_pad(explode('|', $line, 2), 2, '');

                return ['value' => trim($value), 'label' => trim($label)];
            })
            ->filter(fn ($result) => $result['value'] !== '' || $result['label'] !== '')
            ->values()
            ->all();
    }

    protected function formatResultLines(?array $results): string
    {
        if (empty($results)) {
            return '';
        }

        return collect($results)
            ->map(fn ($result) => trim($result['value'] ?? '') . ' | ' . trim($result['label'] ?? ''))
            ->implode("\n");
    }
}