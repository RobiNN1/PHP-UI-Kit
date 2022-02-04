<ol class="breadcrumb<?=$this->e($class, 'space')?>" aria-label="breadcrumb"<?=$this->space($attributes)?>>
    {% for title,link in links %}
        {% if loop.last %}
            <li class="breadcrumb-item<?=$this->e($item_class, 'space')?> active" aria-current="page">{{ title|raw }}</li>
        {% else %}
            <li class="breadcrumb-item<?=$this->e($item_class, 'space')?>"><a href="{{ link }}">{{ title|raw }}</a></li>
        <?php endif ?>
    <?php endforeach ?>
</ol>
