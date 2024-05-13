package paketak.admin.kontrolatzaileak;

import javafx.fxml.FXML;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;

public class loginKontrolatzailea {

    @FXML
    private TextField erabiltzaileaText;
    @FXML
    private PasswordField pasahitzaText;

    public void hasiSaioa() {
        if (erabiltzaileaText.getText().equals("admin") && pasahitzaText.getText().equals("admin")) {
            System.out.println("Saioa hasi da");
        } else {
            System.out.println("Erabiltzaile edo pasahitza okerra");
        }
    }
}
