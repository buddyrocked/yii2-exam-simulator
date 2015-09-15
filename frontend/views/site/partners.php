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
                    <h3 class="text-bold text-upper">Our Partners & Clients</h3>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="process">
    <div class="title-section text-center">
        <span>Our Partners & Clients</span>
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
            <!--<div class="col-md-12">
                <div class="process-item line">
                    <div class="row">
                        <div class="col-md-2">
                            <div>&nbsp;</div>
                            <div class="process-img">
                                <?= Html::img('@web/uploads/stan.jpg', []); ?>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="text-upper text-bold">
                                Financial Information System and Technology Center - Ministry of Finance of the Republic of Indonesia
                            </div>
                            <div class="process-content">
                                <?= Html::img('@web/uploads/stan1.jpg', ['class'=>'img-left']); ?>
                                We provided exam simulation try-out for Certified Information Systems Auditor (CISA) and Certified in Risk and Information Systems Control (CRISC) certification. The activity simulated terms and condition applied in the real examination covering time window, rules, quality and quantity of questions. By pariticipating in exam simulation, staffs from Financial Information System and Technology Center - Ministry of Finance registered for either CISA or CRISC December 8 examination are able to measure their level of readiness to face the real battle.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="process-item line">
                    <div class="row">
                        <div class="col-md-2">
                            <div>&nbsp;</div>
                            <div class="process-img">
                                <?= Html::img('@web/uploads/garuda.jpg', []); ?>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="text-upper text-bold">
                                GMF Aerowisata - Affiliate of Garuda Indonesia
                            </div>
                            <div class="process-content">
                                <?= Html::img('@web/uploads/garuda1.jpg', ['class'=>'img-left']); ?>
                               In order to increase its IT staffs capability and skill in IT partner management, GMF Aeroasia, affiliate of Garuda Indonesia for maintenance, required them to be certified in IT Infrastructure Library (ITIL) Foundation for ITSM. The objective of the training is to provide the participants fundamental knowledge and concept on IT partner management based on ITIL framework. We, partnering with examination center, conducted preparation training  to prepare the participants to successfully pass the exam on the last day of the training.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="process-item line">
                    <div class="row">
                        <div class="col-md-2">
                            <div>&nbsp;</div>
                            <div class="process-img">
                                <?= Html::img('@web/uploads/nipon.gif', []); ?>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="text-upper text-bold">
                                PT Nippon Shokubai Indonesia
                            </div>
                            <div class="process-content">
                                <?= Html::img('@web/uploads/nipon1.jpg', ['class'=>'img-left']); ?>
                                We provide training on ISO/IEC 27001:2005 for PT Nippon Shokubai Indonesia. The in-house training package consists of two programs: Introduction to ISO 27001 and ISO 27001 Internal Audit. The Standard formally specifies a management system that is intended to bring information security under explicit management control. Being a formal specification means that it mandates specific requirements.

                                Organizations that claim to have adopted ISO/IEC 27001 can therefore be formally audited and certified compliant with the standard. Management of Nippon Shokubai Indonesia plans to adopt Information Security Management partner and apply it in the organization.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="process-item line">
                    <div class="row">
                        <div class="col-md-2">
                            <div>&nbsp;</div>
                            <div class="process-img">
                                <?= Html::img('@web/uploads/woori.jpg', []); ?>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="text-upper text-bold">
                                PT Bank Woori Indonesia
                            </div>
                            <div class="process-content">
                                <?= Html::img('@web/uploads/woori1.jpg', ['class'=>'img-left']); ?>
                                We assist Woori Bank Indonesia in assessing the vulnerability of its ATM system from malicious attack. Our methodology adapts framework from Open Information Systems Security Group (OISSG) called  Information System Security Assessment Framework (ISSAF), combined with Open Source Security Testing Methodology Manual (OSSTMM).
                                We combine the insights from the leader in information security practitioners, experience of specialists in banking system security and compliance consultancy, as well as vendor-neutral approach to risk mitigation that helps Woori Bank Indonesia address any vulnerabilities in the ATM system and related technology.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="process-item line">
                    <div class="row">
                        <div class="col-md-2">
                            <div>&nbsp;</div>
                            <div class="process-img">
                                <?= Html::img('@web/uploads/rekayasa.png', []); ?>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="text-upper text-bold">
                                PT Rekayasa Industri
                            </div>
                            <div class="process-content">
                                <?= Html::img('@web/uploads/rekayasa1.jpg', ['class'=>'img-left']); ?>
                                We conduct an IT audit and assessment for PT Rekayasa Industri using an ISACA (Information Systems Audit and Control Association) framework, COBIT 5. PT Rekayasa Industri is the first organization in Indonesia that use COBIT 5 framework to audit and determine the maturity level of its IT Department. 

                                COBIT 5 incorporates and expands on COBIT 4.1 by integrating other major frameworks, standards and resources, including ISACA’s Val IT and Risk IT, Information Technology Infrastructure Library (ITIL®) and related standards from the International Organization for Standardization (ISO). We also provide recommendations and road map for PT Rekayasa Industri to assist them in achieving the desired maturity level.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="process-item line">
                    <div class="row">
                        <div class="col-md-2">
                            <div>&nbsp;</div>
                            <div class="process-img">
                                <?= Html::img('@web/uploads/jaksa.jpg', []); ?>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="text-upper text-bold">
                                Kejaksaan Agung Republik Indonesia
                            </div>
                            <div class="process-content">
                                <?= Html::img('@web/uploads/jaksa1.jpg', ['class'=>'img-left']); ?>
                                Rialachas assisted Kejaksaan RI in managing and administrating the development of its ERP. Rialachas introduced  software quality assurance framework in Kejaksaan and also assisted the implementation  of the software development activities in Kejaksaan. We also provide project management and administration partners that ensure the success of the software development initiatives in Kejaksaan.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="process-item line">
                    <div class="row">
                        <div class="col-md-2">
                            <div>&nbsp;</div>
                            <div class="process-img">
                                <?= Html::img('@web/uploads/telkom.jpg', []); ?>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="text-upper text-bold">
                                Yayasan Kesehatan TELKOM Indonesia (YAKES TELKOM)
                            </div>
                            <div class="process-content">
                                <?= Html::img('@web/uploads/telkom1.jpg', ['class'=>'img-left']); ?>
                                YAKES TELKOM has appointed Rialachas in performing an IT audit and assessment using COBIT 4 framework. Rialachas also perform an audit, review, and analysis on the Data Center using TIA-942 (Telecommunications Infrastructure Standard for Data Centers). Based on the audit findings and results, Rialachas provide a cost-benefit analysis for YAKES TELKOM regarding recommendation of  implementable IT initiatives.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="process-item line">
                    <div class="row">
                        <div class="col-md-2">
                            <div>&nbsp;</div>
                            <div class="process-img">
                                <?= Html::img('@web/uploads/bi.jpg', []); ?>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="text-upper text-bold">
                                Bank Indonesia
                            </div>
                            <div class="process-content">
                               The central bank of Indonesia, Bank Indonesia has appointed Rialachas to perform an analysis upon the human resources workload of the software development and maintenance group. Rialachas team work together with the counterparts from Bank Indonesia to ensure and assist the effective and efficient management and control of IT initiatives related to software development and maintenance.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="process-item line">
                    <div class="row">
                        <div class="col-md-2">
                            <div>&nbsp;</div>
                            <div class="process-img">
                                <?= Html::img('@web/uploads/newmont.png', []); ?>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="text-upper text-bold">
                                PT Newmont Nusa Tenggara
                            </div>
                            <div class="process-content">
                                <?= Html::img('@web/uploads/newmont1.png', ['class'=>'img-left']); ?>
                                Rialachas has been appointed by Newmont as a subject matter expert related to the implementation of BABOK, a framework by IIBA (International Institute of Business Analysis). BABOK is a well-known framework for business analysis practitioners. The project is conducted on the client-site at Batu Hijau, Sumbawa, West Nusa Tenggara.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="process-item line">
                    <div class="row">
                        <div class="col-md-2">
                            <div>&nbsp;</div>
                            <div class="process-img">
                                <?= Html::img('@web/uploads/xl.png', []); ?>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="text-upper text-bold">
                                PT XL Axiata Tbk
                            </div>
                            <div class="process-content">
                                <?= Html::img('@web/uploads/xl1.png', ['class'=>'img-left']); ?>
                                Rialachas developed capacity building programs for the business analysts in XL Axiata. Rialachas used BABOK framework as a reference to assist business analyst in the development of applications in XL Axiata enterprise environment. This project was performed in within 3 (three) batches.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="process-item line">
                    <div class="row">
                        <div class="col-md-2">
                            <div>&nbsp;</div>
                            <div class="process-img">
                                <?= Html::img('@web/uploads/bayu.jpg', []); ?>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="text-upper text-bold">
                                PT Bayu Buana Gemilang
                            </div>
                            <div class="process-content">
                                <?= Html::img('@web/uploads/bayu1.png', ['class'=>'img-left']); ?>
                                Rialachas design a program for capacity building in accordance to IT Governance such as Balanced Scorecard, Enterprise Architecture, IT partner Management, and IT Risk Management.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="process-item line">
                    <div class="row">
                        <div class="col-md-2">
                            <div>&nbsp;</div>
                            <div class="process-img">
                                <?= Html::img('@web/uploads/goodrej.png', []); ?>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="text-upper text-bold">
                                PT Megasari Makmur (Godrej Group Company)
                            </div>
                            <div class="process-content">
                                <?= Html::img('@web/uploads/goodrej1.png', ['class'=>'img-left']); ?>
                                Rialachas is an appointed subject matter expert related to the implementation of information security management based on the framework of the International Information Systems Security Certification Consortium (ISC)² and the Information Systems Audit and Control Association (ISACA).
                            </div>
                            <div class="process-content">
                                <?= Html::img('@web/uploads/goodrej2.jpg', ['class'=>'img-left']); ?>
                                Rialachas assisted Godrej in conducting a review of the application distribution process. In addition, Rialachas developed documentation in accordance with the phases of the life cycle of the system or the system development lifecycle (SDLC) using reverse engineering methodology.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="process-item line">
                    <div class="row">
                        <div class="col-md-2">
                            <div>&nbsp;</div>
                            <div class="process-img">
                                <?= Html::img('@web/uploads/kasei.jpg', []); ?>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="text-upper text-bold">
                               PT Kustodian Sentral Efek Indonesia
                            </div>
                            <div class="process-content">
                                <?= Html::img('@web/uploads/kasei1.jpg', ['class'=>'img-left']); ?>
                                Rialachas is appointed by KSEI to conduct an independent review of the Fund Separation application system regarding its security and performance aspects including vulnerabiltiy assessment and data integrity.
                            </div>
                            <div class="process-content">
                                <?= Html::img('@web/uploads/kasei2.gif', ['class'=>'img-left']); ?>
                                Rialachas is commissioned to conduct a review of the software application engineering process that is implemented by KSEI. Rialachas is responsible in assessing their suitability based on the generally used best practices and standards related to software engineering.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="process-item line">
                    <div class="row">
                        <div class="col-md-2">
                            <div>&nbsp;</div>
                            <div class="process-img">
                                <?= Html::img('@web/uploads/nindya.png', []); ?>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="text-upper text-bold">
                                PT Nindya Karya (Persero)
                            </div>
                            <div class="process-content">
                                <?= Html::img('@web/uploads/nindya.jpg', ['class'=>'img-left']); ?>
                                Rialachas has been appointed by PT Nindya Karya (Persero) to develop policies, standards, guidelines and procedure related to IT. The goal of this project is to support the effective and efficient governance and management of IT within Nindya Karya.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="process-item line">
                    <div class="row">
                        <div class="col-md-2">
                            <div>&nbsp;</div>
                            <div class="process-img">
                                <?= Html::img('@web/uploads/goodrejs.jpg', []); ?>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="text-upper text-bold">
                                PT Bayu Buana Gemilang
                            </div>
                            <div class="process-content">
                                <?= Html::img('@web/uploads/goodrejs1.jpg', ['class'=>'img-left']); ?>
                                
                                Godrej has assigned Rialachas to review its distribution system called VDIST including system development lifecycle methodology implemented in the organization's IT. The review includes the functionality aspect, security, infrastructure, database, and underpinning documentation based on software engineering leading practice
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="process-item line">
                    <div class="row">
                        <div class="col-md-2">
                            <div>&nbsp;</div>
                            <div class="process-img">
                                <?= Html::img('@web/uploads/telkom.jpg', []); ?>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="text-upper text-bold">
                                PT Telkom Indonesia
                            </div>
                            <div class="process-content">
                                <?= Html::img('@web/uploads/telkom1.jpg', ['class'=>'img-left']); ?>
                                Rialachas with Telkom Professional Certification Center (TPCC) and Telkom Corporate University conducted ITIL Intermediate training and examination for partner Strategy and partner Transition module.
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            <div class="col-md-12"> 
            &nbsp;
            </div>
            <div class="col-md-12">                
                <div class="title-section text-center">
                    <span>Our Partners</span>
                </div>
            </div>
            <?php
                if($partners != null): 
                    foreach ($partners as $partner):
            ?>
            <div class="col-md-6">
                <div class="process-item line">
                    <div class="row">
                        <div class="col-md-4">
                            <div>&nbsp;</div>
                            <div class="process-img">
                                <?= Html::img('@web/uploads/cms/'.(isset($partner->image)?$partner->image:''), []); ?>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="text-upper text-bold">
                               <?= Html::encode($partner->title); ?>
                            </div>
                            <div class="process-content">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                    endforeach;
                endif;
            ?>
        </div>
    </div>
</div>