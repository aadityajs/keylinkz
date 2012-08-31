<?php
	class Realestate_Component_Controller_List extends Phpfox_Component
	{
		public function process()
		{
			$param = $this->request()->get('type');
			$arrProperty = Phpfox::getService('realestate.realestate')->getPropretyListing($param);
			
			$this->template()->assign(array(
					'aFeeds' => $aRows,
					'iFeedNextPage' => ($iFeedPage + 1),
					'iFeedCurrentPage' => $iFeedPage,
					'iTotalFeedPages' => 1,
					'aFeedVals' => $this->request()->getArray('val'),
					'sCustomViewType' => $sCustomViewType,
					'aFeedStatusLinks' => Phpfox::getService('feed')->getShareLinks(),
					'aFeedCallback' => $aFeedCallback,
					'bIsCustomFeedView' => $bIsCustomFeedView
				)
			);
			$this->template()->assign('adiPropList',$arrProperty);
		}
	}
?>