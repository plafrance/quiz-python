<?php

require_once('quiz_preambule.php');

page_header();

echo "
		  <h3>Quiz de programmation</h3>

		  <pre class='code-wrapper'><code>
		      <table>";

foreach(get_themes($_SESSION['user_id']) as $theme){
    echo "
			<tr>
			  <td><a href='?p=theme&ID=$theme->id'>$theme->titre (". $theme->get_avancement() ."/". $theme->get_nb_questions() . ") </a></td>
			</tr>
         ";
}
echo "    
		      </table>
    ";

page_footer();

?>