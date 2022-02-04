<ul class="list-group<?=$this->e($class, 'space')?>"<?=$this->space($attributes)?>>
    {% for item in items %}
        <li class="list-group-item<?=$this->e($item_class, 'space')?>">{{ item|raw }}</li>
    <?php endforeach ?>
</ul>
