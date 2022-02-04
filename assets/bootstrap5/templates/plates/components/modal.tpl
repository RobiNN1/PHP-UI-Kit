{% if always_open == true %}
    {{ add_to_js("new bootstrap.Modal(document.getElementById('modal-"~ id ~"'), {}).show();") }}
<?php endif ?>

{% if hide_button == false %}
    {{ button|raw }}
<?php endif ?>

<div class="modal fade<?=$this->e($class, 'space')?>" id="modal-<?=$this->e($id)?>" tabindex="-1" aria-hidden="true"<?=$this->space($attributes)?>>
    <div class="modal-dialog{{ size|space }}">
        <div class="modal-content">
            {% if content.header or content.title or close_button == true %}
                <div class="modal-header">
                    {% if content.title %}
                        <h5 class="modal-title">{{ content.title|raw }}</h5>
                    <?php endif ?>

                    {{ content.header|raw }}

                    {% if close_button == true %}
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <?php endif ?>
                </div>
            <?php endif ?>
            {% if content.body %}
                <div class="modal-body">{{ content.body|raw }}</div>
            <?php endif ?>
            {% if content.footer %}
                <div class="modal-footer">{{ content.footer|raw }}</div>
            <?php endif ?>
        </div>
    </div>
</div>
