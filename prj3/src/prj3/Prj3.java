/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prj3;
import javafx.animation.TranslateTransition;
import javafx.application.Application;
import static javafx.application.Application.launch;
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
import javafx.scene.layout.VBox;
import javafx.scene.paint.Color;
import javafx.scene.text.Font;
import javafx.stage.Stage;
import javafx.util.Duration;

public class Prj3 extends Application{
    TextField txtCliNom;
    TextField txtCliDni;
    TextField txtCliCognom;
    TextField txtCliCognom2;
    TextField txtCliCursID;
    TextField txtCliCursNom;
    TextField txtCliCursPreu;
    TextField txtCliCursNivell;
    
     public static void main (String[] args){
        launch();
    }


    @Override
    public void start(Stage escenari) throws Exception {
        escenari.getIcons().add(new Image("Imatges/logo.png"));
        
        escenari.setTitle("AVALANCHA INC");
        BorderPane bp = new BorderPane();
       
        bp.setTop(partSuperior());
        bp.setStyle("-fx-background-color: #7ca4ff;");
        
        Pane inferior = partInferior();
        bp.setBottom(inferior);
        BorderPane.setMargin(inferior,new Insets(20,20,20,20));
       
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
        
        
        Label lblCognoms = new Label ("Cognoms");
        lblCognoms.setTextFill(Color.web("#ffffff"));
        lblCognoms.setTranslateY(20);
        lblCognoms.setEffect(shadow);
        
        Label lblID = new Label ("ID");
        lblID.setTextFill(Color.web("#ffffff"));
        lblID.setTranslateY(30);
        lblID.setEffect(shadow);
        
        Label lblCursNom = new Label ("Nom");
        lblCursNom.setTextFill(Color.web("#ffffff"));
        lblCursNom.setTranslateY(40);
        lblCursNom.setEffect(shadow);
        
        Label lblPreu = new Label ("Preu hora");
        lblPreu.setTextFill(Color.web("#ffffff"));
        lblPreu.setTranslateY(50);
        lblPreu.setEffect(shadow);
        
        Label lblNivell = new Label ("Nivell");
        lblNivell.setTextFill(Color.web("#ffffff"));
        lblNivell.setTranslateY(60);
        lblNivell.setEffect(shadow);
       
        
        txtCliDni = new TextField();
        DropShadow shadow1 = new DropShadow();
        txtCliDni.setEffect(shadow1);
        
        txtCliNom = new TextField();
        txtCliNom.setTranslateY(10);
        DropShadow shadow2 = new DropShadow();
        txtCliNom.setEffect(shadow2);
        
        txtCliCognom = new TextField();
        txtCliCognom.setTranslateY(20);
        DropShadow shadow3 = new DropShadow();
        txtCliCognom.setEffect(shadow3);
        
        txtCliCursID = new TextField();
        txtCliCursID.setTranslateY(30);
        DropShadow shadow4 = new DropShadow();
        txtCliCursID.setEffect(shadow4);
        
        txtCliCursNom = new TextField();
        txtCliCursNom.setTranslateY(40);
        DropShadow shadow5 = new DropShadow();
        txtCliCursNom.setEffect(shadow5);
        
        txtCliCursPreu = new TextField();
        txtCliCursPreu.setTranslateY(50);
        DropShadow shadow6 = new DropShadow();
        txtCliCursPreu.setEffect(shadow6);
        
        txtCliCursNivell = new TextField();
        txtCliCursNivell.setTranslateY(60);
        DropShadow shadow7 = new DropShadow();
        txtCliCursNivell.setEffect(shadow7);
        
        gp.setAlignment(Pos.CENTER);
        
        gp.add(lblDni, 0, 0);
        gp.add(txtCliDni, 1, 0);
        gp.add(lblNom, 0, 1);
        gp.add(txtCliNom, 1, 1);
        gp.add(lblCognoms, 0, 2);
        gp.add(txtCliCognom, 1, 2);
        gp.add(lblID, 0, 3);
        gp.add(txtCliCursID, 1, 3);
        gp.add(lblCursNom, 0, 4);
        gp.add(txtCliCursNom, 1, 4);
        gp.add(lblPreu, 0, 5);
        gp.add(txtCliCursPreu, 1, 5);
        gp.add(lblNivell, 0, 6);
        gp.add(txtCliCursNivell, 1, 6);
       
        return gp;
        
    }
    
    private Pane partSuperior(){
        HBox hb = new HBox();
        Label lblEsky = new Label("ESKYDAM");
        lblEsky.setFont(new Font(40));
        lblEsky.setTextFill(Color.web("#0e0edb"));
        DropShadow shadow = new DropShadow();
        lblEsky.setEffect(shadow);
        hb.setAlignment(Pos.CENTER);
        ImageView logo = new ImageView ("Imatges/logo.png");
        logo.setFitHeight(80);
        logo.setFitWidth(80);
        
        
        hb.getChildren().addAll(lblEsky,logo);
        return hb;
        
    }
    
    private Pane partInferior(){
        Button btn1 = new Button("Eliminar");
        btn1.setTextFill(Color.web("#ffffff"));
        Image img = new Image("Imatges/eliminar.png");
        ImageView view = new ImageView(img);
        view.setFitHeight(30);
        view.setFitWidth(30);
        btn1.setGraphic(view);
        btn1.setStyle("-fx-background-color:#0e0edb;");
        Duration duration = Duration.millis(1250);
        TranslateTransition transition = new TranslateTransition(duration, btn1);
        transition.setByY(100);
        transition.setAutoReverse(true);
        transition.setCycleCount(2);
        transition.play();
        btn1.setOnAction(event ->{
            txtCliDni.clear();
            txtCliNom.clear();
            txtCliCognom.clear();
            txtCliCursID.clear();
            txtCliCursNom.clear();
            txtCliCursPreu.clear();
            txtCliCursNivell.clear();
        });
        
        Button btn2 = new Button("Llogar");
        btn2.setTextFill(Color.web("#ffffff"));
        btn2.setStyle("-fx-background-color:#0e0edb;");
        btn2.setTranslateX(20);
        Image img1 = new Image("Imatges/llogar.png");
        ImageView view1 = new ImageView(img1);
        view1.setFitHeight(30);
        view1.setFitWidth(30);
        btn2.setGraphic(view1);
        Duration duration2 = Duration.millis(1500);
        TranslateTransition transition2 = new TranslateTransition(duration2, btn2);
        transition2.setByY(100);
        transition2.setAutoReverse(true);
        transition2.setCycleCount(2);
        transition2.play();
        btn2.setOnAction(e -> llogar());
                
        
        Button btn3 = new Button("Tancar");
        btn3.setTextFill(Color.web("#ffffff"));
        btn3.setStyle("-fx-background-color:#0e0edb;");
        btn3.setTranslateX(40);
        Image img3 = new Image("Imatges/tancar.png");
        ImageView view3 = new ImageView(img3);
        view3.setFitHeight(30);
        view3.setFitWidth(30);
        btn3.setGraphic(view3);
        Duration duration3 = Duration.millis(1750);
        TranslateTransition transition3 = new TranslateTransition(duration3, btn3);
        transition3.setByY(100);
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
    
    private void llogar(){
        
        if (txtCliDni.getText().isEmpty()){
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setHeaderText(null);
            alert.setTitle("Error");
            alert.setContentText("Has de seleccionar un client");
            alert.showAndWait();
        } else if (txtCliCursID.getText().isEmpty()){
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setHeaderText(null);
            alert.setTitle("Error");
            alert.setContentText("Has de seleccionar un curs");
            alert.showAndWait();
        }else {
            Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
             alert.setHeaderText(null);
             alert.setTitle("Info");
             alert.setContentText("Curs llogat amb exit");
             alert.showAndWait();
        } 
            
    }
    
    private Pane partDreta() throws Exception{
        VBox vb = new VBox();
        Label lblDreta = new Label("Cursos");
        lblDreta.setFont(new Font(30));
        lblDreta.setTextFill(Color.web("#0e0edb"));

        vb.setAlignment(Pos.CENTER);
        vb.setSpacing(15);
        
        TabPane tp = new TabPane();
        Tab tab1 = new Tab("Col·lectius",cursosColectius());
        Tab tab2 = new Tab("Competició", cursosCompeticio());
        Tab tab3 = new Tab("Individuals", cursosIndividuals());
        tp.getTabs().add(tab1);
        tp.getTabs().add(tab2);
        tp.getTabs().add(tab3);
        
        ImageView logo3 = new ImageView ("Imatges/esqui.png");
        logo3.setFitHeight(150);
        logo3.setFitWidth(150);
        logo3.setTranslateY(40);
                
        vb.getChildren().addAll(lblDreta,tp,logo3);
        return vb;
    }
    
    private Pane cursosColectius() throws Exception{
        Connexio con = new Connexio("com.mysql.cj.jdbc.Driver", "jdbc:mysql://localhost:3306/esqui", "root", "1234");
        
        VBox vb = new VBox();
        TableView<CursColectiu> tblCursos = new TableView<>();
        TableColumn<CursColectiu, String> colID = new TableColumn<>("ID");
        TableColumn<CursColectiu, String> colNom = new TableColumn<>("Nom");
        TableColumn<CursColectiu, String> colPreu = new TableColumn<>("Preu hora");
        
        colID.setCellValueFactory(new PropertyValueFactory<>("ID"));
        colNom.setCellValueFactory(new PropertyValueFactory<>("nom"));
        colPreu.setCellValueFactory(new PropertyValueFactory<>("preu_hora")); 

        tblCursos.getColumns().addAll(colID,colNom,colPreu);
        
        
        tblCursos.getItems().addAll(con.getCursColList());
        
        

        
       vb.getChildren().add(tblCursos);
       
       tblCursos.getSelectionModel().selectedItemProperty().addListener(new ChangeListener() {
           @Override
            public void changed(ObservableValue observable, Object oldValue, Object newValue) {
                CursColectiu curs = (CursColectiu) newValue;
                
                if (curs != null){
                    txtCliCursID.setText(Integer.toString(curs.getID()));
                    txtCliCursNom.setText(curs.getNom());
                    txtCliCursPreu.setText(Integer.toString(curs.getPreu_hora()));
                }
                
            }
        });
        return vb;
    }
    
    private Pane cursosCompeticio()throws Exception{
        Connexio con = new Connexio("com.mysql.cj.jdbc.Driver", "jdbc:mysql://localhost:3306/esqui", "root", "1234");
        
        VBox vb = new VBox();
        TableView<CursCompeticio> tblCursos = new TableView<>();
        TableColumn<CursCompeticio, String> colID = new TableColumn<>("ID");
        TableColumn<CursCompeticio, String> colNom = new TableColumn<>("Nom");
        TableColumn<CursCompeticio, String> colPreu = new TableColumn<>("Preu hora");
        TableColumn<CursCompeticio, String> colNivell = new TableColumn<>("Nivell");

        colID.setCellValueFactory(new PropertyValueFactory<>("ID"));
        colNom.setCellValueFactory(new PropertyValueFactory<>("nom"));
        colPreu.setCellValueFactory(new PropertyValueFactory<>("preu_hora"));
        colNivell.setCellValueFactory(new PropertyValueFactory<>("nivell"));

        
        tblCursos.getColumns().addAll(colID,colNom,colPreu,colNivell);
        
        tblCursos.getItems().addAll(con.getCursComList());
        
        

        
       vb.getChildren().add(tblCursos);
       
       tblCursos.getSelectionModel().selectedItemProperty().addListener(new ChangeListener() {
            @Override
            public void changed(ObservableValue observable, Object oldValue, Object newValue) {
                CursCompeticio curs = (CursCompeticio) newValue;
                
                if (curs != null){
                    txtCliCursID.setText(Integer.toString(curs.getID()));
                    txtCliCursNom.setText(curs.getNom());
                    txtCliCursPreu.setText(Integer.toString(curs.getPreu_hora()));
                    txtCliCursNivell.setText(curs.getNivell());
                    
                }
                
            }
        });
        return vb;
    }
    
    private Pane cursosIndividuals() throws Exception{
        Connexio con = new Connexio("com.mysql.cj.jdbc.Driver", "jdbc:mysql://localhost:3306/esqui", "root", "1234");
        
        VBox vb = new VBox();
        TableView<CursIndividual> tblCursos = new TableView<>();
        TableColumn<CursIndividual, String> colID = new TableColumn<>("ID");
        TableColumn<CursIndividual, String> colNom = new TableColumn<>("Nom");
        TableColumn<CursIndividual, String> colPreu = new TableColumn<>("Preu hora");
        colID.setCellValueFactory(new PropertyValueFactory<>("ID"));
        colNom.setCellValueFactory(new PropertyValueFactory<>("nom"));
        colPreu.setCellValueFactory(new PropertyValueFactory<>("preu_hora"));
        
        tblCursos.getColumns().addAll(colID,colNom,colPreu);
        
        tblCursos.getItems().addAll(con.getCursIndList());
        
        

        
       vb.getChildren().add(tblCursos);
       
       tblCursos.getSelectionModel().selectedItemProperty().addListener(new ChangeListener() {
            @Override
            public void changed(ObservableValue observable, Object oldValue, Object newValue) {
                CursIndividual curs = (CursIndividual) newValue;
                
                if (curs != null){
                    txtCliCursID.setText(Integer.toString(curs.getID()));
                    txtCliCursNom.setText(curs.getNom());
                    txtCliCursPreu.setText(Integer.toString(curs.getPreu_hora()));
                    
                }
                
            }
        });
        return vb;
    }
    
    private Pane partEsquerra() throws Exception{
        Connexio con = new Connexio("com.mysql.cj.jdbc.Driver", "jdbc:mysql://localhost:3306/esqui", "root", "1234");
        VBox vLateral = new VBox(); 
        Label lblClient = new Label ("Clients");
        lblClient.setFont(new Font(30));
        lblClient.setTextFill(Color.web("#0e0edb"));
        vLateral.setAlignment(Pos.CENTER);
        
        TableView<Client> tblClients = new TableView<>();
        TableColumn<Client, String> colDni = new TableColumn<>("DNI");
        TableColumn<Client, String> colNom = new TableColumn<>("Nom");
        TableColumn<Client, String> colCognoms = new TableColumn<>("Cognoms");
        tblClients.getColumns().addAll(colDni,colNom,colCognoms);
        
        colDni.setCellValueFactory(new PropertyValueFactory<>("dni"));
        colNom.setCellValueFactory(new PropertyValueFactory<>("nom"));
        colCognoms.setCellValueFactory(new PropertyValueFactory<>("cognoms"));
        

        
        ImageView logo2 = new ImageView ("Imatges/User.png");
        logo2.setFitHeight(100);
        logo2.setFitWidth(100);
        logo2.setTranslateY(20);
        
        
        
        tblClients.getItems().addAll(con.getPersonList());
                
        vLateral.getChildren().addAll(lblClient,tblClients,logo2);
        
        
        tblClients.getSelectionModel().selectedItemProperty().addListener(new ChangeListener() {
            @Override
            public void changed(ObservableValue observable, Object oldValue, Object newValue) {
                Client client = (Client) newValue;
                
                if (client != null){
                    txtCliNom.setText(client.getNom());
                    txtCliDni.setText(client.getDni());
                    txtCliCognom.setText(client.getCognom());
                    txtCliCognom2.setText(client.getCognom2());
                }
                
            }
        });
        
        
        return vLateral; 
    } 
}