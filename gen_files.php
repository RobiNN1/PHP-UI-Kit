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

$arr = [];
foreach (explode('_', $tpl) as $tpl_name) {
    $arr[] = ucfirst($tpl_name);
}

$name = implode('', $arr);

$tpl_content = '<div class="{{ class|space }}"{{ attributes|space|raw }}></div>';

file_put_contents(__DIR__.'/resources/bootstrap5/templates/twig/form/'.$tpl.'.twig', $tpl_content);
file_put_contents(__DIR__.'/resources/semanticui2/templates/twig/form/'.$tpl.'.twig', $tpl_content);

$class = '<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RobiNN\UiKit\Components\Form;

use RobiNN\UiKit\Components\Component;

class '.$name.' extends Component {
    /**
     * @param array $options Additional options. Default value: []
     *
     * @return string
     */
    public function render(array $options = []): string {
        $options = array_merge([
            \'id\'         => \'\', // Wrapper ID.
            \'class\'      => \'\', // Class for wrapper.
            \'attributes\' => [], // Array of custom attributes, set null as value for attributes without value. E.g. [\'attr\' => \'value\', \'attr2\' => null]
        ], $options);

        $context = [
            \'class\'      => $options[\'class\'],
            \'attributes\' => $this->getAttributes($options[\'attributes\'], $options[\'id\']),
        ];

        return $this->uikit->renderTpl(\'form/'.$tpl.'\', $context);
    }
}
';

file_put_contents(__DIR__.'/src/Components/Form/'.$name.'.php', $class);

$test = '<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Components\Form;

use Tests\ComponentTestCase;

class '.$name.'Test extends ComponentTestCase {
    public function test'.$name.'Render(): void {
        $tpl = $this->uikit->'.$tpl.'->render();

        $expected = \'\';

        $this->assertComponentRenders($expected, $tpl);
    }
}
';

file_put_contents(__DIR__.'/tests/Components/Form/'.$name.'Test.php', $test);

echo 'Successfully generated component.';
exit(0);
