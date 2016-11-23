<?php

// exo 1

echo date('d/m/Y');

// exo 2

echo "</br>";
echo date('d-m-Y');

// exo 3

echo "</br>";
setlocale(LC_TIME, 'fra_fra');
echo strftime('%d %B %Y');

// exo 4

echo "</br>";
echo time();

echo "</br>";
echo mktime(15, 0, 0, 2, 8, 2016);

// exo 5

$premiereDate = new DateTime('23-11-2016');
$secondeDate = new DateTime('16-05-2016');
$ecart = $premiereDate->diff($secondeDate);

echo "</br>";
echo $ecart->format('%a jours');

// exo 6

$number = cal_days_in_month(CAL_GREGORIAN, 2, 2016);
echo "</br>";
echo $number."jours";

// exo 7

echo "</br>";
echo date('d-m-Y', strtotime('+20 days'));

// exo 8

echo "</br>";
echo date('d-m-Y', strtotime('-20 days'));

// TP

function craft_calendar($mois, $annee)
{

    /* On dessine le tableau */

    $calendrier = "<table cellpadding='0' cellspacing='0' class='calendar'>";

    /* En-tête */

    $heading = array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
    $calendrier .= '<tr class="calendar-row"><td class="calendar-day-head">' . implode('</td><td class="calendar-day-head">', $heading) . '</td></tr>';

    /* Variable du calendrier */

    $date_en_cour = date('w', mktime(0, 0, 0, $mois, 1, $annee));
    $nb_jours_mois = date('t', mktime(0, 0, 0, $mois, 1, $annee));
    $jours_dans_semaine = 1;
    $compteur_jours = 0;


    /* Ligne pour la semaine 1 */

    $calendrier.= '<tr class="calendar-row">';

    /* Faire en sorte que les cases soit vide avant le premier jours de la semaine acutelle */

    for ($x = 0; $x < $date_en_cour; $x++):
    $calendrier.= '<td class="calendar-day-np"></td>';
    $jours_dans_semaine++;
    endfor;

    /* On continue avec les jours.. */

    for ($liste_jours = 1; $liste_jours <= $nb_jours_mois; $liste_jours++):
        $calendrier .= '<td class="calendar-day">';

        /* On ajoute le nombre de jours */

        $calendrier .= '<div class="day-number">' . $liste_jours . '</div>';

        $calendrier .= str_repeat('<p></p>', 2);

        $calendrier .= '</td>';
        if ($date_en_cour == 6):
            $calendrier .= '</tr>';
            if (($compteur_jours + 1) != $nb_jours_mois):
                $calendrier .= '<tr class="calendar-row">';
            endif;
            $date_en_cour = -1;
            $jours_dans_semaine = 0;
        endif;
        $jours_dans_semaine++;
        $date_en_cour++;
        $compteur_jours++;
    endfor;

    /* On termine le reste des jours de la semaine */

    if ($jours_dans_semaine < 8):
        for ($x = 1; $x <= (8 - $jours_dans_semaine); $x++):
            $calendrier .= '<td class="calendar-day-np"></td>';
        endfor;
    endif;

    /* derniere ligne */

    $calendrier .= '</tr>';

    /* fin du tableau */

    $calendrier .= '</table>';

    /* Voilà on a terminé ! Affichons fièrement le résultat ! */

    return $calendrier;
}

    /* Montre moi ce que tu as dans le ventre : */
    echo '
    <FORM action="#" method="post">
    <SELECT id="mois" name="mois" size="1">
    <OPTION value="1">Janvier
    <OPTION value="2">Fevrier
    <OPTION value="3">Mars
    <OPTION value="4">Avril
    <OPTION value="5">Mai
    <OPTION value="6">Juin
    <OPTION value="7">Juillet
    <OPTION value="8">Août
    <OPTION value="9">Septembre
    <OPTION value="10">Octobre
    <OPTION value="11">Novembre
    <OPTION value="12">Decembre
    </SELECT>
    <SELECT name="annee" size="1">
    <OPTION>2010
    <OPTION>2011
    <OPTION>2012
    <OPTION>2013
    <OPTION>2014
    <OPTION>2015
    <OPTION>2016
    <OPTION>2017
    <OPTION>2018
    <OPTION>2019
    <OPTION>2020
    </SELECT>
    <input type="submit" name="submit" />
    </FORM>';


    echo "<style>
                table.calendar { border-left:1px solid #999; border-collapse:collapse; }
                tr.calendar-row {  }
                td.calendar-day { min-height:80px; font-size:1.0em; position:relative; margin:0; padding:0; }
                * html div.calendar-day { height:80px; }
                td.calendar-day:hover { background-color:#eceff5; margin:0; padding:5px; }
                td.calendar-day-np { background-color:#eee; margin:0; padding:0; min-height:80px; }
                * html div.calendar-day-np { height:80px; }
                td.calendar-day-head { background-color:#ccc; font-weight:bold; text-align:center; width:120px; padding:5px; margin:0; border-bottom:1px solid #999; border-top:1px solid #999; border-right:1px solid #999; }
                div.day-number { background:#999; padding:5px; color:#fff; font-weight:bold; float:right; margin:-5px -5px 0 0; width:20px; text-align:center; }
                td.calendar-day, td.calendar-day-np { width:120px; padding:5px; border-bottom:1px solid #999; border-right:1px solid #999; margin:0; }
         </style>";
$dates_tableau = array(
    'Janvier'=> '1',
    'Fevrier' => '2',
    'Mars' => '3',
    'Avril' => '4',
    'Mai' => '5',
    'Juin' => '6',
    'Juillet' => '7',
    'Août' => '8',
    'Septembre' => '9',
    'Octobre' => '10',
    'Novembre' => '11',
    'Decembre' => '12',
);
if((isset($_POST['mois']))&&(isset($_POST['annee']))){
    $mois_selectionne = $_POST['mois'];
    $annee_selectionne = $_POST['annee'];
    echo '<h2>'.$mois_selectionne."/".$annee_selectionne.'</h2>';
    echo craft_calendar($mois_selectionne, $annee_selectionne);
};



















