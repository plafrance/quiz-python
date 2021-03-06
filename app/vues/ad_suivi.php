<?php

require_once('quiz_preambule.php');

page_header();


if(!isset($_GET['u'])){
    $users=get_users();

    echo "<table width=100%>";
    foreach ($users as $user){
        echo "<tr>";
        echo "<td><a href=index.php?p=ad_suivi&u=$user->id>" . $user->username . "</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}

elseif(!isset($_GET['t'])){
    $themes=get_themes($_GET['u']);

    echo "
           <pre class='code-wrapper'><code>
              <table width=100%>
              <th align=left  width=70%>Thème</th><th align=center width=30%>Complété</th>";


    foreach ($themes as $theme){
        echo "
              <tr>
                 <td><a href='?p=ad_suivi&u=" . $_GET['u'] . "&t=$theme->id'>$theme->titre</td><td align=center>". floor($theme->get_avancement()/$theme->get_nb_questions()*100) . "% </a></td>
              </tr>";
    }

    echo "</table>";
}

elseif(!isset($_GET['s'])){
$theme=new Theme($_GET['t'], $_GET['u']);
$theme->load_info();

    echo "

        <h3>$theme->titre</h3>
        <br><br>
        <pre class='code-wrapper'><code>
            <table width=100%>
              <th align=left width=10%>N°</th><th align=left>Sujet</th><th align=center>Complété</th>
";

//Description
echo "<tr><td>$serie->titre<td></tr>";

//Séries
foreach($theme->get_series() as $serie){
    echo "
          <tr>
          <td>". $serie->numero ."</td><td>". $serie->titre ."</a></td><td align=center>".floor($serie->get_avancement()/$serie->get_nb_questions()*100) ."%</td>
          </tr>

         ";
}

echo "
<td>
<br>
</td>
</tr>
</table>
";

}
?>
