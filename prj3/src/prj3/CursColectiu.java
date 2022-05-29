package prj3;
/**
 * Prova de javadoc
 * @author DAM
 * @see Cursos
 */
public class CursColectiu extends Cursos{
     private int aforament;
    public CursColectiu() {
    }

    public CursColectiu(int ID, String nom, int preu_hora, int aforament) {
        super(ID, nom, preu_hora);
        this.aforament = aforament;
    }
    
      public int getAforament() {
        return aforament;
    }
    
    
}

