<div id="carousel-<?=$this->e($id)?>" class="carousel slide<?=$this->e($class, 'space')?>" data-bs-ride="carousel"<?=$this->space($attributes)?>>
    {% if indicators %}
        <div class="carousel-indicators">
            {% for slide in slides %}
                <button type="button" data-bs-target="#carousel-<?=$this->e($id)?>" data-bs-slide-to="{{ loop.index0 }}"{{ loop.first ? ' class="active" aria-current="true"' : ''|raw }}></button>
            <?php endforeach ?>
        </div>
    <?php endif ?>
    <div class="carousel-inner">
        {% for slide in slides %}
            <div class="carousel-item<?=$this->e($item_class, 'space')?>{{ loop.first ? ' active' : '' }}">{{ slide|raw }}</div>
        <?php endforeach ?>
    </div>

    {% if controls %}
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-<?=$this->e($id)?>" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel-<?=$this->e($id)?>" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    <?php endif ?>
</div>
