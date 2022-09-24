<?php


$html = '';
$html = '<table border = 1 cellpadding=1 cellspacing=1>
    <thead>
    <tr>
    <th>Id</th>
    <th>First name </th>
    <th>Last name</th>
    <th>Class</th>
    <th>Section</th>
    </tr>   
    </thead>
<tbody>

';

$link = mysqli_connect('localhost','root','','phpcrud');
$no = 1;
$q = "SELECT * FROM `students` ORDER BY id ASC";
$result = mysqli_query($link,$q);
$rows = mysqli_num_rows($result);
if($rows>0){
    while($rows = mysqli_fetch_assoc($result)){
     $html .= '<tr class=aligncenter>
     <td>'.$no.'</td>
     <td>'.$rows['id'].'</td>
     <td>'.$rows['fname'].'</td>
     <td>'.$rows['lname'].'</td>
     <td>'.$rows['class'].'</td>
     <td>'.$rows['section'].'</td>
     </tr>';
    }
    $no++;
}
else{
    $html .= '<tr>Something went wrong</tr>';
}
$html .= '</tbody></table>';

require_once __DIR__ . '/vendor/autoload.php';

	$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-L' ]);
	$mpdf->SetDisplayMode('fullpage');
	$mpdf->WriteHTML( $html);
	/* $mpdf->Output( 'devnote.pdf', 'F' ); */

	$mpdf->Output();

	
	exit;


?>