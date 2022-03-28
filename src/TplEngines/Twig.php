<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RobiNN\UiKit\TplEngines;

use RobiNN\UiKit\Config;
use RobiNN\UiKit\UiKit;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class Twig implements ITplEngine {
    /**
     * @var Environment
     */
    private Environment $twig;

    /**
     * Init TPL engine.
     *
     * @param UiKit  $uikit
     * @param Config $config
     * @param ?array $paths
     *
     * @return Environment
     */
    public function init(UiKit $uikit, Config $config, ?array $paths = null): Environment {
        $loader = new FilesystemLoader($config->getFrameworkPath($config->getFramework()).'/templates/twig');

        $this->twig = new Environment($loader, [
            'cache' => $config->getCache(),
            'debug' => $config->getDebug(),
        ]);

        foreach ($paths as $path) {
            if (!empty($path)) {
                $loader->addPath(realpath($path));
            }
        }

        if ($config->getDebug()) {
            $this->twig->addExtension(new DebugExtension());
        }

        $this->twig->addExtension(new TwigUiKitExtension($uikit));

        return $this->twig;
    }

    /**
     * Render template.
     *
     * @param string $tpl
     * @param array  $data
     *
     * @return string
     */
    public function render(string $tpl, array $data = []): string {
        try {
            return $this->twig->render($tpl.'.twig', $data);
        } catch (\Exception $e) {
            die($e->getMessage().' File: '.$e->getFile().' Line: '.$e->getLine());
        }
    }
}
