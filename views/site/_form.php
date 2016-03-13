<?php
/**
 * Created by PhpStorm.
 * User: aza
 * Date: 3/13/2016
 * Time: 12:17 PM
 */

/* @var $this yii\web\View */
/* @var $model app\models\Employee */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput; ?>

<?php $form = ActiveForm::begin([
    'id' => $model->isNewRecord ? 'create-employee-form' : 'update-employee-form',
    'options' => ['class' => 'input-form'],
    'action' => $model->isNewRecord ? '/site/create' : '/site/update?id=' . $model->id,
    'enableAjaxValidation' => true,
    'validationUrl' => $model->isNewRecord ? ['site/validate-create'] : ['site/validate-update?id=' . $model->id]]);
?>

    <div class="modal-body">
        <div class="input-data">
            <div class="input-block clearfix ">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="input-data">
            <div class="input-block clearfix ">
                <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="input-data">
            <div class="input-block clearfix ">
                <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="input-data">
            <div class="input-block clearfix ">
                <?= $form->field($model, 'phone')->textInput(['maxlength' => 20])->widget(MaskedInput::className(), [
                    'mask' => '+7 (999) 999-9999',
                ]) ?>
            </div>
        </div>
        <div class="input-data">
            <div class="input-block clearfix ">
                <?= $form->field($model, 'floor')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="input-data">
            <div class="input-block clearfix ">
                <?= $form->field($model, 'cabinet')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>