package prj3;

import java.sql.Connection ;
import java.sql.DriverManager ;
import java.sql.PreparedStatement;
import java.sql.SQLException ;
import java.sql.Statement ;
import java.sql.ResultSet ;
import java.util.List ;
import java.util.ArrayList ;
public class Connexio {

    private static Connection con;

    public Connexio() throws SQLException{
        
        con = DriverManager.getConnection("jdbc:mysql://localhost:3307/esqui","root", "");
    }
    
    public Connection connectarBD(){
        return con;
    }
   

    public List<Client> getPersonList() throws SQLException {
        try (
            Statement stmnt = con.createStatement();
            ResultSet rs = stmnt.executeQuery("select client.*, client_colectiu.num_familiar,client_federat.nivell from client left join client_colectiu on client.dni_usuari = client_colectiu.dni_usuari left join client_federat on client.dni_usuari = client_federat.dni_usuari; ");
        ){
            List<Client> personList = new ArrayList<>();
            while (rs.next()) {
                String dni = rs.getString("dni_usuari");
                String nom = rs.getString("nom");
                String cognom = rs.getString("cognom");
                String cognom2 = rs.getString("cognom2");
                String familianum = rs.getString("num_familiar");
                String nivell = rs.getString("nivell");
                Client person = new Client(dni, nom, cognom, cognom2, familianum, nivell);
                personList.add(person);
            }
            return personList ;
        } 
    }
    
    public List<CursColectiu> getCursColList() throws SQLException {
        try (
            Statement stmnt = con.createStatement();
            ResultSet rs = stmnt.executeQuery("select * from curs c, curs_colectiu cc WHERE c.id_Curs=cc.id_Curs");
        ){
            List<CursColectiu> curscolList = new ArrayList<>();
            while (rs.next()) {
                int idcurs = rs.getInt("id_curs");
                String nom = rs.getString("Nom");
                int preuhora = rs.getInt("preu");
                int aforament = rs.getInt("aforament");
                CursColectiu curscol = new CursColectiu(idcurs, nom, preuhora, aforament);
                curscolList.add(curscol);
            }
            return curscolList ;
        } 
    }
    
    public List<CursCompeticio> getCursComList() throws SQLException {
        try (
            Statement stmnt = con.createStatement();
            ResultSet rs = stmnt.executeQuery("select * from curs C, curs_competitiu cco WHERE c.id_curs=cco.id_curs");
        ){
            List<CursCompeticio> curscomList = new ArrayList<>();
            while (rs.next()) {
                int idcurs = rs.getInt("id_curs");
                String nom = rs.getString("Nom");
                int preuhora = rs.getInt("preu_comp");
                String nivellcurs = rs.getString("nivell");
                CursCompeticio curscom = new CursCompeticio(idcurs, nom, preuhora, nivellcurs);
                curscomList.add(curscom);
            }
            return curscomList ;
        } 
    }
    
    public List<CursIndividual> getCursIndList() throws SQLException {
        try (
            Statement stmnt = con.createStatement();
            ResultSet rs = stmnt.executeQuery("select * from curs C, curs_individual ci WHERE c.id_curs=ci.id_curs");
        ){
            List<CursIndividual> curscomList = new ArrayList<>();
            while (rs.next()) {
                int idcurs = rs.getInt("id_curs");
                String nom = rs.getString("Nom");
                int preuhora = rs.getInt("Preu_hora");
                CursIndividual cursind = new CursIndividual(idcurs, nom, preuhora);
                curscomList.add(cursind);
            }
            return curscomList ;
        } 
    }

  
   


    
   
    
}