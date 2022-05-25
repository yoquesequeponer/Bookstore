<?php 
class PDF extends FPDF{
function BuildTable($header,$data){
    $this->SetFillColor(230,230,230);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');

    $w = array(12,40,12,40);
    for($i=0;$i<count($header);$i++){
        $this->Cell($w[$i],7,$header[$i],1,0,'C',1);
        $this->Ln();

        $this->SetFillColor(175);
        $this->SetTextColor(0);
        $this->SetFont('');

        $fill=0;

        foreach ($data as $row) {
            $this->Cell($w[0],6,$row['id'],'LR',0,'C',$fill);
            $this->Cell($w[1],6,$row['name'],'LR',0,'C',$fill);
            $this->Cell($w[2],6,$row['price'],'LR',0,'C',$fill);
            $this->Cell($w[3],6,$row['authors'],'LR',0,'C',$fill);
            $this->LN();
            $fill =! $fill;
        }
        $this->Cell(array_sum($w),0,'','T');
    }
}
}
?>