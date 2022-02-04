<div class="card<?=$this->e($class, 'space')?>"<?=$this->space($attributes)?>>
    {% if top_img %}
        <img class="card-img-top" src="{{ top_img.src }}" alt="{{ top_img.alt }}">
    <?php endif ?>
    {% if header %}
        <div class="card-header">{{ header|raw }}</div>
    <?php endif ?>
    {{ top|raw }}
    {% if body %}
        <div class="card-body">{{ body|raw }}</div>
    <?php endif ?>
    {{ bottom|raw }}
    {% if footer %}
        <div class="card-footer">{{ footer|raw }}</div>
    <?php endif ?>
</div>
