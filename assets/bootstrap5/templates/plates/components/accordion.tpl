<div class="accordion<?=$this->e($class, 'space')?>" id="accordion-<?=$this->e($id)?>"<?=$this->space($attributes)?>>
    <?php $i = 1; foreach($items as $title => $body): ?>
        <?php $collapse_id = $id.$i ?>

        <div class="accordion-item<?=$this->e($item_class, 'space')?>">
            <h2 class="accordion-header" id="heading-<?=$collapse_id?>">
                <button class="accordion-button<?=$first_open && $i == 1 ? '' : ' collapsed'?>" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapse-<?=$collapse_id?>" aria-expanded="true"
                        aria-controls="collapse-<?=$collapse_id?>"><?=$title?></button>
            </h2>
            <div id="collapse-<?=$collapse_id?>" class="accordion-collapse collapse<?=$first_open && $i == 1 ? ' show' : ''?>"
                 aria-labelledby="heading-<?=$collapse_id?>" data-bs-parent="#accordion-<?=$this->e($id)?>">
                <div class="accordion-body"><?=$body?></div>
            </div>
        </div>
    <?php $i++; endforeach ?>
</div>
