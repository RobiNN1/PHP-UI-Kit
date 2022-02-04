<div class="dropdown<?=$this->e($class, 'space')?>"<?=$this->space($attributes)?>>
    {{ button|raw }}
    <ul class="dropdown-menu" aria-labelledby="dropdown-<?=$this->e($id)?>">
        {% for item in items %}
            {% if item == 'divider' %}
                <li>
                    <hr class="dropdown-divider">
                </li>
            {% elseif item.custom %}
                {{ item.custom|raw }}
            {% else %}
                {% if item.link %}
                    <li>
                        <a class="dropdown-item<?=$this->e($item_class, 'space')?>{{ item.class|space }}" href="{{ item.link }}">{{ item.title|raw }}</a>
                    </li>
                {% else %}
                    <li>
                        <span class="dropdown-item-text<?=$this->e($item_class, 'space')?>{{ item.class|space }}">{{ item.title|raw }}</span>
                    </li>
                <?php endif ?>
            <?php endif ?>

        <?php endforeach ?>
    </ul>
</div>
