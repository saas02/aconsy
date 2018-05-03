<?php
require_once('../web-app/pdf/fpdf.php');
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'aconsy');
define('DB_CHARSET', 'utf-8');
$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
class PDF extends FPDF
{
var $widths;
var $aligns;

function SetWidths($w)
{
	//Set the array of column widths
	$this->widths=$w;
}

function SetAligns($a)
{
	//Set the array of column alignments
	$this->aligns=$a;
}

function Row($data)
{
	//Calculate the height of the row
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=5*$nb;
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border
		
		$this->Rect($x,$y,$w,$h);

		$this->MultiCell($w,5,$data[$i],0,$a,'true');
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}

function CheckPageBreak($h)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
	//Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}

function Header()
{
$this->SetFont('Arial','B',15);
$this->SetX(70);
$this->Cell(100, 10, 'Reportes Aconsy',1,0,'C');
$this->Ln(20);
}

function Footer()

{
$this->SetY(-15);
$this->SetFont ( 'Arial','I',10) ;
$this->AliasNbPages();
$this->Cell(0, 10, 'Unese Forem - 2012 		P�gina ' . $this->PageNo() . '/
{nb}' ,0,0 , 'C') ;
}


}
$dato=$_POST['dato'];
$usuario=$_POST['user'];
$inicio=$_POST['in'];
$fin=$_POST['fin'];
$user=$usuario;
$consulta = "SELECT * from usuario where cedula= '$usuario'";
$usuario = $link->query($consulta);
$arreglo_usuario = $usuario->fetch_all(MYSQLI_ASSOC)[0];
$pdf=new PDF('P','mm','Letter');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(20,20,20);
	$pdf->Ln(10);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,6,'Nombre: '.$arreglo_usuario['nombres'].' '.$arreglo_usuario['primer_apellido'].' '.$arreglo_usuario['segundo_apellido'],0,1);
	$pdf->Cell(0,6,'Cedula: '.$arreglo_usuario['cedula'],0,1); 
	$pdf->Cell(0,6,'Cargo: '.$arreglo_usuario['cargo'],0,1); 
	$pdf->Cell(0,6,'Area: '.$arreglo_usuario['area'],0,1); 
	$pdf->Cell(0,6,'Telefono: '.$arreglo_usuario['telefono'],0,1); 
	$pdf->Cell(0,6,'Impreso Por: '.$dato,0,1);
	$pdf->Ln(5);
	
	$pdf->SetWidths(array(40, 40, 30, 40, 40));
	$pdf->SetFont('Arial','B',10);
	$pdf->SetFillColor(85,107,140);
    $pdf->SetTextColor(255);
		for($i=0;$i<1;$i++)
			{
				$pdf->Row(array('Entrada', 'Salida', 'Cedula', 'Nombre','Apellidos'));
			}
$newConsulta="SELECT ingreso.fecha_entrada, ingreso.fecha_salida, usuario.cedula, usuario.nombres, usuario.primer_apellido, usuario.segundo_apellido
FROM ingreso, ingreso_usuario, usuario
WHERE ingreso.id_ingreso = ingreso_usuario.id_ingreso
AND usuario.id_usuario = ingreso_usuario.id_usuario
AND usuario.cedula= '$user'
AND ingreso.fecha_entrada >= '".date("Y-m-d 00:00:00", strtotime($inicio))."' AND ingreso.fecha_entrada <= '".date("Y-m-d 24:00:00", strtotime($fin))."'";
$reporte = $link->query($newConsulta);
$numfilas = $reporte->num_rows;
$filas = $reporte->fetch_all(MYSQLI_ASSOC);

for ($i=0; $i<$numfilas; $i++)
		{			
			$pdf->SetFont('Arial','',10);
			
			if($i%2 == 1)
			{
				$pdf->SetFillColor(300,300,300);
    			$pdf->SetTextColor(0);
				$pdf->Row(array($filas[$i]['fecha_entrada'], $filas[$i]['fecha_salida'], $filas[$i]['cedula'], $filas[$i]['nombres'],$filas[$i]['primer_apellido'].' '.$filas[$i]['segundo_apellido']));
			}
			else
			{
				$pdf->SetFillColor(300,300,300);
    			$pdf->SetTextColor(0);
				$pdf->Row(array($filas[$i]['fecha_entrada'], $filas[$i]['fecha_salida'], $filas[$i]['cedula'], $filas[$i]['nombres'],$filas[$i]['primer_apellido'].' '.$filas[$i]['segundo_apellido']));
			}
		}
$pdf->Output();
?>