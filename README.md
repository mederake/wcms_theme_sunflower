# Sunflower Theme von Bündnis 90/Die Grünen für Wonder CMS

## Installation
Nach dem Login in Wonder CMS in den Einstellungen unter "Themes" diese URL hinzufügen:    
https://raw.githubusercontent.com/mederake/wcms_theme_sunflower/main/wcms-modules.json

Danach steht das Theme "Sunflower" in der Auswahl zur Verfügung und kann aktiviert werden.


## Untertitel

Der Untertitel wird nicht automatisch erzeugt und darum nicht auf der Seite angezeigt.

Um einen Untertitel (zusätzlich zum Seitentitel) hinzuzufügen, muss er einmal manuell in der Datenbank-Datei eingetragen werden.
Dafür im Bereich "blocks" diese Zeilen hinzufügen:

    "pageSubtitle": {
        "content": "Seiten-Untertiel"
    }

Der Untertitel kann danach wie die Inhalte direkt auf der Seite editiert werden.
