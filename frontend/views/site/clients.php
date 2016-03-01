<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
$this->title = 'PT Rialachas | Our Partners & Clients';
?>

<div class="login-content2 first-content parallax" id="index-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="index-intro2">
                    <h3 class="text-bold text-upper">Clients</h3>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="process">
    <div class="title-section text-center">
        <span>Our Clients</span>
    </div>
    <div class="container">
        <div class="row"> 
            <?php \yii\widgets\Pjax::begin(['id'=>'pjax-news', 'timeout' => false,'enablePushState' => false,'linkSelector' => 'a.download']); ?>                   
            <?php
                $dataProvider = new ActiveDataProvider([
                    'query' => $clients,
                    'pagination' => [
                        'pageSize' => 10,
                    ],
                ]);
                
                echo ListView::widget([
                    'id'=>'record-gridview',
                    'dataProvider' => $dataProvider,
                    'itemView' => '_partners',
                    'itemOptions'=>['tag'=>'div', 'class'=>'grid-itemx'],
                    'options'=>['class'=>'gridx', 'tag'=>'div'],
                    'layout' => '{items}<div class="grid-item" style="display:block; width:100% !important;">{pager}</div>'
                ]);
        
                
            ?>
            <?php \yii\widgets\Pjax::end(); ?>           
            
            <div class="col-md-12"> 
            &nbsp;
            </div>
        </div>
    </div>
</div>