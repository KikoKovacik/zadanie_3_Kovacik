<?php

namespace App\Core;

use JsonException;

class Database
{
    /**
     * @var array<string, mixed>
     */
    private array $config;

    public function __construct(string $configPath = __DIR__ . '/db/config.php')
    {
        $loadedConfig = file_exists($configPath) ? require $configPath : [];
        $this->config = is_array($loadedConfig) ? $loadedConfig : [];
    }

    /**
     * Jednotne miesto pre "spojenie" - pri JSON projekte vraciame konfiguraciu.
     *
     * @return array<string, mixed>
     */
    public function getConnection(): array
    {
        return $this->config;
    }

    protected function getConfig(string $key, mixed $default = null): mixed
    {
        return $this->config[$key] ?? $default;
    }

    /**
     * @return array<int|string, mixed>
     */
    protected function getJsonData(string $configKey): array
    {
        $jsonPath = $this->getConfig($configKey);
        if (!is_string($jsonPath) || !file_exists($jsonPath)) {
            return [];
        }

        $content = file_get_contents($jsonPath);
        if ($content === false) {
            return [];
        }

        try {
            $decoded = json_decode($content, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            return [];
        }

        return is_array($decoded) ? $decoded : [];
    }
}
