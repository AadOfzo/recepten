Deze appicatie is gemaakt met php en sql.
Ik heb gewerkt met XAMPP en phpmyadmin.

1 Start XAMPP op als admin en check of de servers van Apache en MySQL draaien.
2 Sleep de folder in de \XAMPP\htdocs\ folder (Deze staat waarschijnlijk op C:\)
3 Start VSCode en open de aangeleverde folder door deze in een lege window te slepen.
4 Open http://localhost/phpmyadmin/index.php in de browser (ik heb Google Chrome gebruikt).
5 Open http://localhost/recepten/?page=home in de browser.

Functionaliteiten:
Users:
- Users kunnen aangemaakt worden via de SignUp pagina.
- Users kunnen gezocht worden via de Search User pagina.
    bobby_blanco is een test User die gezocht kan worden. 
    Hierbij zijn ook de gepostte recepten zichtbaar.
- Users kunnen verwijderd worden via de Delete User pagina.
- Users kunnen handmatig via userupdate.inc.php geupdate worden. 

Recepten:
- Ingredienten kunnen gepost worden en komen in de database.
- Relaties tussen verschillende documenten is mij niet gelukt.

Onduidelijkheden:
- session_start(); er zijn 8 instanties van session_start(); 
  ik ben er niet goed achter gekomen hoe deze geïmplementeerd moet worden.

Niet gelukt:
- ik wilde een asynchone functie schrijven om verschillende submit functies 
  binnen een formulier te krijgen en zo een relatie tussen ingredienten en recepten kunnen maken.
  dit werkt alleen anders in php. 

Gebruikte referenties:
https://youtu.be/H2XtR1zwg6s?si=1rukKk-Jwdnn5pbO - 16 tm 22 Databases aanmaken en CRUD operaties op users.
                                                    10 Array's aanmaken  en bewerken.

Toelichting:
Na een paar verkeerde tutorials ben ik de bovenstaande tegen gekomen, hiermee heb ik geleerd; 
- CRUD functionaliteit voor users.
- Zoek functie voor user en recepten (hier is wel een relatie via de database).
- Wachtwoord encryptie.
- Array functies. 

Hierna ben ik gaan experimenteren met de relaties tussen documenten.
Ik moest wennen aan het definiëren van de documenten deze werken iets anders dan componenten.
Ik ben tot het invoeren van ingredienten bij recepten gekomen. 
Hierdoor zitten er nog fouten in mijn recepten_handler.php

Ik moet nog een beetje wennen aan een iets andere stijl van schrijven, maar denk wel dat ik dit snel op kan pakken.
Ik pak het makkelijker op dan JAVA, maar er is nog veel te leren.

Bedankt voor jullie tijd om naar mijn assesment te kijken.

Vriendleijke groet, 

Adrien
