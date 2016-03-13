<?php

/* @var $this yii\web\View */
/* @var $models app\models\Employee */

$this->title = '13.03.2016, task 1.0, yii 2.0.7';
?>

<div class="site-index">
    <div class="pull-left"><h1>Company phonebook</h1></div>

    <?php if(!Yii::$app->user->isGuest){?>
    <div class="pull-right"><button class="js-create-employee btn btn-primary"><span class="glyphicon glyphicon-plus"></span></button></div>
    <?php }?>

    <!--  Employees table  -->
    <table class="table table-bordered table-hover">
        <tbody class="js-employees-table">
            <tr class="info">
                <td>Name</td>
                <td>Surname</td>
                <td>Patronymic</td>
                <td>Phone</td>
                <td>Floor</td>
                <td>Cabinet</td>

                <?php if(!Yii::$app->user->isGuest){?>
                <td></td>
                <?php }?>
            </tr>
            <?php foreach($models as $model){echo $this->render('_employee_row', compact('model'));}?>
        </tbody>
    </table>
    <!--  /.table  -->
</div>


<!-- Modal create -->
<div class="modal fade modal-window" id="create-employee-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> <h4 class="modal-title">Create employee</h4></div>
            <?php $model = new \app\models\Employee();?>
            <?=$this->render('_form', compact('model'));?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- Modal update -->
<div class="modal fade modal-window" id="update-employee-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> <h4 class="modal-title">Update employee</h4></div>
            <div class="js-update-employee-wrap"></div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->