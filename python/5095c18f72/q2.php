<?php

require('../quiz.php');

execute("Question 2", "Complétez les tests de la classe Dé", "", "loWhTdoM5w", '
import random

class  Dé:
    """
    Un dé à jouer d\'un nombre variable de faces.
    
    """
    def __init__(self, faces):
        """
        Initialise le dé.

        Paramètre:
        - faces : entier, le nombre de faces du dé. Doit être >1.

        """
        assert faces > 1, "Le nombre de faces doit être > 1"
        self.__faces = faces
        self.__face = 1
            
    def lancer(self):
        """
        Simule un lancer de dé
        
        retour: le nombre aléatoire sur le dé.
        
        Exemple:
        >>> nb_faces = 6
        >>> dé_test = Dé( nb_faces )', '', '
        >>> résultat > 0 and résultat <= nb_faces
        True

        """
        self.__face = random.randrange(self.__faces) + 1
        return self.__face

    @property
    def face(self):
        """
        Propriété en lecture seule de la face supérieure du dé.

        Retour : un entier représentant le nombre de points sur la face supérieure du dé.

        """
        return self.__face

# --- Exécute les tests ---
if __name__ == "__main__":
    import doctest
    doctest.testmod()
','', "q3.php");

?>