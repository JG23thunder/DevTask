<?php 

$productsByType = [];

foreach ($params['products'] as $product) {
    $type = $product->type;
    if (!isset($productsByType[$type])) {
        $productsByType[$type] = [];
    }
    usort($productsByType[$type], function($a, $b) {
        return $a->id - $b->id;
    });
    $productsByType[$type][] = $product;
}
?>

<div class="wrapper">
    <form  action="/delete-multiple" id="delete_form" method="POST">
        <?php foreach ($productsByType as $type => $products): ?>
            <div class="container">
                <?php foreach ($products as $product): ?>
                    <div>
                        <label class="option_item">
                            <input type="checkbox" class="delete-checkbox" name="delete[<?= $product->id ?>]" value="<?= $product->id ?>"/>
                            <div class="option_inner">
                                <div class="tickmark"> </div>
                                <div className="icon"><i className="fab"> <?= $product->sku ?> </i></div>
                                <p><?= $product->name ?></p>
                                <p><?= $product->price ?>:00 $</p>
                                <?php if ($product->type === 'dvd'): ?>
                                    <p>Size: <?= $product->size ?> MB</p>
                                <?php elseif ($product->type === 'furniture'): ?>

                        <p> <span> Dimension:<?= $product->height ?>X<?= $product->width ?>X<?= $product->length?></span></p>
                                <?php elseif ($product->type === 'book'): ?>
                                    <p>Weight: <?= $product->weight ?> KG</p>
                                <?php endif; ?>
                            </div>
                        </label> 
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
      
    </form>
</div>
