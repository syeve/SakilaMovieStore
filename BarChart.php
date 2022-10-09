<?php

	// Stephen Olson
	// BarChart.php
	// 16 Mar 2022

	class BarChart {

		private $title, $xAxTitle, $yAxTitle, $font = "/home/mathcs/courses/cs383/Vera.ttf", $width, $height, $im, $data = [];

		public function __construct($title, $xAxTitle, $yAxTitle, $width = 700, $height = 300) {
			$this->title = $title;
			$this->xAxTitle = $xAxTitle;
			$this->yAxTitle = $yAxTitle;
			$this->width = $width;
			$this->height = $height;
			$this->im = imagecreate($width, $height);
		}

		public function addCategory($label, $value) {
			$this->data[] = [
				'label' => $label,
				'value' => $value
			];
		}

		public function dataArray() {
			return $this->data;
		}

		public function displayGraph() {
			// some colors
			$white = imagecolorallocate($this->im, 255, 255, 255);
			$black = imagecolorallocate($this->im, 0, 0, 0);
			$gray = imagecolorallocate($this->im, 128, 128, 128);
			$red = imagecolorallocate($this->im, 255, 0, 0);

			// help to center the title
			$c = imagettfbbox(20, 0, $this->font, $this->title);
			$widthtitle = abs($c[2] - $c[0]);
			$x_title = ($this->width - $widthtitle) / 2;

			// place the title
			imagettftext($this->im, 20, 0, $x_title, 35, $black, $this->font, $this->title);

			// help to center the x-axis title
			$c2 = imagettfbbox(30, 0, $this->font, $this->xAxTitle);
			$xAxTitle_width = abs($c2[2] - $c2[0]);
			$xAxTitle_x = ($this->width - $xAxTitle_width) / 2;

			// place the x-axis title
			imagettftext($this->im, 20, 0, $xAxTitle_x+50, $this->height-10, $black, $this->font, $this->xAxTitle);

			// chart outlines
			$topChartLineX1 = 100;
			$topChartLineY1 = 50;
			$topChartLineX2 = 700;
			$topChartLineY2 = 50;

			$leftChartLineX1 = 100;
			$leftChartLineY1 = 50;
			$leftChartLineX2 = 100;
			$leftChartLineY2 = 225;

			$bottomChartLineX1 = 100;
			$bottomChartLineY1 = 225;
			$bottomChartLineX2 = 700;
			$bottomChartLineY2 = 225;

			// print chart outlines
			imageline($this->im, $topChartLineX1, $topChartLineY1, $topChartLineX2, 
				$topChartLineY2, $black);

			imageline($this->im, $leftChartLineX1, $leftChartLineY1, $leftChartLineX2, 
				$leftChartLineY2, $black);

			imageline($this->im, $bottomChartLineX1, $bottomChartLineY1, 
				$bottomChartLineX2, $bottomChartLineY2, $black);

			$chartHeight = 175;
			$chartWidth = $this->width - 100;

			$gridSpan = $chartHeight / 5;

			// gridlines
			imageline($this->im, $bottomChartLineX1, $bottomChartLineY1 - $gridSpan, 
				$bottomChartLineX2, $bottomChartLineY2 - $gridSpan, $gray);
			
			imageline($this->im, $bottomChartLineX1, $bottomChartLineY1 - $gridSpan*2, 
				$bottomChartLineX2, $bottomChartLineY2 - $gridSpan*2, $gray);

			imageline($this->im, $bottomChartLineX1, $bottomChartLineY1 - $gridSpan*3, 
				$bottomChartLineX2, $bottomChartLineY2 - $gridSpan*3, $gray);

			imageline($this->im, $bottomChartLineX1, $bottomChartLineY1 - $gridSpan*4, 
				$bottomChartLineX2, $bottomChartLineY2 - $gridSpan*4, $gray);

			$barBuffer = $chartWidth / count($this->data);
			$itemx = $bottomChartLineX1 + $barBuffer / 2;
			$barWidth = 80;
		
			$labelBuffer = 10;
		
			// scale bar chart
			$ymax = 0;
			for ($i = 0; $i < count($this->data); $i++) {
				$current = $this->data[$i];
				if ($current['value'] > $ymax) $ymax = $current['value'];
			}
			
			$gridSpan2 = $ymax / 5;
			$counter = 1;
			for ($i = 0; $i <= 5; $i++) {
				$xpos = $bottomChartLineX1 - 40;
				$ypos = $bottomChartLineY1 - ($gridSpan * $counter) + 40;
				$ylab = $i * $gridSpan2;
				imagettftext($this->im, 12, 0, $xpos, $ypos, $black, $this->font, $ylab);
				$counter++;
			}

			// plot bars
			for ($i = 0; $i < count($this->data); $i++) {
				$current = $this->data[$i];
				$x1 = $itemx - $barWidth / 2;
				$y1 = $bottomChartLineY1 - $current['value'] / $ymax * $chartHeight;
				$x2 = $itemx + $barWidth / 2;
				$y2 = $bottomChartLineY1 - 1;
		
				imagefilledrectangle($this->im, $x1, $y1, $x2, $y2, $red);
		
				$c3 = imagettfbbox(20, 0, $this->font, $current['label']);
				$xlabelwidth = abs($c3[2] - $c3[0]);
		
				$labelxpos = $itemx - $xlabelwidth / 2;
				$labelypos = $bottomChartLineY1 + $labelBuffer + 20;
		
				imagettftext($this->im, 10, 0, $labelxpos, $labelypos, $black, $this->font, $current['label']);
		
				$itemx += $barBuffer;				
			}
			header("Content-Type: image/png");
			imagepng($this->im);
			imagedestroy($this->im);
		}
	}

?>