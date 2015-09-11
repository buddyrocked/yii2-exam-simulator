<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
$this->title = 'My Yii Application';
?>

<div class="login-content2 first-content parallax" id="index-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="index-intro2">
                    <h3 class="text-bold text-upper">Our Consultancy Services</h3>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="process">
    <div class="title-section text-center">
        <span>Our Consultancy Services</span>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="process-item">
                    <h3 class="text-upper text-bold">
                        Vulnerability Assessment and Penetration Testing
                    </h3>
                    <div class="process-img">
                        <?= Html::img('@web/uploads/it-uslugi_1.jpg', []); ?>
                    </div>
                    <div class="process-content">
                        <i class="fa fa-quote-left fa-3x fa-pull-left fa-border"></i>
                        Failure to manage proper security measure could result in inadequate security measures and excessive or unnecessary expenditure. An appropriate assessment promotes better targeting of security measures and facilitates better decision-making.

                        Vulnerability assessment focus is on potential vulnerabilities identified as misconfigurations, defects, and holes that compromise layer of security within the organizations' environment. As an optional service, penetration testing evaluates the security of a information systems by simulating attacks.

                        While delivering Vulnerability Assessment and Penetration Testing services, Rialachas team is fully equipped by variety of open-source and commercially available tools to perform scanning and simulating penetration.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="process-item">
                    <h3 class="text-upper text-bold">
                        IT Strategy and Enterprise Architecture
                    </h3>
                    <div class="process-img">
                        <?= Html::img('@web/uploads/enterpreneurial.png', []); ?>
                    </div>
                    <div class="process-content">
                        <i class="fa fa-quote-left fa-3x fa-pull-left fa-border"></i>
                        Rialachas provides consultancy to organisations in a number of areas, including  IT strategy development, solution architecture design, business process improvement, application and technology rationalisation, strategic platform and packaged application selection, rightsourcing strategy, Service Oriented Architecture (SOA) strategy and implementation, and IT governance process design and delivery.

                        In addition, we also support organization's enterprise architecture team with professional assistance and consultancy services for establishment of enterprise architecture function by providing strategic guidance related to enterprise architecture practice and delivery programs.    
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <hr />
            </div>
            <div class="col-md-12">
                <div class="process-item">
                    <h3 class="text-upper text-bold">
                        ISO 27001 Consultancy Services
                    </h3>
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
                                Rialachas ISO 27001 Consultancy Services helps organizations build an effective Information Security Management System (ISMS) through a set of related services. 

                                Our team comprising of ISO 27001 Lead Auditors, CISSP, CISM, CGEIT, CRISC and CISA professionals have the knowledge and skills to provide the consultancy services for the implementation of the Standard.
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
            <div class="col-md-4">                
                <div class="title-section">
                    <span>Our Services</span>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="services-item">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="text-center">
                                        <i class="fa fa-laptop fa-3x fa-pull-left"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="services-item-title">
                                        Vulnerability Assessment and Penetration Testing
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="services-item">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="text-center">
                                        <i class="fa fa-building-o fa-3x fa-pull-left"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="services-item-title">
                                        IT Strategy and Enterprise Architecture 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="services-item">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a class="btn btn-green btn-lg btn-block"> Our Services </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">   
                <div class="title-section">
                    <span></span>
                </div>
                <div class="service-img">             
                   <div class="mockup-browser">
                        <?= Html::img('@web/uploads/it-infrastructure.jpg', ['style'=>'width:100%;']); ?>
                   </div> 
               </div>
            </div>
            
        </div>
    </div>
</div>