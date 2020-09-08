<?php
error_reporting(0);
if (isset($_COOKIE['auth1cua'])) {
	require('load_auth_1cua.php');
	if (isset($_GET['term'])) {
		require('get_listSoHS.php');
	}
	if (isset($_GET['trangthaixuly'])) {
		if ($_GET['trangthaixuly']==1 || $_GET['trangthaixuly']==2) {
			require('geths_chothuly_dangthuly.php');
		} elseif ($_GET['trangthaixuly']==3) {
			require('geths_chotaobb.php');
		}
	    if (empty($Hosos_oldArray) || $Hosos_oldArray->message == 'Authorization has been denied for this request.') {
	        echo "<div class='text-center'><h1 class='text-danger'>Bạn chưa đăng nhập phần mềm tiếp nhận hồ sơ</h1><a class='btn btn-success text-white' href='https://tnhs.baohiemxahoi.gov.vn' target='_blank'><h2>Đăng nhập ngay</h2></a></div>";
	        die();
	    } else {
	    	if (isset($Hosos_oldArray->totalcount)) {
	    		$totalcount = $Hosos_oldArray->totalcount;
	    	} elseif (isset($Hosos_oldArray->totalCount)) {
	    		$totalcount = $Hosos_oldArray->totalCount;
	    	}
	        $Hosos_newArray = (object) [
	            'lists' => array(),
	            'hosos' => array(),
	            'totalcount' => $totalcount
	        ];

	        if (isset($_GET['sortBy'])) {
	            if ($_GET['sortBy']=='default') {
	                $Hosos_newArray->lists = array('default');
	                $Hosos_newArray->hosos['default'] = $Hosos_oldArray->hosos;
	            } elseif ($_GET['sortBy']=='cdgq') {
	                foreach ($thutucs as $key => $thutuc) {
	                    foreach ($Hosos_oldArray->hosos as $hsOld) {
	                        if (in_array($hsOld->mathutuc, $thutuc['list_mathutuc'])) {
	                            if (in_array($hsOld->mathutuc, $Hosos_newArray->lists)==false) {
	                                $Hosos_newArray->lists[] = $thutucs[$key]['ten_cdgq'];
	                            }
	                            $Hosos_newArray->lists = array_unique($Hosos_newArray->lists);
	                            $hs_push = (object) [
	                                'id' => $hsOld->id,
	                                'hosoxulyid' => $hsOld->hosoxulyid,
	                                'trangthaimau' => $hsOld->trangthaimau,
	                                'dmtrangthaixulyid' => $hsOld->dmtrangthaixulyid,
	                                'buocthucte' => $hsOld->buocthucte,
	                                'mathutuc' => $hsOld->mathutuc,
	                                'sohoso' => $hsOld->sohoso,
	                                'tendonvi' => $hsOld->tendonvi,
	                                'madonvi' => $hsOld->madonvi,
	                                'macoquan' => $hsOld->macoquan,
	                                'canboxuly' => $hsOld->canboxuly
	                            ];
	                            $Hosos_newArray->hosos[$thutucs[$key]['ten_cdgq']][] = $hs_push;
	                        }
	                    }
	                }
	            } elseif ($_GET['sortBy']=='cbxl') {
	                foreach ($Hosos_oldArray->hosos as $hsOld) {
	                    if (in_array($hsOld->canboxuly, $canboxuly)) {
	                        $Hosos_newArray->lists[] = $hsOld->canboxuly;
	                    }
	                    $Hosos_newArray->lists = array_unique($Hosos_newArray->lists);
	                    $hs_push = (object) [
	                        'id' => $hsOld->id,
	                        'hosoxulyid' => $hsOld->hosoxulyid,
	                        'trangthaimau' => $hsOld->trangthaimau,
	                        'dmtrangthaixulyid' => $hsOld->dmtrangthaixulyid,
	                        'buocthucte' => $hsOld->buocthucte,
	                        'mathutuc' => $hsOld->mathutuc,
	                        'sohoso' => $hsOld->sohoso,
	                        'tendonvi' => $hsOld->tendonvi,
	                        'madonvi' => $hsOld->madonvi,
	                        'macoquan' => $hsOld->macoquan,
	                        'canboxuly' => $hsOld->canboxuly
	                    ];
	                    $Hosos_newArray->hosos[$hsOld->canboxuly][] = $hs_push;
	                }
	            } elseif ($_GET['sortBy']=='noinhanhs') {
	                foreach ($Hosos_oldArray->hosos as $hsOld) {
	                    if (in_array($hsOld->macoquan, $list_macqbhxh)) {
	                    	$keyOfList_tencqbhxh = array_search($hsOld->macoquan, $list_macqbhxh);
	                    	$keyOfList_HososNewArray = $list_tencqbhxh[$keyOfList_tencqbhxh];
	                        $Hosos_newArray->lists[] = $keyOfList_HososNewArray;
	                        $Hosos_newArray->lists = array_unique($Hosos_newArray->lists);
	                        $hs_push = (object) [
	                            'id' => $hsOld->id,
	                            'hosoxulyid' => $hsOld->hosoxulyid,
	                            'trangthaimau' => $hsOld->trangthaimau,
	                            'dmtrangthaixulyid' => $hsOld->dmtrangthaixulyid,
	                            'buocthucte' => $hsOld->buocthucte,
	                            'mathutuc' => $hsOld->mathutuc,
	                            'sohoso' => $hsOld->sohoso,
	                            'tendonvi' => $hsOld->tendonvi,
	                            'madonvi' => $hsOld->madonvi,
	                            'macoquan' => $hsOld->macoquan,
	                            'canboxuly' => $hsOld->canboxuly
	                        ];
	                        $Hosos_newArray->hosos[$keyOfList_HososNewArray][] = $hs_push;
	                    }
	                }
	            }
	        } else {
	            $Hosos_newArray->lists = array('default');
	            $Hosos_newArray->hosos['default'] = $Hosos_oldArray->hosos;
	        }

	        if (isset($_GET['cbxl']) && $_GET['cbxl'] != null) {
	        	foreach ($Hosos_newArray->hosos as $key_parent => $hs) {
	        		foreach ($Hosos_newArray->hosos[$key_parent] as $key_child => $hs_by_Cbxl) {
	        			if ($hs_by_Cbxl->canboxuly != $_GET['cbxl']) {
	        				unset($Hosos_newArray->hosos[$key_parent][$key_child]);
	        			}
	        		}
	        		$total_parent = count($Hosos_newArray->hosos[$key_parent]);
	        		if ($total_parent > 0) {
	        			$total_byCbxl[] = $total_parent;
	        		} else {
	        			unset($Hosos_newArray->lists[array_search($key_parent, $Hosos_newArray->lists)]);
	        		}
	        	}
	        	$Hosos_newArray->totalcount = array_sum($total_byCbxl);
	        }

	        if (isset($_GET['thutuc']) && $_GET['thutuc'] != null) {
	        	$thutuc_selected = explode(',', $_GET['thutuc']);
	        	foreach ($Hosos_newArray->hosos as $key_parent => $hs) {
	        		foreach ($Hosos_newArray->hosos[$key_parent] as $key_child => $hs_by_thutuc) {
	        			if (in_array($hs_by_thutuc->mathutuc, $thutuc_selected) == false) {
	        				unset($Hosos_newArray->hosos[$key_parent][$key_child]);
	        			}
	        		}
	        		$total_parent = count($Hosos_newArray->hosos[$key_parent]);
	        		if ($total_parent > 0) {
	        			$total_byThutuc[] = $total_parent;
	        		} else {
	        			unset($Hosos_newArray->lists[array_search($key_parent, $Hosos_newArray->lists)]);
	        		}
	        	}
	        	$Hosos_newArray->totalcount = array_sum($total_byThutuc);
	        }
	        //print_r($Hosos_newArray->hosos);

	        $Hosos = $Hosos_newArray;
	        unset($Hosos_oldArray, $Hosos_newArray);
	    }
	}
}
?>