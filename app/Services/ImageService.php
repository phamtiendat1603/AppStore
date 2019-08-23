<?php 
namespace App\Services;

/**
 * 
 */
use File;
class ImageService
{
	public function getFileName($file) {
		return $file->getClientOriginalName();
	}

	public function getFileSize($file) {
		return $file->getSize();
	}

	public function getFileType($file) {
		return $file->getMimeType();
	}

	public function checkFile($file) {
		$type = $this->getFileType($file);
		$size = $this->getFileSize($file);
		$type_image = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];
		if( in_array($type, $type_image) ) {
			if($size <= 1048576) {
				return 1;
			} else {
				return 0;
			}
		}
		return -1;
	}

	public function deleteFile($fileName,$path) {
		if(File::exists($path.'/'.$fileName)){
            //Xóa file
            unlink($path.'/'.$fileName);
        }
	}

	public function moveImage($file, $path) {
		$fileName = $this->getFileName($file);
		if( $this->checkFile($file) == 1) {
			$fileName = date('D-m-yyyy').'-'.rand().'-'.utf8tourl($fileName);
			if($file->move($path, $fileName)) {
				return $fileName;
			}
		}
		return 0;
	}
}