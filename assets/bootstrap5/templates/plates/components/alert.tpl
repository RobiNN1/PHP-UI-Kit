<div class="alert {{ color }}<?=$this->e($class, 'space')?>{{ dismiss ? ' alert-dismissible' : '' }}" role="alert"<?=$this->space($attributes)?>>
    {{ text|raw }}
    {% if dismiss %}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <?php endif ?>
</div>
