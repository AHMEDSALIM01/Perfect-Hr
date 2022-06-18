<?php 
require_once APPROOT.'/views/includes/fpdf.php';

if (file_exists(URLROOT."/public/img/favicon.ico"))
echo '<link rel="shortcut icon" href='.URLROOT.'"public/img/favicon.ico" />\n';


class PDF extends FPDF
{

   
// En-tête
function Header()
{
    // Logo
    $this->Image(URLROOT.'/public/img/logoblue.png',10,6,60);
    // Police Arial gras 15
    $this->SetFont('Arial','B',15);
    // Décalage à droite
    $this->Cell(80);
    // Titre

    // Saut de ligne
    $this->Ln(20);
}

// Pied de page
function Footer()
{
    $this->SetTextColor(78,115,223);
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page
    $this->Cell('auto',10,'PERFECT HR, 21 rue Mikhael Nouaima, 46 300 Youssoufia, 06 89 73 46 70, SIRET :132 455 721 2563 ',0,0,'C');
    $this->SetY(160);
    $this->SetX(-60);
    $this->SetFont('Arial','B',8);
    $this->SetTextColor(0,0,0);
    $this->Cell('auto',2,'Signature',0,1);
}
function WordWrap(&$text, $maxwidth)
{
    $text = trim($text);
    if ($text==='')
        return 0;
    $space = $this->GetStringWidth(' ');
    $lines = explode("\n", $text);
    $text = '';
    $count = 0;

    foreach ($lines as $line)
    {
        $words = preg_split('/ +/', $line);
        $width = 0;

        foreach ($words as $word)
        {
            $wordwidth = $this->GetStringWidth($word);
            if ($wordwidth > $maxwidth)
            {
                // Word is too long, we cut it
                for($i=0; $i<strlen($word); $i++)
                {
                    $wordwidth = $this->GetStringWidth(substr($word, $i, 1));
                    if($width + $wordwidth <= $maxwidth)
                    {
                        $width += $wordwidth;
                        $text .= substr($word, $i, 1);
                    }
                    else
                    {
                        $width = $wordwidth;
                        $text = rtrim($text)."\n\n".substr($word, $i, 1);
                        $count++;
                    }
                }
            }
            elseif($width + $wordwidth <= $maxwidth)
            {
                $width += $wordwidth + $space;
                $text .= $word.' ';
            }
            else
            {
                $width = $wordwidth + $space;
                $text = rtrim($text)."\n\n".$word.' ';
                $count++;
            }
        }
        $text = rtrim($text)."\n\n\n";
        $count++;
    }
    $text = rtrim($text);
    return $count;
}
}

// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','b',15);
$pdf->SetY(40); 
$pdf->Cell('auto',2,$data['title'],10,1,'C');
$pdf->SetY(70); 
$pdf->SetTitle($data['title']);
$text=utf8_decode("Nous soussignés société SDEVBTP  domiciliée à Youssoufia , attestons par la présente que Mr ".$data['ATT']->nom_complet_employe." , Immatriculé à la CNSS sous le numéro ".$data['ATT']->n_cnss." , est employé au sein de notre société en qualité de ".$data['ATT']->fonction." .
Et ce depuis le  ".$data['ATT']->date_embauche." à ce jour .
La presente attestation lui est délivrée à sa demande pour servir et valoir ce que de droit.
");
$pdf->SetFont('Arial','',10);
$nb=$pdf->WordWrap($text,580);
$pdf->Write(6,$text);
$image=URLROOT.'/public/img/cachet.png';
$pdf->SetY(-155);
$pdf->SetX(-15);
$pdf->Cell('auto',2,utf8_decode('Fait à '.$data['ATT']->lieu.', Le '.$data['ATT']->date_operation),10,1,'R');
$pdf->SetY(-125);
$pdf->Cell(30, 30, $pdf -> Image($image, 125, $pdf -> GetY(), 68), 0, 0, 'R', false);
$pdf->SetDrawColor(78,115,223);
$pdf->Rect(5, 5, 200, 287, 'D');
$pdf->Output('','attestation_de_travail.pdf',(true));
?>