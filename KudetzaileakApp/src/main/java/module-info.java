module paketak.admin.kudetzaileakapp {
    requires javafx.controls;
    requires javafx.fxml;

    requires org.controlsfx.controls;

    opens paketak.admin.kudetzaileakapp to javafx.fxml;
    exports paketak.admin.kudetzaileakapp;
}