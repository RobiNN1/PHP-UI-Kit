<div class="btn-group{{ size|space }}<?=$this->e($class, 'space')?>" role="group"<?=$this->space($attributes)?>>
    {% for button in buttons %}
        {{ button|raw }}
    <?php endforeach ?>
</div>
