<?php
if (!defined('PHPEXCEL_ROOT')) {
    define('PHPEXCEL_ROOT', dirname(__FILE__) . '/');
    require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}

/**
* 
*/
class IOFactory
{
	
	/**
     * Create File excel
     *
     * @return PHPExcel_IOFactory
     */
    public static function createWriter(PHPExcel $phpExcelObject, $writeType = 'Excel2007')
    {
        return PHPExcel_IOFactory::createWriter($phpExcelObject, $writeType);
    }

    /**
     * Save File excel
     *
     * @return
     */
    public static function save($objWriter, $save_path='', $file_name='')
    {
    	return $objWriter->save($save_path.$file_name.'.xlsx');
    }

    /**
     * @return file exec to client
     */
    public static function download($objWriter)
    {
        return $objWriter->save('php://output');
    }
}
