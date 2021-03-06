<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 2/24/2020
 * Time: 12:13 PM
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="card-body">



                    <?php




                    $form = ActiveForm::begin(); ?>
                <div class="row">
                    <div class="col-md-12">



                            <table class="table">
                                <tbody>

                                <tr>
                                    <?= $form->field($model, 'Position')->textInput() ?>
                                </tr>
                                <tr>
                                    <?= $form->field($model, 'Job_Description')->textInput() ?>
                                </tr>

                                <tr>
                                    <?= $form->field($model, 'Institution')->textInput() ?>
                                </tr>

                                <tr>
                                    <?= $form->field($model, 'Currently_Working_Here')->checkbox() ?>
                                </tr> 

                                <tr>
                                    <?= $form->field($model, 'Start_Date')->textInput(['type' => 'date']) ?>
                                </tr>
                                <tr>
                                    <?= $form->field($model, 'End_Date')->textInput(['type' => 'date']) ?>
                                </tr>
                                                          

                                <tr>
                                    <?= $form->field($model, 'Job_Responsibility')->textArea(['rows' => '4']) ?>
                                </tr>
                                
                                <tr>
                                    <?= $form->field($model, 'Key')->hiddenInput()->label(false) ?>
                                </tr>

                                </tbody>
                            </table>



                    </div>




                </div>












                <div class="row">

                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>


                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

<?php

$script = <<<JS
    $(function(){
        $('#experience-currently_working_here').on('change', function(){

            if ($(this).is(":checked")){
                $('#experience-end_date').prop('disabled', true)
            }else{
                $('#experience-end_date').prop('disabled', false)
            }
        });

        $('#qualification-qualification_code').select2();
    });
JS;

$this->registerJs($script);