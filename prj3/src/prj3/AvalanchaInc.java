package prj3;

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
    TextField txtCliCursPreu;
    TextField txtCliCursNivell;
    
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
        
        Label lblPreu = new Label ("Preu hora");
        lblPreu.setTextFill(Color.web("#ffffff"));
        lblPreu.setTranslateY(60);
        lblPreu.setEffect(shadow);
        
        Label lblNivell = new Label ("Nivell");
        lblNivell.setTextFill(Color.web("#ffffff"));
        lblNivell.setTranslateY(70);
        lblNivell.setEffect(shadow);
       
        
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
        
        txtCliCursPreu = new TextField();
        txtCliCursPreu.setTranslateY(60);
        DropShadow shadow7 = new DropShadow();
        txtCliCursPreu.setEffect(shadow7);
        
        txtCliCursNivell = new TextField();
        txtCliCursNivell.setTranslateY(70);
        DropShadow shadow8 = new DropShadow();
        txtCliCursNivell.setEffect(shadow8);
        
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
       
        return gp;
        
    }
    
    private Pane partSuperior(){
        HBox hb = new HBox();
        Label lblEsky = new Label("AVALANCHA INC");
        lblEsky.setFont(new Font(80));
        lblEsky.setTextFill(Color.web("#ffffff"));
        DropShadow shadow = new DropShadow();
        lblEsky.setEffect(shadow);
        hb.setAlignment(Pos.CENTER);
        ImageView logo = new ImageView ("https://img.icons8.com/external-filled-outline-lima-studio/344/external-avalanche-winter-filled-outline-lima-studio.png");
        logo.setFitHeight(100);
        logo.setFitWidth(100);
        
        
        hb.getChildren().addAll(lblEsky,logo);
        return hb;
        
    }
    
    private Pane partInferior(){
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
            txtCliCursNivell.clear();
            
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
        btn2.setOnAction(e -> llogar_curs());
                
        
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
    
    private void llogar_curs(){
        
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
        }else {
            Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
             alert.setHeaderText(null);
             alert.setTitle("Info");
             alert.setContentText("S'ha llogat un curs amb Èxit");
             alert.showAndWait();
        } 
            
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
        Connexio con = new Connexio("com.mysql.cj.jdbc.Driver", "jdbc:mysql://localhost:3306/esqui", "root", "");
        
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
        Connexio con = new Connexio("com.mysql.cj.jdbc.Driver", "jdbc:mysql://localhost:3306/esqui", "root", "");
        
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
        Connexio con = new Connexio("com.mysql.cj.jdbc.Driver", "jdbc:mysql://localhost:3306/esqui", "root", "");
        
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
        Connexio con = new Connexio("com.mysql.cj.jdbc.Driver", "jdbc:mysql://localhost:3306/esqui", "root", "");
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
        tblClients.getColumns().addAll(colDni,colNom,colCognom, colCognom2);
        
        colDni.setCellValueFactory(new PropertyValueFactory<>("dni"));
        colNom.setCellValueFactory(new PropertyValueFactory<>("nom"));
        colCognom.setCellValueFactory(new PropertyValueFactory<>("cognom"));
        colCognom2.setCellValueFactory(new PropertyValueFactory<>("cognom2"));
        

        
        
        
        
        
        
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
                }
                
            }
        });
        
        
        return vLateral; 
    } 
}
