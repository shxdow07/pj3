package prj3;


import java.sql.ResultSet;

public class Client {
    private static int idClient;
    private String dni;
    private String nom;
    private String cognom;
    private String cognom2;

    
    public Client(){
        idClient++;
    }
    
    public Client (String dni, String nom, String cognom, String cognom2){
        idClient++;
        
        this.idClient = idClient;
        this.dni = dni;
        this.nom = nom;
        this.cognom = cognom;
        this.cognom2 = cognom2;

    }

    public static int getIdClient() {
        return idClient;
    }

    public String getDni() {
        return dni;
    }

    public String getNom() {
        return nom;
    }

    public String getCognom() {
        return cognom;
    }
    public String getCognom2() {
        return cognom2;
    }
  
    
}
