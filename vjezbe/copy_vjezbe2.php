
<? 
//provjera da li je postano 
if($_SERVER['REQUEST_METHOD'] == 'POST') { 

 $danas = getdate();  

 $mjesec = $danas[month];  

 $dan = $danas[mday];  

 $godina = $danas[year];  

 $text = "Datum: " . "$mjesec $dan, $godina" . "\n\n"; 

 $text .= "Ime: " . $_POST['ime'] . "\n"; 

 $text .= "Prezime: " . $_POST['prezime'] . "\n"; 

 $text .= "Email: " . $_POST['email'] . "\n"; 

 $text .= "Komentar: " . $_POST['komentar'] . "\n\n"; 
  
// sadrži hr charset pa se HR znakovi normalno vide 

 mail("email@email.com", "Kontakt informacija sa weba", $text, 
    "From: adresa \nContent-Type: text/html; charset=windows-1250");  

} 
?> 