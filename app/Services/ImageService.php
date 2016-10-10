<?php

namespace App\Services;

class ImageService 
{

	public function download($url, $folder, $prefix)
	{
		if(is_array($url)) {
			$i = 1;
			foreach ($url as $value) {
				foreach($value as $val) {
					copy($val, $this->setFolder($folder).'/'.$this->setFileName($prefix).$i.'.jpg');
				}
				$i++;
			}
		} else 	{
			copy($val, $this->setFolder($folder).'/'.date('YmsHis').'.jpg');
		}
	}

	protected function setFolder($folder = 'images/default') 
	{
		if(!file_exists($folder)) {
			$folder = rtrim($folder.'/'.date("Y_m_d_His"), '/').'/';
        	mkdir( $folder, 0777, true );
        	chmod( $folder, 0755 );
    	}

    	return $folder;
	}

	protected function setFileName($prefix = "img_") 
	{
		return $prefix;
	}
}