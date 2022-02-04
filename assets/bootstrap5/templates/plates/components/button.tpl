{% set state_classes = (active ? ' active' : '') ~ (disabled ? ' disabled' : '') %}
{% set icon = icon ? '<i class="'~ icon ~'"></i>' : '' %}
{% set button_title = (not icon_right ? icon : '')|space(true) ~ title ~ (icon_right ? icon : '')|space %}

{% if link %}
    <a href="{{ link }}" class="btn {{ color ~ size|space ~ class|space ~ state_classes }}"<?=$this->space($attributes)?>>{{ button_title|raw }}</a>
{% else %}
    <button type="{{ type }}" class="btn {{ color ~ size|space ~ class|space ~ state_classes }}"<?=$this->space($attributes)?>>{{ button_title|raw }}</button>
<?php endif ?>
