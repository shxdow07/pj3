package prj3;

import java.sql.Connection ;
import java.sql.DriverManager ;
import java.sql.SQLException ;
import java.sql.Statement ;
import java.sql.ResultSet ;
import java.util.List ;
import java.util.ArrayList ;
public class Connexio {

    private Connection connection ;
    
   

    public Connexio(String driverClassName, String dbURL, String user, String password) throws SQLException, ClassNotFoundException {
        Class.forName(driverClassName);
        connection = DriverManager.getConnection(dbURL, user, password);
    }

    public void shutdown() throws SQLException {
        if (connection != null) {
            connection.close();
        }
    }

    public List<Client> getPersonList() throws SQLException {
        try (
            Statement stmnt = connection.createStatement();
            ResultSet rs = stmnt.executeQuery("select * from client");
        ){
            List<Client> personList = new ArrayList<>();
            while (rs.next()) {
                String dni = rs.getString("dni_usuari");
                String nom = rs.getString("nom");
                String cognom = rs.getString("cognom");
                String cognom2 = rs.getString("cognom2");
                Client person = new Client(dni, nom, cognom, cognom2);
                personList.add(person);
            }
            return personList ;
        } 
    }
    
    public List<CursColectiu> getCursColList() throws SQLException {
        try (
            Statement stmnt = connection.createStatement();
            ResultSet rs = stmnt.executeQuery("select * from curs c, curs_colectiu cc WHERE c.id_Curs=cc.id_Curs");
        ){
            List<CursColectiu> curscolList = new ArrayList<>();
            while (rs.next()) {
                int idcurs = rs.getInt("id_curs");
                String nom = rs.getString("Nom");
                int preuhora = rs.getInt("Preu_hora");
                CursColectiu curscol = new CursColectiu(idcurs, nom, preuhora);
                curscolList.add(curscol);
            }
            return curscolList ;
        } 
    }
    
    public List<CursCompeticio> getCursComList() throws SQLException {
        try (
            Statement stmnt = connection.createStatement();
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
            Statement stmnt = connection.createStatement();
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