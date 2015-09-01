<?php
namespace backend\components;
use yii;
use yii\helpers\Url;

class MenuItemHelper {

	public static function getMenu(){
		
		return self::getMenuItem('user');
	}

	protected static function getMenuItem($role){
		$menuItem = [
						'admin'=>[
									[
				                        'url' => Url::to(['/']),
				                        'label' => '<span class="text">Home</span>',
				                        'icon' => 'home'
				                    ],
				                    [
				                        'label' => '<span class="text">Kepegawaian</span>',
				                        'icon' => 'user',
				                        'items' => [
				                            ['label' => 'Data Pegawai', 'icon'=>'user', 'url'=>Url::to(['/pegawai'])],
				                            ['label' => 'Kenaikan Pangkat', 'icon'=>'briefcase', 'url'=>Url::to(['/golonganpegawai'])],
				                            ['label' => 'Kenaikan Gaji', 'icon'=>'star-empty', 'url'=>Url::to(['/gajipegawai'])],
				                            
				                        ],
				                    ],
				                    [
				                        'label' => '<span class="text">Laporan</span>',
				                        'icon' => 'list-alt',
				                        'items' => [
				                            ['label' => 'Laporan Kepangkatan', 'icon'=>'list-alt', 'url'=>Url::to(['/pegawai/laporankepangkatan'])],
				                            ['label' => 'Identitas & Riwayat', 'icon'=>'list-alt', 'url'=>Url::to(['/pegawai/laporanpegawai'])],
				                            ['label' => 'Rekap PNS & CPNS', 'icon'=>'list-alt', 'url'=>Url::to(['/pegawai/rekap'])],
				                        ],
				                    ],
				                    [
				                        'label' => '<span class="text">Data Referensi</span>',
				                        'icon' => 'question-sign',
				                        'items' => [
				                            ['label' => 'Agama', 'icon'=>'heart', 'url'=>Url::to(['/agama'])],
				                            ['label' => 'Pendidikan', 'icon'=>'education', 'url'=>Url::to(['/pendidikan'])],
				                            ['label' => 'Golongan', 'icon'=>'signal', 'url'=>Url::to(['/golongan'])],
				                            ['label' => 'Jenis Jabatan', 'icon'=>'signal', 'url'=>Url::to(['/jenisjabatan'])],
				                            ['label' => 'Jabatan', 'icon'=>'signal', 'url'=>Url::to(['/jabatan'])],
				                            ['label' => 'Eselon', 'icon'=>'list', 'url'=>Url::to(['/eseleon'])],
				                            ['label' => 'Jenis Kepegawaian', 'icon'=>'tower', 'url'=>Url::to(['/jeniskepegawaian'])],
				                            ['label' => 'Status Kepegawaian', 'icon'=>'ok-sign', 'url'=>Url::to(['/statuskepegawaian'])],
				                            ['label' => 'Unit Kerja', 'icon'=>'briefcase', 'url'=>Url::to(['/unitkerja'])],
				                            ['label' => 'Sub Unit Kerja', 'icon'=>'briefcase', 'url'=>Url::to(['/subunitkerja'])],
				                            ['label' => 'Kategori Hukuman', 'icon'=>'thumbs-down', 'url'=>Url::to(['/kategorihukuman'])],
				                            ['label' => 'Pelatihan', 'icon'=>'flash', 'url'=>Url::to(['/pelatihan'])],
				                        ],
				                    ],
				                    [
				                        'label' => '<span class="text">Data Utilitas</span>',
				                        'icon' => 'wrench',
				                        'items' => [
				                        	['label' => 'Message', 'icon'=>'envelope', 'url'=>Url::to(['/message/index'])],
				                        	['label' => 'Setting', 'icon'=>'wrench', 'url'=>Url::to(['/settings/index'])],
				                            ['label' => 'Data User', 'icon'=>'user', 'url'=>Url::to(['/user/admin'])],
				                            ['label' => 'Logout', 'icon'=>'off', 'url'=>Url::to(['/auth/logout']), 'linkOptions'=>['id'=>'link-logout2', 'class'=>'link-logouts', 'data-method'=>'post']],
				                                                               
				                        ],
				                    ],
				                    [
				                        'label' => '<span class="text">Logout</span>',
				                        'icon' => 'off',
				                        'url' => Url::to(['/auth/logout']),
				                        'linkOptions' => ['id'=>'link-logout1', 'class'=>'link-logout']
				                    ],	
				        ],
				        'user'=>[
				        			[
				                        'url' => Url::to(['/']),
				                        'label' => '<span class="text">Home</span>',
				                        'icon' => 'home'
				                    ],
				        			[
				                        'label' => '<span class="text">Projects</span>',
				                        'icon' => 'briefcase',
				                        'items' => [
				                            ['label' => 'Pipeline', 'icon'=>'folder-open', 'url'=>Url::to(['#'])],
				                            ['label' => 'Projects', 'icon'=>'folder-close', 'url'=>Url::to(['#'])],
				                        ],
				                    ],
				                    [
				                        'label' => '<span class="text">Clients</span>',
				                        'icon' => 'user',
				                        'items' => [
				                            ['label' => 'Clients', 'icon'=>'user', 'url'=>Url::to(['#'])],
				                        ],
				                        
				                    ],
				                    [
				                        'label' => '<span class="text">Human Capital</span>',
				                        'icon' => 'user',
				                        'items' => [
				                            ['label' => 'Employee', 'icon'=>'user', 'url'=>Url::to(['#'])],
				                            ['label' => 'Grade', 'icon'=>'signal', 'url'=>Url::to(['#'])],
				                        ],
				                        
				                    ],
				                   	[
				                        'label' => '<span class="text">Tasks</span>',
				                        'icon' => 'list-alt',
				                        'items' => [
				                            ['label' => 'Daily Report', 'icon'=>'th-list', 'url'=>Url::to(['#'])],
				                            ['label' => 'Work Sheet', 'icon'=>'list-alt', 'url'=>Url::to(['#'])],
				                        ],
				                        
				                    ],
				                    [
				                        'label' => '<span class="text">Knowledge Management</span>',
				                        'icon' => 'book',
				                        'items' => [
				                            ['label' => 'Articles', 'icon'=>'duplicate', 'url'=>Url::to(['#'])],
				                            ['label' => 'Domain', 'icon'=>'tag', 'url'=>Url::to(['/tag'])],
				                        ],
				                        
				                    ],
				                    [
				                        'label' => '<span class="text">Utility</span>',
				                        'icon' => 'flash',
				                        'items' => [
				                            ['label' => 'Users', 'icon'=>'duplicate', 'url'=>Url::to(['/user-management/user/index'])],
				                            ['label' => 'Role', 'icon'=>'tag', 'url'=>Url::to(['/user-management/role/index'])],
				                            ['label' => 'Permission', 'icon'=>'duplicate', 'url'=>Url::to(['/user-management/permission/index'])],
				                            ['label' => 'Permission Groups', 'icon'=>'tag', 'url'=>Url::to(['/user-management/auth-item-group/index'])],
				                            ['label' => 'User Log', 'icon'=>'clock', 'url'=>Url::to(['/user-management/user-visit-log/index'])],
				                        ],
				                    ],
				        			[
				                        'label' => '<span class="text">Logout</span>',
				                        'icon' => 'off',
				                        'url' => Url::to(['/user-management/auth/logout']),
				                        'linkOptions' => ['id'=>'logout']
				                    ],	
				        ]
			        ];

		return $menuItem[$role];
	}
}