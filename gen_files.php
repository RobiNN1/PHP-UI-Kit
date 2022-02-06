<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (!isset($_SERVER['argv'][1])) {
    echo 'Enter component name (snake_case).';
    exit(1);
}

$tpl = $_SERVER['argv'][1];
$name_ = explode('_', $tpl);
$name = ucfirst($tpl);

$name__ = [];
if (count($name_) > 1) {
    foreach ($name_ as $value) {
        $name__[] = ucfirst($value);
    }

    $name = implode('', $name__);
}

$tpl_content = '<div class="{{ class|space }}"{{ attributes|space|raw }}></div>';

file_put_contents(__DIR__.'/assets/bootstrap5/templates/twig/components/'.$tpl.'.twig', $tpl_content);
file_put_contents(__DIR__.'/assets/semanticui2/templates/twig/components/'.$tpl.'.twig', $tpl_content);

$class = '<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RobiNN\UiKit\Components;

class '.$name.' extends Component {
    /**
     * @param array $options Additional options. Default value: []
     *
     * @return string
     */
    public function render(array $options = []): string {
        $component = \''.$tpl.'\';

        if (!$this->checkComponent($component)) {
            return $this->noComponentMsg($component);
        }

        $options = array_merge([
            \'class\'      => \'\', // Class for wrapper.
            \'attributes\' => [], // Array of custom attributes, set null as value for attributes without value. E.g. [\'attr\' => \'value\', \'attr2\' => null]
        ], $options);

        $context = [
            \'class\'      => $options[\'class\'],
            \'attributes\' => $this->getAttributes($options[\'attributes\']),
        ];

        return $this->uikit->renderTpl(\'components/\'.$component, $context);
    }
}';

file_put_contents(__DIR__.'/src/Components/'.$name.'.php', $class);

echo 'Successfully generated component.';
exit(0);
