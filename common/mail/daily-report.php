<?php
use yii\helpers\Html;
use yii\helpers\Url;
use backend\models\DailyReport;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use backend\components\CountTotal;
$model = DailyReport::findOne($id)


/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\BaseMessage instance of newly created mail message */

?>
<table class="body-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">
<tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; margin: 0;">
    <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; margin: 0;" valign="top"></td>
    <td class="container" width="600" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
        <div class="content" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
            <table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;" bgcolor="#fff">
                <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; margin: 0;">
                    <td class="alert alert-warning" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 16px; vertical-align: top; color: #fff; font-weight: 500; text-align: left; border-radius: 3px 3px 0 0; background-color: #FF9F00; margin: 0; padding: 20px;" align="center" bgcolor="#FF9F00" valign="top">
                        <strong>DAILY REPORT</strong>
                    </td>
                </tr>
                <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; margin: 0;">
                    <td class="content-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
                        <table width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; margin: 0;">
                            
                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; margin: 0;">
                                <td class="content-block" style="position:relative; border-bottom:1px dashed #333; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                    <img src="<?= $message->embed($imageFileName); ?>" style="background:#fff; width:300px;">
                                </td>
                            </tr>
                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 11px; margin: 0;">
                                <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 11px; vertical-align: top; margin: 0; padding: 20px 0 20px;" valign="top">
                                    <table>
                                        <tr>
                                            <td style="width:170px; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 11px; vertical-align: top; margin: 0; padding: 20px 0 20px;" valign="top">
                                                <img src="http://103.28.149.207/r-csrp/backend/web/uploads/employee/photo/<?= $model->employee->photo; ?>" style="width:150px;">
                                            </td>
                                            <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 11px; vertical-align: top; margin: 0; padding: 20px 0 20px;" valign="top">
                                                <table class="email-font">
                                                    <tr>
                                                        <td><strong>Name</strong></td>
                                                        <td> : <?= $model->employee->getName() ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Charged Hours</strong></td>
                                                        <td> : <?= CountTotal::pageTotal($model->getTasks()->where(['status'=>2])->orWhere(['status'=>1])->all(), 'hour').' Hours'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Date</strong></td>
                                                        <td> : <?= $model->date; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Last Cost</strong></td>
                                                        <td> : Rp.<?= (isset($model->employee->getLastCost()->cost_perhour)?number_format($model->employee->getLastCost()->cost_perhour,2):number_format(0,2)).' /Hour'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Last Rate</strong></td>
                                                        <td> : Rp.<?= (isset($model->employee->getLastCost()->rate_perhour)?number_format($model->employee->getLastCost()->rate_perhour,2):number_format(0,2)).' /Hour'; ?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 11px; margin: 0;">
                                <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 11px; vertical-align: top; margin: 0; padding: 20px 0 20px;" valign="top">
                                    <?php
                                        $finishedTasks = new ActiveDataProvider([
                                            'query' => $model->getTasks()->where(['status'=>2]),
                                        ]);

                                        echo GridView::widget([
                                        'dataProvider' => $finishedTasks,
                                        'summary' => '',
                                        'options' => [
                                            'class'=>'table'
                                        ],
                                        'showFooter'=>true,
                                        'columns' => [
                                                    
                                                        [
                                                            'attribute' => 'name',
                                                            'header' => 'Finished Tasks',
                                                            'content'=>function($data){
                                                                 return $this->render('@backend/views/dailyreport/_listemail', ['model'=>$data]);              
                                                            },
                                                            'contentOptions'=>[
                                                                'class'=>'email-font'
                                                            ],
                                                            'footer'=>'Chargeable Hour(s)',
                                                            'footerOptions'=>[
                                                                'class'=>'email-font'
                                                            ]
                                                        ],
                                                        [
                                                            'attribute' => 'value',
                                                            'format' => 'raw',
                                                            'header' => 'Hour',
                                                            'value'=>function ($model, $key, $index, $widget){
                                                                return $model->hour;                
                                                            },
                                                            'contentOptions'=>[
                                                                'class'=>'email-font'
                                                            ],
                                                            'footer'=>CountTotal::pageTotal($finishedTasks->models, 'hour'),
                                                            'footerOptions'=>[
                                                                'class'=>'email-font'
                                                            ]
                                                        ],
                                                        
                                                    ],
                                    ]); ?>
                                </td>
                            </tr>
                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 11px; margin: 0;">
                                <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 11px; vertical-align: top; margin: 0; padding: 20px 0 20px;" valign="top">
                                    <?php
                                        $outstandingTasks = new ActiveDataProvider([
                                            'query' => $model->getTasks()->where(['status'=>1]),
                                        ]);

                                        echo GridView::widget([
                                        'dataProvider' => $outstandingTasks,
                                        'summary' => '',
                                        'options' => [
                                            'class'=>'table'
                                        ],
                                        'showFooter'=>true,
                                        'columns' => [
                                                   
                                                        [
                                                            'attribute' => 'name',
                                                            'header' => 'Outstanding Tasks',
                                                            'content'=>function($data){
                                                                 return $this->render('@backend/views/dailyreport/_listemail', ['model'=>$data]);              
                                                            },
                                                            'contentOptions'=>[
                                                                'class'=>'email-font'
                                                            ],
                                                            'footer'=>'Chargeable Hour(s)',
                                                            'footerOptions'=>[
                                                                'class'=>'email-font'
                                                            ]
                                                        ],
                                                        [
                                                            'attribute' => 'value',
                                                            'format' => 'raw',
                                                            'header' => 'Hour',
                                                            'value'=>function ($model, $key, $index, $widget){
                                                                return $model->hour;                
                                                            },
                                                            'contentOptions'=>[
                                                                'class'=>'email-font'
                                                            ],
                                                            'footer'=>CountTotal::pageTotal($outstandingTasks->models, 'hour'),
                                                            'footerOptions'=>[
                                                                'class'=>'email-font'
                                                            ]
                                                        ],
                                                        
                                                    ],
                                    ]); ?>
                                </td>
                            </tr>
                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 11px; margin: 0;">
                                <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 11px; vertical-align: top; margin: 0; padding: 20px 0 20px;" valign="top">
                                    <?php
                                        $plannedTasks = new ActiveDataProvider([
                                            'query' => $model->getTasks()->where(['status'=>0]),
                                        ]);

                                        echo GridView::widget([
                                        'dataProvider' => $plannedTasks,
                                        'summary' => '',
                                        'options' => [
                                            'class'=>'table'
                                        ],
                                        'showFooter'=>true,
                                        'columns' => [
                                                   
                                                        [
                                                            'attribute' => 'name',
                                                            'header' => 'Planned Tasks',
                                                            'content'=>function($data){
                                                                 return $this->render('@backend/views/dailyreport/_listemail', ['model'=>$data]);              
                                                            },
                                                            'contentOptions'=>[
                                                                'class'=>'email-font'
                                                            ],
                                                            'footer'=>'Chargeable Hour(s)',
                                                            'footerOptions'=>[
                                                                'class'=>'email-font'
                                                            ]
                                                        ],
                                                        [
                                                            'attribute' => 'value',
                                                            'format' => 'raw',
                                                            'header' => 'Hour',
                                                            'value'=>function ($model, $key, $index, $widget){
                                                                return $model->hour;                
                                                            },
                                                            'contentOptions'=>[
                                                                'class'=>'email-font'
                                                            ],
                                                            'footer'=>CountTotal::pageTotal($plannedTasks->models, 'hour'),
                                                            'footerOptions'=>[
                                                                'class'=>'email-font'
                                                            ]
                                                        ],
                                                        
                                                    ],
                                    ]); ?>
                                </td>
                            </tr>
                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 11px; margin: 0;">
                                <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 11px; vertical-align: top; margin: 0; padding: 20px 0 20px;" valign="top">
                                    <?= GridView::widget([
                                            'dataProvider' => new ActiveDataProvider([
                                            'query' => $model->getNotes()->where(['type'=>1]),
                                        ]),
                                        'summary'=>'',
                                        'columns' => [
                                            [
                                                'attribute' => 'description',
                                                'header' => 'Notes',
                                                'format'=>'html',
                                                'contentOptions'=>[
                                                    'class'=>'email-font'
                                                ],
                                            ]
                                        ],
                                    ]); ?>
                                    <?= GridView::widget([
                                            'dataProvider' => new ActiveDataProvider([
                                            'query' => $model->getNotes()->where(['type'=>2]),
                                        ]),
                                        'summary'=>'',

                                        'columns' => [
                                            [
                                                'attribute' => 'description',
                                                'header' => 'Issue(s)',
                                                'format'=>'html',
                                                'contentOptions'=>[
                                                    'class'=>'email-font'
                                                ],
                                            ]
                                        ],
                                    ]); ?>
                                </td>
                            </tr>
                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; margin: 0;">
                                <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                    <a href="conservir.rialachas.com" class="btn-primary" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #348eda; margin: 0; border-color: #348eda; border-style: solid; border-width: 10px 20px;">Got To Conservir</a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </td>
    <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; margin: 0;" valign="top"></td>
</tr>
</table>