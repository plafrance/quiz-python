<?php

require('../quiz.php');

$r=rand(1000,9999);

execute("Question 1", "Vous désirez refaire la commande <code>cat</code> en python (pourquoi pas). Cette commande affiche le contenu du fichier passé en paramètre sur la ligne de commande.", "", "E5G9VM2pV4", '

def cat(nom_fichier):
    """
    Lit et affiche le contenu d\'un fichier

    Paramètre : 
    - nom_fichier : Le nom complet du fichier à lire

    Exemples :
    >>> #Lit et affiche le contenu du fichier
    >>> cat("/tmp/fichier_test.txt")
    Secret : '.$r.'
    Ce fichier ne contient rien d\'autre.

    """',
    '','# --- Exécute les tests ---
if __name__ == "__main__":
    import doctest
    doctest.testmod()', 'f_temp=open("/tmp/fichier_test.txt","w");f_temp.write("Secret : '.$r.'\nCe fichier ne contient rien d\'autre.\n");f_temp.close()', "q2.php");

?>
