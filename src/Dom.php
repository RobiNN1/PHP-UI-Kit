<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RobiNN\UiKit;

use DOMDocument;

class Dom {
    /**
     * @var DOMDocument
     */
    private readonly DOMDocument $dom;

    /**
     * @param string $html
     */
    function __construct(string $html) {
        $this->dom = new DOMDocument;
        $this->dom->loadHTML($html);

        // remove doctype, html and body
        $this->dom->removeChild($this->dom->doctype);
        $this->dom->replaceChild($this->dom->firstChild->firstChild->firstChild, $this->dom->firstChild);
    }

    /**
     * Get tag attribute value.
     *
     * @param string $tagname
     * @param string $attr
     *
     * @return ?string
     */
    public function getAttr(string $tagname, string $attr): ?string {
        $tags = $this->dom->getElementsByTagName($tagname);

        if ($tags->length !== 0) {
            foreach ($tags as $tag) {
                return $tag->getAttribute($attr);
            }
        }

        return null;
    }

    /**
     * Add attribute to tag.
     *
     * @param string     $tagname
     * @param string     $attr
     * @param int|string $value
     *
     * @return void
     */
    public function setAttr(string $tagname, string $attr, int|string $value): void {
        $tags = $this->dom->getElementsByTagName($tagname);

        if ($tags->length !== 0) {
            foreach ($tags as $tag) {
                $class = '';
                if ($attr === 'class') {
                    $current = $tag->getAttribute($attr);
                    $class = !empty($current) ? $current.' ' : $current;
                }
                $tag->setAttribute($attr, $class.$value);
            }
        }
    }

    /**
     * Remove attribute from tag.
     *
     * @param string $tagname
     * @param string $attr
     *
     * @return void
     */
    public function removeAttr(string $tagname, string $attr): void {
        $tags = $this->dom->getElementsByTagName($tagname);

        if ($tags->length !== 0) {
            foreach ($tags as $tag) {
                $tag->removeAttribute($attr);
            }
        }
    }

    /**
     * Save html.
     *
     * @return bool|string
     */
    public function save(): bool|string {
        return $this->dom->saveHTML();
    }
}
