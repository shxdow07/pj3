package prj3;
import javafx.scene.control.TableView;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.sql.Statement;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.animation.TranslateTransition;
import javafx.application.Application;
import javafx.application.Platform;
import javafx.beans.value.ChangeListener;
import javafx.beans.value.ObservableValue;
import javafx.event.ActionEvent;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.Tab;
import javafx.scene.control.TabPane;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.effect.DropShadow;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Pane;
import javafx.scene.layout.StackPane;
import javafx.scene.layout.VBox;
import javafx.scene.paint.Color;
import javafx.scene.text.Font;
import javafx.stage.Stage;
import javafx.util.Duration;

public class AvalanchaInc extends Application{
    TextField txtClientNom;
    TextField txtCliDni;
    TextField txtCliCognom;
    TextField txtCliCognom2;
    TextField txtCliCursID;
    TextField txtCliCursNom;
    Label lblfamilianum = new Label ("Aforament");
    TextField txtfamilianum = new TextField();
    Label lblAfor = new Label ("Aforament");
    TextField txtCliCursAfor = new TextField();
    Label lblNivell = new Label ("Nivell");
    TextField txtCliCursNivell = new TextField();
    Label lblPreu = new Label ("Preu");
    TextField txtCliCursPreu = new TextField();
    Label lblPreu2 = new Label ("Preu");
    TextField txtCliCursPreu2 = new TextField();
    Label lblpreuh = new Label ("Preu Hora");
    TextField txtCliCursPreuh = new TextField();
    
    Label lblhores = new Label ("Hores");
    TextField txtCliCurshores = new TextField("1");
    int i = 0;
    int i3;
    int i4;
    int i5;
    int i6;
    int i7;
     public static void main (String[] args){
        launch();
    }


    @Override
    public void start(Stage escenari) throws Exception {
        
        escenari.getIcons().add(new Image("https://img.icons8.com/external-photo3ideastudio-lineal-color-photo3ideastudio/344/external-avalanche-natural-disaster-photo3ideastudio-lineal-color-photo3ideastudio.png"));

        escenari.setTitle("AVALANCHA INC");
        BorderPane bp = new BorderPane();
       
        bp.setTop(partSuperior());
        bp.setStyle("-fx-background-image: url('https://fondosmil.com/fondo/7380.jpg');");
                 StackPane root = new StackPane();
        Scene scene = new Scene(root, 500, 500);
        root.setStyle("-fx-background-image:                                                url('https://fondosmil.com/fondo/7380.jpg'); -fx-background-repeat: no-repeat; -fx-background-size: 500 500; -fx-background-position: center center;");
        escenari.setScene(scene);
        escenari.show();
        Pane inferior = partInferior();
        bp.setBottom(inferior);
        BorderPane.setMargin(inferior,new Insets(30,30,30,30));
       
        Pane lEsquerra = partEsquerra();
        bp.setLeft(lEsquerra);
        BorderPane.setMargin(lEsquerra, new Insets(20,20,20,20));
        
        bp.setCenter(formulariCentral());
        
        Pane lDreta = partDreta();
        bp.setRight(lDreta);
        BorderPane.setMargin(lDreta, new Insets(20,20,20,20));
        
      
        
       
        Scene escena = new Scene (bp);
        escenari.setScene(escena);
        escenari.setMinHeight(1000);
        escenari.setMinWidth(100);
        
        escenari.show();
  
    
}
    
    private GridPane formulariCentral(){
        GridPane gp = new GridPane();
        
        Label lblDni = new Label ("DNI");
        lblDni.setTextFill(Color.web("#ffffff"));
        DropShadow shadow = new DropShadow();
        lblDni.setEffect(shadow);
        
        Label lblNom = new Label ("Nom");
        lblNom.setTextFill(Color.web("#ffffff"));
        lblNom.setTranslateY(10);
        lblNom.setEffect(shadow);
        
        
        Label lblCognom = new Label ("Cognom");
        lblCognom.setTextFill(Color.web("#ffffff"));
        lblCognom.setTranslateY(20);
        lblCognom.setEffect(shadow);
        
        Label lblCognom2 = new Label ("Cognom2");
        lblCognom2.setTextFill(Color.web("#ffffff"));
        lblCognom2.setTranslateY(30);
        lblCognom2.setEffect(shadow);
        
        Label lblID = new Label ("ID");
        lblID.setTextFill(Color.web("#ffffff"));
        lblID.setTranslateY(40);
        lblID.setEffect(shadow);
        
        Label lblCursNom = new Label ("Nom");
        lblCursNom.setTextFill(Color.web("#ffffff"));
        lblCursNom.setTranslateY(50);
        lblCursNom.setEffect(shadow);
        
        
        lblPreu.setTextFill(Color.web("#ffffff"));
        lblPreu.setTranslateY(60);
        lblPreu.setEffect(shadow);
        
        
        
        lblNivell.setTextFill(Color.web("#ffffff"));
        lblNivell.setTranslateY(70);
        lblNivell.setEffect(shadow);
        lblNivell.setVisible(false);
        
        
        lblAfor.setTextFill(Color.web("#ffffff"));
        lblAfor.setTranslateY(10);
        lblAfor.setEffect(shadow);
        lblAfor.setVisible(false);
        
        lblpreuh.setTextFill(Color.web("#ffffff"));
        lblpreuh.setTranslateY(25);
        lblpreuh.setEffect(shadow);
        lblpreuh.setVisible(false);
        
       lblhores.setTextFill(Color.web("#ffffff"));
        lblhores.setTranslateY(35);
        lblhores.setEffect(shadow);
        lblhores.setVisible(false);
        
        lblPreu2.setTextFill(Color.web("#ffffff"));
        lblPreu2.setTranslateY(-30);
        lblPreu2.setEffect(shadow);
        lblPreu2.setVisible(false);

        txtCliDni = new TextField();
        DropShadow shadow1 = new DropShadow();
        txtCliDni.setEffect(shadow1);
        
        txtClientNom = new TextField();
        txtClientNom.setTranslateY(10);
        DropShadow shadow2 = new DropShadow();
        txtClientNom.setEffect(shadow2);
        
        txtCliCognom = new TextField();
        txtCliCognom.setTranslateY(20);
        DropShadow shadow3 = new DropShadow();
        txtCliCognom.setEffect(shadow3);
        
        txtCliCognom2 = new TextField();
        txtCliCognom2.setTranslateY(30);
        DropShadow shadow4 = new DropShadow();
        txtCliCognom2.setEffect(shadow4);
        
        txtCliCursID = new TextField();
        txtCliCursID.setTranslateY(40);
        DropShadow shadow5 = new DropShadow();
        txtCliCursID.setEffect(shadow5);
        
        txtCliCursNom = new TextField();
        txtCliCursNom.setTranslateY(50);
        DropShadow shadow6 = new DropShadow();
        txtCliCursNom.setEffect(shadow6);
        
        txtCliCursPreu.setTranslateY(60);
        DropShadow shadow7 = new DropShadow();
        txtCliCursPreu.setEffect(shadow7);
        
       
        
        txtCliCursNivell.setTranslateY(70);
        DropShadow shadow8 = new DropShadow();
        txtCliCursNivell.setEffect(shadow8);
        txtCliCursNivell.setVisible(false);
        
         txtCliCursAfor.setTranslateY(10);
        DropShadow shadow9 = new DropShadow();
        txtCliCursAfor.setEffect(shadow9);
        txtCliCursAfor.setVisible(false);
        
         txtCliCursPreuh.setTranslateY(25);
        DropShadow shadow10 = new DropShadow();
        txtCliCursPreuh.setEffect(shadow10);
        txtCliCursPreuh.setVisible(false);
        
         txtCliCurshores.setTranslateY(35);
        DropShadow shadow11 = new DropShadow();
        txtCliCurshores.setEffect(shadow11);
        txtCliCurshores.setVisible(false);
        
         txtCliCursPreu2.setTranslateY(-30);
        DropShadow shadow12 = new DropShadow();
        txtCliCursPreu2.setEffect(shadow12);
        txtCliCursPreu2.setVisible(false);
        gp.setAlignment(Pos.CENTER);
        
        gp.add(lblDni, 0, 0);
        gp.add(txtCliDni, 1, 0);
        gp.add(lblNom, 0, 1);
        gp.add(txtClientNom, 1, 1);
        gp.add(lblCognom, 0, 2);
        gp.add(txtCliCognom, 1, 2);
        gp.add(lblCognom2, 0, 3);
        gp.add(txtCliCognom2, 1, 3);
        gp.add(lblID, 0, 4);
        gp.add(txtCliCursID, 1, 4);
        gp.add(lblCursNom, 0, 5);
        gp.add(txtCliCursNom, 1, 5);
        gp.add(lblPreu, 0, 6);
        gp.add(txtCliCursPreu, 1, 6);
        gp.add(lblNivell, 0, 7);
        gp.add(txtCliCursNivell, 1, 7);
        gp.add(lblAfor, 0, 8);
        gp.add(txtCliCursAfor, 1, 8);
        gp.add(lblpreuh, 0, 9);
        gp.add(txtCliCursPreuh, 1, 9);
        gp.add(lblhores, 0, 10);
        gp.add(txtCliCurshores, 1, 10);
        gp.add(lblPreu2, 0, 11);
        gp.add(txtCliCursPreu2, 1, 11);
        return gp;
        
    }
    
    private Pane partSuperior(){
        HBox hb = new HBox();
        Label lblAvalancha = new Label("AVALANCHA INC");
        lblAvalancha.setFont(new Font(80));
        lblAvalancha.setTextFill(Color.web("#ffffff"));
        DropShadow shadow = new DropShadow();
        lblAvalancha.setEffect(shadow);
        hb.setAlignment(Pos.CENTER);
        ImageView logo = new ImageView ("https://img.icons8.com/external-filled-outline-lima-studio/344/external-avalanche-winter-filled-outline-lima-studio.png");
        logo.setFitHeight(100);
        logo.setFitWidth(100);
        
        
        hb.getChildren().addAll(lblAvalancha,logo);
        return hb;
        
    }
    
    private Pane partInferior() throws SQLException, ClassNotFoundException{
        
        Button btn1 = new Button("Eliminar");
        btn1.setTextFill(Color.web("#ffffff"));
        btn1.setTranslateX(-10);
        Image img = new Image("https://cdn-icons-png.flaticon.com/512/88/88666.png");
        ImageView view = new ImageView(img);
        view.setFitHeight(30);
        view.setFitWidth(30);
        btn1.setGraphic(view);
        btn1.setStyle("-fx-background-color:#404040;");
        Duration duration = Duration.millis(1250);
        TranslateTransition transition = new TranslateTransition(duration, btn1);
        transition.setByY(300);
        transition.setAutoReverse(true);
        transition.setCycleCount(2);
        transition.play();
        btn1.setOnAction(event ->{
            txtCliDni.clear();
            txtClientNom.clear();
            txtCliCognom.clear();
            txtCliCognom2.clear();
            txtCliCursID.clear();
            txtCliCursNom.clear();
            txtCliCursPreu.clear();
             txtCliCursPreu2.clear();
            txtCliCursNivell.clear();
            txtCliCursAfor.clear();
            txtCliCursPreuh.clear();
            txtCliCurshores.clear();
            
            Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
             alert.setHeaderText(null);
             alert.setTitle("Info");
             alert.setContentText("S'han esborrat les dades");
             alert.showAndWait();
        });
        
        Button btn2 = new Button("Llogar");
        btn2.setTextFill(Color.web("#ffffff"));
        btn2.setStyle("-fx-background-color:#404040;");
        btn2.setTranslateX(30);
        Image img1 = new Image("https://img.icons8.com/ios-glyphs/344/money-yours.png");
        ImageView view1 = new ImageView(img1);
        view1.setFitHeight(30);
        view1.setFitWidth(30);
        btn2.setGraphic(view1);
        Duration duration2 = Duration.millis(1500);
        TranslateTransition transition2 = new TranslateTransition(duration2, btn2);
        transition2.setByY(300);
        transition2.setAutoReverse(true);
        transition2.setCycleCount(2);
        transition2.play();
        btn2.setOnAction((ActionEvent event) -> {
            try {
                
                llogar_curs();
            } catch (SQLException ex) {
               Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setHeaderText(null);
            alert.setTitle("Error");
            alert.setContentText("El client ja està inscrit a la cursa");
            alert.showAndWait();
            }
        });
                
        
        Button btn3 = new Button("Tancar");
        btn3.setTextFill(Color.web("#ffffff"));
        btn3.setStyle("-fx-background-color:#404040;");
        btn3.setTranslateX(80);
        Image img3 = new Image("https://img.icons8.com/ios/344/exit.png");
        ImageView view3 = new ImageView(img3);
        view3.setFitHeight(30);
        view3.setFitWidth(30);
        btn3.setGraphic(view3);
        Duration duration3 = Duration.millis(1750);
        TranslateTransition transition3 = new TranslateTransition(duration3, btn3);
        transition3.setByY(300);
        transition3.setAutoReverse(true);
        transition3.setCycleCount(2);
        transition3.play();
        btn3.setOnAction((ActionEvent event) -> {
            Platform.exit();
        });
        
        HBox hinferior = new HBox();
        hinferior.getChildren().addAll(btn1,btn2,btn3);
        hinferior.setAlignment(Pos.CENTER);
        
         
               
        return hinferior;
        
    }
    
    private boolean llogar_curs() throws SQLException{
        
        if (txtCliDni.getText().isEmpty()){
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setHeaderText(null);
            alert.setTitle("Error");
            alert.setContentText("Selecciona un Client");
            alert.showAndWait();
        } else if (txtCliCursID.getText().isEmpty()){
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setHeaderText(null);
            alert.setTitle("Error");
            alert.setContentText("Selecciona un Curs");
            alert.showAndWait();
        }
      
        
        if(!txtCliCursAfor.getText().isEmpty() && txtCliCursNivell.getText().isEmpty()){

            Connection con = new Connexio().connectarBD();
            Statement stmt = con.createStatement();
            stmt.execute("SET FOREIGN_KEY_CHECKS=0");
            stmt.close();
            PreparedStatement sql = con.prepareStatement("insert into lloguercurs_colectiu "
                    + "(id_curs, dni_usuari, data_lloguer, preu, max_clients) "
                    + "values "
                    + "(?, ?, ?, ?, ?);");
            sql.setString(1, txtCliCursID.getText());
            sql.setString(2, txtCliDni.getText());
            DateFormat dateFormat = new SimpleDateFormat("yyyy/MM/dd HH:mm:ss");
            Date date = new Date();
            sql.setString(3, dateFormat.format(date));
            sql.setString(4, txtCliCursPreu2.getText());
            sql.setString(5, txtCliCursAfor.getText());

             if (sql.executeUpdate() != 0) {
                Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
             alert.setHeaderText(null);
             alert.setTitle("Info");
             alert.setContentText("S'ha llogat un curs amb Èxit");
             alert.showAndWait();
             txtCliDni.clear();
             txtClientNom.clear();
            txtCliCognom.clear();
            txtCliCognom2.clear();
            txtCliCursID.clear();
            txtCliCursNom.clear();
            txtCliCursPreu.clear();
            txtCliCursPreu2.clear();
            txtCliCursNivell.clear();
            txtCliCursAfor.clear();
                 System.out.println("Insertat");
            }
            Statement stmt2 = con.createStatement();
            stmt2.execute("SET FOREIGN_KEY_CHECKS=1");
            stmt2.close();
            
        }else if(!txtCliCursNivell.getText().isEmpty() && txtCliCursAfor.getText().isEmpty()){

            Connection con = new Connexio().connectarBD();
            Statement stmt2 = con.createStatement();
            stmt2.execute("SET FOREIGN_KEY_CHECKS=0");
            stmt2.close();
            PreparedStatement sql2 = con.prepareStatement("insert into lloguercurs_competitiu "
                    + "(id_curs, dni_usuari, data_lloguer, preu, nivell) "
                    + "values "
                    + "(?, ?, ?, ?, ?);");
            sql2.setString(1, txtCliCursID.getText());
            sql2.setString(2, txtCliDni.getText());
            DateFormat dateFormat = new SimpleDateFormat("yyyy/MM/dd HH:mm:ss");
            Date date = new Date();
            sql2.setString(3, dateFormat.format(date));
            sql2.setString(4, txtCliCursPreu.getText());
            sql2.setString(5, txtCliCursNivell.getText());

           if (sql2.executeUpdate() != 0) {
                Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
             alert.setHeaderText(null);
             alert.setTitle("Info");
             alert.setContentText("S'ha llogat un curs amb Èxit");
             alert.showAndWait();
             txtCliDni.clear();
             txtClientNom.clear();
            txtCliCognom.clear();
            txtCliCognom2.clear();
            txtCliCursID.clear();
            txtCliCursNom.clear();
            txtCliCursPreu.clear();
            txtCliCursPreu2.clear();
            txtCliCursNivell.clear();
            txtCliCursAfor.clear();
            }
            Statement stmt3 = con.createStatement();
            stmt3.execute("SET FOREIGN_KEY_CHECKS=1");
            stmt3.close();
            
        }else if(txtCliCursNivell.getText().isEmpty() && txtCliCursAfor.getText().isEmpty()){

            Connection con = new Connexio().connectarBD();
            Statement stmt2 = con.createStatement();
            stmt2.execute("SET FOREIGN_KEY_CHECKS=0");
            stmt2.close();
            PreparedStatement sql3 = con.prepareStatement("insert into lloguercurs_individual "
                    + "(id_curs, dni_usuari, data_lloguer, preu) "
                    + "values "
                    + "(?, ?, ?, ?);");
            sql3.setString(1, txtCliCursID.getText());
            sql3.setString(2, txtCliDni.getText());
            DateFormat dateFormat = new SimpleDateFormat("yyyy/MM/dd HH:mm:ss");
            Date date = new Date();
            sql3.setString(3, dateFormat.format(date));
            sql3.setString(4, txtCliCursPreu.getText());
            if (sql3.executeUpdate() != 0) {
                Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
             alert.setHeaderText(null);
             alert.setTitle("Info");
             alert.setContentText("S'ha llogat un curs amb Èxit");
             alert.showAndWait();
             txtCliDni.clear();
             txtClientNom.clear();
            txtCliCognom.clear();
            txtCliCognom2.clear();
            txtCliCursID.clear();
            txtCliCursNom.clear();
            txtCliCursPreu.clear();
            txtCliCursPreu2.clear();
            txtCliCursNivell.clear();
            txtCliCursAfor.clear();
            txtCliCursPreuh.clear();
            txtCliCurshores.clear();
            }
            Statement stmt3 = con.createStatement();
            stmt3.execute("SET FOREIGN_KEY_CHECKS=1");
            stmt3.close();
            
        }
        return false;

    }
    
    private Pane partDreta() throws Exception{
        
        VBox vb = new VBox();
        
        Label lblDreta = new Label("CURSOS");
        lblDreta.setFont(new Font(50));
        lblDreta.setTextFill(Color.web("#ffffff"));

        vb.setAlignment(Pos.CENTER);
        vb.setSpacing(15);
        
        TabPane tp = new TabPane();
        Tab tab1 = new Tab("Col·lectiu/Familiar",cursosColectius());
        Tab tab2 = new Tab("Competició", cursosCompeticio());
        Tab tab3 = new Tab("Individuals", cursosIndividuals());
        tp.getTabs().add(tab1);
        tp.getTabs().add(tab2);
        tp.getTabs().add(tab3);
        ImageView logo3 = new ImageView ("https://img.icons8.com/wired/344/courses.png");
        logo3.setFitHeight(80);
        logo3.setFitWidth(80);
        logo3.setTranslateY(-545);
        logo3.setTranslateX(-155);
                
        vb.getChildren().addAll(lblDreta,tp,logo3);
        return vb;
    }
    
    private Pane cursosColectius() throws Exception{
        Connexio con = new Connexio();
        VBox vb = new VBox();
        TableView<CursColectiu> tblCursos = new TableView<>();
        TableColumn<CursColectiu, String> colID = new TableColumn<>("ID");
        TableColumn<CursColectiu, String> colNom = new TableColumn<>("Nom");
        TableColumn<CursColectiu, String> colPreu = new TableColumn<>("Preu");
        TableColumn<CursColectiu, String> colAfor = new TableColumn<>("Aforament");
        
        colID.setCellValueFactory(new PropertyValueFactory<>("ID"));
        colNom.setCellValueFactory(new PropertyValueFactory<>("nom"));
        colPreu.setCellValueFactory(new PropertyValueFactory<>("preu_hora"));
        colAfor.setCellValueFactory(new PropertyValueFactory<>("Aforament")); 

        tblCursos.getColumns().addAll(colID,colNom,colPreu,colAfor);
        
        tblCursos.getItems().addAll(con.getCursColList());

        
       vb.getChildren().add(tblCursos);
       
       tblCursos.getSelectionModel().selectedItemProperty().addListener(new ChangeListener() {
           @Override
            public void  changed(ObservableValue observable, Object oldValue, Object newValue) {
                CursColectiu curs = (CursColectiu) newValue;
                System.out.println(curs);
                if (curs != null){
                    i6=curs.getPreu_hora();
                    txtCliCursNivell.clear();
                    lblNivell.setVisible(false);
                    txtCliCursNivell.setVisible(false);
                    lblAfor.setVisible(true);
                    txtCliCursAfor.setVisible(true);
                    lblpreuh.setVisible(false);
                    txtCliCursPreuh.setVisible(false);
                    lblPreu.setVisible(false);
                    txtCliCursPreu.setVisible(false);
                    lblPreu2.setVisible(true);
                    txtCliCursPreu2.setVisible(true);
                    lblhores.setVisible(false);
                    txtCliCurshores.setVisible(false);
                    txtCliCursID.clear();
                    txtCliCursNom.clear();
                    txtCliCursPreu.clear();
                    txtCliCursNivell.clear();
                    txtCliCursID.setText(Integer.toString(curs.getID()));
                    txtCliCursNom.setText(curs.getNom());
                    txtCliCursPreu2.setText(Integer.toString(curs.getPreu_hora()));
                    txtCliCursAfor.setText(Integer.toString(curs.getAforament()));
                    
                            
                }
                
            }
        });
       
txtfamilianum.textProperty().addListener((observable, oldValue, newValue) -> {
            
            int i = Integer.parseInt(txtCliCursPreu2.getText());
            System.out.println(newValue);
            if(newValue==null){
                
                txtCliCursPreu2.setText(Integer.toString(i6));
            }else{
                i5=40;
                txtCliCursPreu2.setText(Integer.toString(i -((i*i5)/100)));
            }
            
        });
        return vb;
    }
    
    
    private Pane cursosCompeticio()throws Exception{
        Connexio con = new Connexio();
        
        VBox vb2 = new VBox();
        TableView<CursCompeticio> tblCursos = new TableView<>();
        TableColumn<CursCompeticio, String> colID = new TableColumn<>("ID");
        TableColumn<CursCompeticio, String> colNom = new TableColumn<>("Nom");
        TableColumn<CursCompeticio, String> colPreu = new TableColumn<>("Preu");
        TableColumn<CursCompeticio, String> colNivell = new TableColumn<>("Nivell");

        colID.setCellValueFactory(new PropertyValueFactory<>("ID"));
        colNom.setCellValueFactory(new PropertyValueFactory<>("nom"));
        colPreu.setCellValueFactory(new PropertyValueFactory<>("preu_hora"));
        colNivell.setCellValueFactory(new PropertyValueFactory<>("nivell"));

        tblCursos.getColumns().addAll(colID,colNom,colPreu,colNivell);
        
        tblCursos.getItems().addAll(con.getCursComList());
        
        

        
       vb2.getChildren().add(tblCursos);
       tblCursos.getSelectionModel().selectedItemProperty().addListener(new ChangeListener() {
            @Override
            public void changed(ObservableValue observable, Object oldValue, Object newValue) {
                CursCompeticio curs = (CursCompeticio) newValue;
                
                if (curs != null){
                    txtCliCursAfor.clear();
                    lblNivell.setVisible(true);
                    txtCliCursNivell.setVisible(true);
                    lblAfor.setVisible(false);
                    txtCliCursAfor.setVisible(false);
                    lblpreuh.setVisible(false);
                    txtCliCursPreuh.setVisible(false);
                    lblhores.setVisible(false);
                    txtCliCurshores.setVisible(false);
                    lblPreu.setVisible(true);
                    txtCliCursPreu.setVisible(true);
                    lblPreu2.setVisible(false);
                    txtCliCursPreu2.setVisible(false);
                    txtCliCursID.clear();
                    txtCliCursNom.clear();
                    txtCliCursPreu.clear();
                    txtCliCursAfor.clear();
                    txtCliCursID.setText(Integer.toString(curs.getID()));
                    txtCliCursNom.setText(curs.getNom());
                    txtCliCursPreu.setText(Integer.toString(curs.getPreu_hora()));
                    txtCliCursNivell.setText(curs.getNivell());
                    
                }
                
            }
        });
        return vb2;
    }
    
    private Pane cursosIndividuals() throws Exception{
        Connexio con = new Connexio();
        
        VBox vb3 = new VBox();
        TableView<CursIndividual> tblCursos = new TableView<>();
        TableColumn<CursIndividual, String> colID = new TableColumn<>("ID");
        TableColumn<CursIndividual, String> colNom = new TableColumn<>("Nom");
        TableColumn<CursIndividual, String> colPreu = new TableColumn<>("Preu hora");
        colID.setCellValueFactory(new PropertyValueFactory<>("ID"));
        colNom.setCellValueFactory(new PropertyValueFactory<>("nom"));
        colPreu.setCellValueFactory(new PropertyValueFactory<>("preu_hora"));
        
        tblCursos.getColumns().addAll(colID,colNom,colPreu);
        tblCursos.getItems().addAll(con.getCursIndList());
        
        
       int savedValue = Integer.parseInt(txtCliCurshores.getText());
       vb3.getChildren().add(tblCursos);
       
       tblCursos.getSelectionModel().selectedItemProperty().addListener(new ChangeListener() {
            @Override
            public void changed(ObservableValue observable, Object oldValue, Object newValue) {
                CursIndividual curs = (CursIndividual) newValue;
                
                if (curs != null){
                    txtCliCursNivell.clear();
                    txtCliCursAfor.clear();
                    lblNivell.setVisible(false);
                    txtCliCursNivell.setVisible(false);
                    lblAfor.setVisible(false);
                    txtCliCursAfor.setVisible(false);
                    lblpreuh.setVisible(true);
                    txtCliCursPreuh.setVisible(true);
                    lblhores.setVisible(true);
                    txtCliCurshores.setVisible(true);
                    lblPreu.setVisible(true);
                    txtCliCursPreu.setVisible(true);
                    lblPreu2.setVisible(false);
                    txtCliCursPreu2.setVisible(false);
                    i7= curs.getPreu_hora();
                    txtCliCursID.setText(Integer.toString(curs.getID()));
                    txtCliCursNom.setText(curs.getNom());
                    txtCliCursPreu.setText(Integer.toString(curs.getPreu_hora()));
                    txtCliCursPreuh.setText(Integer.toString(curs.getPreu_hora()));
                    
                }
                
            }
        });
 txtCliCurshores.textProperty().addListener((observable, oldValue, newValue) -> {
            if(txtCliCursPreuh.getText().isEmpty()){
                
            }else{
            int i = Integer.parseInt(txtCliCursPreuh.getText());
            
            if(newValue.isEmpty()){
                txtCliCursPreu.setText(Integer.toString(i7));
                System.out.println("");
            }else{
            int i2 = Integer.parseInt(newValue);
            if(i2==1){
            i3=100;
            }
            else if(i2==2){
            i3=20;
            }else if(i2==3 || i2==4 || i2==5){
             i3=30;
            }else if(i2==6){
             i3=50;
            }else if(i2>6){
             i2=6;
             txtCliCurshores.setText("6");
            }
                System.out.println(i3);
             int dis = (i*i2*i3)/100;
            txtCliCursPreu.setText(Integer.toString(i*i2-dis));}
        }});
       
        return vb3;
    }
    
    private Pane partEsquerra() throws Exception{
        Connexio con = new Connexio();
        VBox vLateral = new VBox(); 
        Label lblClient = new Label ("CLIENT");
        lblClient.setFont(new Font(50));
        lblClient.setTextFill(Color.web("#ffffff"));
        ImageView logo2 = new ImageView ("https://img.icons8.com/color/344/user-skin-type-7.png");
        logo2.setFitHeight(100);
        logo2.setFitWidth(100);
        logo2.setTranslateY(-500);
        logo2.setTranslateX(-110);
        vLateral.setAlignment(Pos.CENTER);
        
        TableView<Client> tblClients = new TableView<>();
        TableColumn<Client, String> colDni = new TableColumn<>("DNI");
        TableColumn<Client, String> colNom = new TableColumn<>("Nom");
        TableColumn<Client, String> colCognom = new TableColumn<>("Cognom");
        TableColumn<Client, String> colCognom2 = new TableColumn<>("Cognom2");
        TableColumn<Client, String> colfamilianum2 = new TableColumn<>("FamiliaNum");
        tblClients.getColumns().addAll(colDni,colNom,colCognom, colCognom2, colfamilianum2);
        
        colDni.setCellValueFactory(new PropertyValueFactory<>("dni"));
        colNom.setCellValueFactory(new PropertyValueFactory<>("nom"));
        colCognom.setCellValueFactory(new PropertyValueFactory<>("cognom"));
        colCognom2.setCellValueFactory(new PropertyValueFactory<>("cognom2"));
        colfamilianum2.setCellValueFactory(new PropertyValueFactory<>("familianum"));
        

        
        
        
        
        
        
        tblClients.getItems().addAll(con.getPersonList());
                
        vLateral.getChildren().addAll(lblClient,tblClients,logo2);
        
        
        tblClients.getSelectionModel().selectedItemProperty().addListener(new ChangeListener() {
            @Override
            public void changed(ObservableValue observable, Object oldValue, Object newValue) {
                Client client = (Client) newValue;
                
                if (client != null){
                    txtClientNom.setText(client.getNom());
                    txtCliDni.setText(client.getDni());
                    txtCliCognom.setText(client.getCognom());
                    txtCliCognom2.setText(client.getCognom2());
                    if(client.getFamilianum()==null){
                        
                    }else{
                    txtfamilianum.setText(client.getFamilianum());}
                }
                
            }
        });
        
        
        return vLateral; 
    } 
    
    
}

