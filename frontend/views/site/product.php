<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
$this->title = 'Rialachas | Our Developed Products';
?>

<div class="login-content2 first-content parallax" id="index-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="index-intro2">
                    <h3 class="text-bold text-upper">Our Developed Products</h3>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="process">
    <div class="title-section text-center">
        <span>Our Developed Products</span>
    </div>
    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
                <div class="process-item">
                    <div class="row">
                        <div class="col-md-4">
                            <div>&nbsp;</div>
                            <div class="process-img">
                                <?= Html::img('@web/uploads/enterpreneurial.png', []); ?>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="process-content">
                                <i class="fa fa-quote-left fa-3x fa-pull-left fa-border"></i>
                                Our development team has engineered some innovative applications that enable our customers to achieve their objectives.  We offers wide range of products in information systems. Following are the names of our product and  we are planning to launch more product this year in order to reach our potential customers in realizing IT value to their business.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div>&nbsp;</div>
            </div>
        </div>
    </div>
</div>

<div class="services" id="features">
    <div class="container">
        <div class="row">
            <?php \yii\widgets\Pjax::begin(['id'=>'pjax-news', 'timeout' => false,'enablePushState' => false,'linkSelector' => 'a.download']); ?>                   
            <?php
                $dataProvider = new ActiveDataProvider([
                    'query' => $products,
                    'pagination' => [
                        'pageSize' => 6,
                    ],
                ]);
                
                echo ListView::widget([
                    'id'=>'record-gridview',
                    'dataProvider' => $dataProvider,
                    'itemView' => '_product',
                    'itemOptions'=>['tag'=>'div', 'class'=>'grid-itemx'],
                    'options'=>['class'=>'gridx', 'tag'=>'div'],
                    'layout' => '{items}<div class="grid-item" style="display:block; width:100% !important;">{pager}</div>'
                ]);
        
                
            ?>
            <?php \yii\widgets\Pjax::end(); ?>
            
        </div>
    </div>
    <div>&nbsp;</div>
</div>