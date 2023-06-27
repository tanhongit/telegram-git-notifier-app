<?php

namespace TelegramGithubNotify\App\Helpers;

class ConfigHelper
{
    public array $config;
    public const VIEW_PATH = 'resources';

    public function __construct()
    {
        $this->config = require __DIR__ . '/../../config/tg-notifier.php';
    }

    /**
     * Handle config and return value
     *
     * @param string $string
     * @return array|mixed
     */
    public function execConfig(string $string): mixed
    {
        $config = explode('.', $string);
        $result = $this->config;
        foreach ($config as $value) {
            $result = $result[$value];
        }
        return $result;
    }

    /**
     * Return template data
     *
     * @param $partialPath
     * @param array $data
     * @return bool|string
     */
    public function getEventTemplate($partialPath, array $data = []): bool|string
    {
        $viewPathFile = self::VIEW_PATH . '/' . str_replace('.', '/', $partialPath) . '.php';

        if (!file_exists($viewPathFile)) {
            return '';
        }

        extract($data);

        ob_start();
        require $viewPathFile;
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}
