<?php
/**
 * Created by PhpStorm.
 * User: aza
 * Date: 3/13/2016
 * Time: 12:41 PM
 */

/* @var $model app\models\Employee */
?>

<tr class="<?='employee-row-' . $model->id?>">
    <td><?=$model->name?></td>
    <td><?=$model->surname?></td>
    <td><?=$model->patronymic?></td>
    <td><?=$model->phone?></td>
    <td><?=$model->floor?></td>
    <td><?=$model->cabinet?></td>

    <?php if(!Yii::$app->user->isGuest){?>
    <td>
        <a href="javascript:void(0)" class="js-update-employee" data-id="<?=$model->id?>"><span class="glyphicon glyphicon-pencil"></span></a>
        <a href="javascript:void(0)" class="js-delete-employee" data-id="<?=$model->id?>"><span class="glyphicon glyphicon-trash"></span></a>
    </td>
    <?php }?>
</tr>
