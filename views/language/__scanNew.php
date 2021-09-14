<?php
/**
 * @author Lajos Molnár <lajax.m@gmail.com>
 *
 * @since 1.4
 */

/* @var $this \yii\web\View */
/* @var $newDataProvider \yii\data\ArrayDataProvider */

use kartik\grid\GridView;

?>

<?php if ($newDataProvider->totalCount > 0) : ?>

    <?=

    GridView::widget([
        'id' => 'added-source',
        'dataProvider' => $newDataProvider,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            'category',
            'message',
        ],
    ]);

    ?>

<?php endif; ?>
