<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace RobiNN\UiKit\TplEngines\Twig;

use Exception;
use RobiNN\UiKit\Config;
use RobiNN\UiKit\TplEngines\TplEngineInterface;
use RobiNN\UiKit\UiKit;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class Twig implements TplEngineInterface {
    /**
     * @var Environment
     */
    private Environment $twig;

    /**
     * Init TPL engine.
     *
     * @param UiKit               $uikit
     * @param Config              $config
     * @param ?array<int, string> $paths
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
                try {
                    $loader->addPath(realpath($path));
                } catch (LoaderError $e) {
                    echo $e->getMessage();
                }
            }
        }

        if ($config->getDebug()) {
            $this->twig->addExtension(new DebugExtension());
        }

        $this->twig->addExtension(new TwigUiKitExtension($uikit));

        $this->twig->addGlobal('current_framework', $uikit->config->getFramework());

        return $this->twig;
    }

    /**
     * Render template.
     *
     * @param string               $tpl
     * @param array<string, mixed> $data
     * @param bool                 $string
     *
     * @return string
     */
    public function render(string $tpl, array $data = [], bool $string = false): string {
        try {
            if ($string) {
                return $this->twig->createTemplate($tpl)->render($data);
            }

            return $this->twig->render($tpl.'.twig', $data);
        } catch (Exception $e) {
            exit($e->getMessage().' in '.$e->getFile().' at line: '.$e->getLine());
        }
    }
}
