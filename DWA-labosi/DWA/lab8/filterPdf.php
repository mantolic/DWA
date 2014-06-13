<?php

	include ('sesija.php');

	require('fpdf.php');

	class People {
	    public function all() {
	        try {
	        	$ime1=$_POST['firstname'];
				$prezime1=$_POST['lastname'];
				$krv1=$_POST['bloodGroup'];
				$znak1=$_POST['bloodType'];

				unset($sql);

				if ($ime1) {
				    $sql[] = " ime = '$ime1' ";
				}
				if ($prezime1) {
				    $sql[] = " prezime = '$prezime1' ";
				}
				if($krv1) {
					$sql[] = " krvnaGrupa = '$krv1' ";
				}
				if($znak1) {
					$sql[] = " tipKrvi = '$znak1' ";
				}

				$query1 = "SELECT ime, prezime, spol, datumRodenja, mjestoRodenja, adresa, krvnaGrupa,tipKrvi, tegobe,opisTegobe, alergije, opisAlergije FROM podaci";

				if (!empty($sql)) {
				    $query1 .= ' WHERE ' . implode(' AND ', $sql);
				}

			


	            $db = new PDO('mysql:host=localhost;dbname=ljekarna;charset=UTF8', 'root', 'root');
	            $query = $db->prepare("$query1");
	            $query->execute();
	            $people = $query->fetchAll(PDO::FETCH_ASSOC);
	        } catch (PDOException $e) {
	            //echo "Exeption: " .$e->getMessage();
	            $result = false;
	        }
	        $query = null;
	        $db = null;
	        return $people;        
	    }
	}

	class PeoplePDF extends FPDF {
	    // Create basic table
	    public function CreateTable($header, $data)
	    {
	        // Header
	        $this->SetFillColor(154);
	        $this->SetTextColor(255);
	        $this->SetFont('','B',10);
	        foreach ($header as $col) {
	            //Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]])
	            $this->Cell($col[1], 10, $col[0], 1, 0, 'L', true);
	        }
	        $this->Ln();
	        // Data
	        $this->SetFillColor(255);
	        $this->SetTextColor(0);
	        $this->SetFont('','',10);
	        foreach ($data as $row)
	        {
	            $i = 0;
	            foreach ($row as $field) {
	                $this->Cell($header[$i][1], 6, $field, 1, 0, 'L', true);
	                $i++;
	            }
	            $this->Ln();
	        }
	    }
	}

	// Column headings
	$header = array(
	             array('Ime', 20), 
	             array('Prezime', 20),
	             array('Spol',10),
	             array('Roden',20),
	             array('Mjesto',35),
	             array('Adresa',35),
	             array('KG',8),
	             array('T',8),
	             array('Tegobe',15),
	             array('Opis tegobe',45),
	             array('Alergije',15),
	             array('Opis alergije',45) 
	          );
	// Get data
	$people = new People();
	$data = $people->all();

	$pdf = new PeoplePDF('L');
	$pdf->SetFont('Arial', '', 12);
	$pdf->AddPage();
	$pdf->CreateTable($header,$data);
	$pdf->Output();

?>
