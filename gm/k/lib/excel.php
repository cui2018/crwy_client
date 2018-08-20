<?php
/* 
 * Excel类
 * @Package Name: Excel
 * @Author: Keboy xolox@163.com
 * @Modifications:No20170629
 *
 */
class Excel {
	public $sheets = array(TRUE);
	public function __construct() {
		require_once('./k/package/phpexcel/PHPExcel.php');
		$this->phpexcel = new PHPExcel();
		require_once('./k/package/phpexcel/PHPExcel/IOFactory.php');
		$this->reader = \PHPExcel_IOFactory::createReader('Excel2007');
	}
	public function read($file) {
		$this->excel = $this->reader->load($file);
		return $this;
	}
	public function getSheet($index = 0) {
		$sheet = $this->excel->getSheet($index);
		$rows = $sheet->getHighestRow();
		$columns = $sheet->getHighestColumn();
		$columns = PHPExcel_Cell::columnIndexFromString($columns);
		$columnName = array();
		for ( $i = 0; $i < $columns; $i++ ) {
			$columnName[] = PHPExcel_Cell::stringFromColumnIndex($i);
		}
		$data = array();
		for ( $i = 1; $i <= $rows; $i++ ) {
			$row = array();
			for ( $j = 0; $j < $columns; $j++ ) {
				$value = $sheet->getCellByColumnAndRow($j,$i)->getValue();
				if ( $value != NULL ) $row[$columnName[$j]] = $value;
				else break;
			}
			if ( $row ) $data[] = $row;
			else break;
		}
		return $data;
	}
	public function setSheet($index = 0,$name = '',$data = array(),$title = array()) {
		if ( array_isset($this->sheets,$index) ) $sheet = $this->phpexcel->getSheet($index);
		else {
			$this->phpexcel->createSheet($index);
			$sheet = $this->phpexcel->getSheet($index);
		}
		$this->sheets[$index] = $sheet;
		$row = 1;
		if ( $title ) {
			$col = 0;
			foreach ($title as $value => $width) {
				$sheet->getColumnDimensionByColumn($col)->setWidth($width);
				$sheet->setCellValueByColumnAndRow($col,$row,$value);
				$style = $sheet->getStyleByColumnAndRow($col,$row);
				$style->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
				$style->getFont()->setSize(12)->setBold(TRUE)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
				$style->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FF006699');
				$borders = $style->getBorders();
				$borders->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN)->getColor()->setARGB('FFFFFFFF');
				$borders->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN)->getColor()->setARGB('FFFFFFFF');
				$borders->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN)->getColor()->setARGB('FFFFFFFF');
				$borders->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN)->getColor()->setARGB('FFFFFFFF');
				$col++;
			}
			$sheet->getRowDimension(1)->setRowHeight(21);
			$row++;
		}
		foreach ($data as $line) {
			$col = 0;
			foreach ($line as $value) {
				$sheet->setCellValueByColumnAndRow($col,$row,$value);
				$col++;
			}
			$row++;
		}
		$sheet->setTitle($name);
		return $this;
	}
	public function download($name,$mode = 'Excel5') {
		@ob_clean();
		$this->phpexcel->setActiveSheetIndex(0);
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $name . '"');
		PHPExcel_IOFactory::createWriter($this->phpexcel,$mode)->save('php://output');
	}
}