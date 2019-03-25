<?php
    session_start();

    include('includes/db.php');
    include('includes/loginsystem.php');
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <title>it-{dschungel} - Impressum und Datenschutz</title>

            <!-- Stylesheets -->
            <link rel="stylesheet" href="https://cdn.materialdesignicons.com/3.4.93/css/materialdesignicons.min.css" />
            <link rel="stylesheet" href="https://indestructibletype.com/fonts/Jost.css" type="text/css" charset="utf-8" />
            <link rel="stylesheet" href="assets/css/reset.css" />
            <link rel="stylesheet" href="assets/css/common.css" />
            <link rel="stylesheet" href="assets/css/frontpage.css" />
            <link rel="stylesheet" href="assets/css/legal.css" />
        </head>
        <body>
            <header>
                <div class="grid-wrapper grid-header">
                    <a href="index.php" tabindex="-1"><img src="assets/img/logo_white.svg" class="logo" alt="it-{dschungel} Logo" /></a>

                    <nav class="user-area" role="navigation">
                        <?php
                        if(isLoggedIn()) {
                            ?>
                            <a href="userarea.php?p=myCourses" class="button"><i class="mdi mdi-arrow-left"></i> ZURÜCK</a>
                            <?php
                        } else {
                            ?>
                            <a href="index.php" class="button"><i class="mdi mdi-arrow-left"></i> ZURÜCK</a>
                            <?php
                        }
                        ?>
                    </nav>
                </div>
            </header>

            <main role="main">
                <section class="grid-wrapper grid-legal">
                    <h1>Impressum</h1>
                    <div class="box">
                        <!-- Impressum von e-recht24.de, Formatierung 1-1 übernommen -->
                        <strong>Angaben gem&auml;&szlig; &sect; 5 TMG</strong>
                        <p>IT-Dschungel GmbH<br />
                            Entwicklungsgasse 10<br />
                            45123 Gelsenkirchen</p>

                        <p><strong>Vertreten durch die Gesch&auml;ftsf&uuml;hrer:</strong><br />
                            Dr. Harry Mustermann<br />
                            Luise Beispiel</p>

                        <h2>Kontakt</h2>
                        <p>Telefon: +49 (0) 209 222222<br />
                            E-Mail: info@it-dschungel.de</p>

                        <h2>Umsatzsteuer-ID</h2>
                        <p>Umsatzsteuer-Identifikationsnummer gem&auml;&szlig; &sect;27 a Umsatzsteuergesetz:<br />
                            DE 999 999 999</p>

                        <h2>Streitschlichtung</h2>
                        <p>Die Europ&auml;ische Kommission stellt eine Plattform zur Online-Streitbeilegung (OS) bereit: <a href="https://ec.europa.eu/consumers/odr" target="_blank" rel="noopener">https://ec.europa.eu/consumers/odr</a>.<br /> Unsere E-Mail-Adresse finden Sie oben im Impressum.</p>

                        <p>Wir sind nicht bereit oder verpflichtet, an Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle teilzunehmen.</p>

                        <h3>Haftung f&uuml;r Inhalte</h3> <p>Als Diensteanbieter sind wir gem&auml;&szlig; &sect; 7 Abs.1 TMG f&uuml;r eigene Inhalte auf diesen Seiten nach den allgemeinen Gesetzen verantwortlich. Nach &sect;&sect; 8 bis 10 TMG sind wir als Diensteanbieter jedoch nicht verpflichtet, &uuml;bermittelte oder gespeicherte fremde Informationen zu &uuml;berwachen oder nach Umst&auml;nden zu forschen, die auf eine rechtswidrige T&auml;tigkeit hinweisen.</p> <p>Verpflichtungen zur Entfernung oder Sperrung der Nutzung von Informationen nach den allgemeinen Gesetzen bleiben hiervon unber&uuml;hrt. Eine diesbez&uuml;gliche Haftung ist jedoch erst ab dem Zeitpunkt der Kenntnis einer konkreten Rechtsverletzung m&ouml;glich. Bei Bekanntwerden von entsprechenden Rechtsverletzungen werden wir diese Inhalte umgehend entfernen.</p> <h3>Haftung f&uuml;r Links</h3> <p>Unser Angebot enth&auml;lt Links zu externen Websites Dritter, auf deren Inhalte wir keinen Einfluss haben. Deshalb k&ouml;nnen wir f&uuml;r diese fremden Inhalte auch keine Gew&auml;hr &uuml;bernehmen. F&uuml;r die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der Seiten verantwortlich. Die verlinkten Seiten wurden zum Zeitpunkt der Verlinkung auf m&ouml;gliche Rechtsverst&ouml;&szlig;e &uuml;berpr&uuml;ft. Rechtswidrige Inhalte waren zum Zeitpunkt der Verlinkung nicht erkennbar.</p> <p>Eine permanente inhaltliche Kontrolle der verlinkten Seiten ist jedoch ohne konkrete Anhaltspunkte einer Rechtsverletzung nicht zumutbar. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Links umgehend entfernen.</p> <h3>Urheberrecht</h3> <p>Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen Urheberrecht. Die Vervielf&auml;ltigung, Bearbeitung, Verbreitung und jede Art der Verwertung au&szlig;erhalb der Grenzen des Urheberrechtes bed&uuml;rfen der schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers. Downloads und Kopien dieser Seite sind nur f&uuml;r den privaten, nicht kommerziellen Gebrauch gestattet.</p> <p>Soweit die Inhalte auf dieser Seite nicht vom Betreiber erstellt wurden, werden die Urheberrechte Dritter beachtet. Insbesondere werden Inhalte Dritter als solche gekennzeichnet. Sollten Sie trotzdem auf eine Urheberrechtsverletzung aufmerksam werden, bitten wir um einen entsprechenden Hinweis. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Inhalte umgehend entfernen.</p>

                        <p>Quelle: <a href="https://www.e-recht24.de">e-recht24.de</a></p>
                    </div>
                </section>

                <section class="grid-wrapper grid-legal">
                    <h1>Datenschutzerklärung</h1>
                    <div class="box">
                        <!-- Generiert durch datenschutz-generator.de, Formatierung 1-1 übernommen -->
                        <h3 id="dsg-general-intro"></h3>
                        <p>Diese Datenschutzerklärung klärt Sie über die Art, den Umfang und Zweck der Verarbeitung von personenbezogenen Daten (nachfolgend kurz „Daten“) im Rahmen der Erbringung unserer Leistungen sowie innerhalb unseres Onlineangebotes und der mit ihm verbundenen Webseiten, Funktionen und Inhalte sowie externen Onlinepräsenzen, wie z.B. unser Social Media Profile auf (nachfolgend gemeinsam bezeichnet als „Onlineangebot“). Im Hinblick auf die verwendeten Begrifflichkeiten, wie z.B. „Verarbeitung“ oder „Verantwortlicher“ verweisen wir auf die Definitionen im Art. 4 der Datenschutzgrundverordnung (DSGVO).</p>
                        <h3 id="dsg-general-controller">Verantwortlicher</h3>
                        <p><span class="tsmcontroller">IT-Dschungel<br>
                            Entwicklungsgasse 10<br>
                            45123 Gelsenkirchen<br>
                            <br>
                            Telefon: 0209-222222<br>
                            E-Mail: info@it-dschungel.de<br>
                            Web: www.it-dschungel.de</span></p>
                        <h3 id="dsg-general-datatype">Arten der verarbeiteten Daten</h3>
                        <p>-	Bestandsdaten (z.B., Personen-Stammdaten, Namen oder Adressen).<br>
                            -	Kontaktdaten (z.B., E-Mail, Telefonnummern).<br>
                            -	Inhaltsdaten (z.B., Texteingaben, Fotografien, Videos).<br>
                            -	Nutzungsdaten (z.B., besuchte Webseiten, Interesse an Inhalten, Zugriffszeiten).<br>
                            -	Meta-/Kommunikationsdaten (z.B., Geräte-Informationen, IP-Adressen).</p>
                        <h3 id="dsg-general-datasubjects">Kategorien betroffener Personen</h3>
                        <p>Besucher und Nutzer des Onlineangebotes (Nachfolgend bezeichnen wir die betroffenen Personen zusammenfassend auch als „Nutzer“).</p>
                        <h3 id="dsg-general-purpose">Zweck der Verarbeitung</h3>
                        <p>-	Zurverfügungstellung des Onlineangebotes, seiner Funktionen und  Inhalte.<br>
                            -	Beantwortung von Kontaktanfragen und Kommunikation mit Nutzern.<br>
                            -	Sicherheitsmaßnahmen.<br>
                            -	Reichweitenmessung/Marketing<br>
                            <span class="tsmcom"></span></p>
                        <h3 id="dsg-general-terms">Verwendete Begrifflichkeiten </h3>
                        <p>„Personenbezogene Daten“ sind alle Informationen, die sich auf eine identifizierte oder identifizierbare natürliche Person (im Folgenden „betroffene Person“) beziehen; als identifizierbar wird eine natürliche Person angesehen, die direkt oder indirekt, insbesondere mittels Zuordnung zu einer Kennung wie einem Namen, zu einer Kennnummer, zu Standortdaten, zu einer Online-Kennung (z.B. Cookie) oder zu einem oder mehreren besonderen Merkmalen identifiziert werden kann, die Ausdruck der physischen, physiologischen, genetischen, psychischen, wirtschaftlichen, kulturellen oder sozialen Identität dieser natürlichen Person sind.<br>
                            <br>
                            „Verarbeitung“ ist jeder mit oder ohne Hilfe automatisierter Verfahren ausgeführte Vorgang oder jede solche Vorgangsreihe im Zusammenhang mit personenbezogenen Daten. Der Begriff reicht weit und umfasst praktisch jeden Umgang mit Daten.<br>
                            <br>
                            „Pseudonymisierung“ die Verarbeitung personenbezogener Daten in einer Weise, dass die personenbezogenen Daten ohne Hinzuziehung zusätzlicher Informationen nicht mehr einer spezifischen betroffenen Person zugeordnet werden können, sofern diese zusätzlichen Informationen gesondert aufbewahrt werden und technischen und organisatorischen Maßnahmen unterliegen, die gewährleisten, dass die personenbezogenen Daten nicht einer identifizierten oder identifizierbaren natürlichen Person zugewiesen werden.<br>
                            <br>
                            „Profiling“ jede Art der automatisierten Verarbeitung personenbezogener Daten, die darin besteht, dass diese personenbezogenen Daten verwendet werden, um bestimmte persönliche Aspekte, die sich auf eine natürliche Person beziehen, zu bewerten, insbesondere um Aspekte bezüglich Arbeitsleistung, wirtschaftliche Lage, Gesundheit, persönliche Vorlieben, Interessen, Zuverlässigkeit, Verhalten, Aufenthaltsort oder Ortswechsel dieser natürlichen Person zu analysieren oder vorherzusagen.<br>
                            <br>
                            Als „Verantwortlicher“ wird die natürliche oder juristische Person, Behörde, Einrichtung oder andere Stelle, die allein oder gemeinsam mit anderen über die Zwecke und Mittel der Verarbeitung von personenbezogenen Daten entscheidet, bezeichnet.<br>
                            <br>
                            „Auftragsverarbeiter“ eine natürliche oder juristische Person, Behörde, Einrichtung oder andere Stelle, die personenbezogene Daten im Auftrag des Verantwortlichen verarbeitet.<br>
                        </p>
                        <h3 id="dsg-general-legalbasis">Maßgebliche Rechtsgrundlagen</h3>
                        <p>Nach Maßgabe des Art. 13 DSGVO teilen wir Ihnen die Rechtsgrundlagen unserer Datenverarbeitungen mit.  Für Nutzer aus dem Geltungsbereich der Datenschutzgrundverordnung (DSGVO), d.h. der EU und des EWG gilt, sofern die Rechtsgrundlage in der Datenschutzerklärung nicht genannt wird, Folgendes: <br>
                            Die Rechtsgrundlage für die Einholung von Einwilligungen ist Art. 6 Abs. 1 lit. a und Art. 7 DSGVO;<br>
                            Die Rechtsgrundlage für die Verarbeitung zur Erfüllung unserer Leistungen und Durchführung vertraglicher Maßnahmen sowie Beantwortung von Anfragen ist Art. 6 Abs. 1 lit. b DSGVO;<br>
                            Die Rechtsgrundlage für die Verarbeitung zur Erfüllung unserer rechtlichen Verpflichtungen ist Art. 6 Abs. 1 lit. c DSGVO;<br>
                            Für den Fall, dass lebenswichtige Interessen der betroffenen Person oder einer anderen natürlichen Person eine Verarbeitung personenbezogener Daten erforderlich machen, dient Art. 6 Abs. 1 lit. d DSGVO als Rechtsgrundlage.<br>
                            Die Rechtsgrundlage für die erforderliche Verarbeitung zur Wahrnehmung einer Aufgabe, die im öffentlichen Interesse liegt oder in Ausübung öffentlicher Gewalt erfolgt, die dem Verantwortlichen übertragen wurde ist Art. 6 Abs. 1 lit. e DSGVO. <br>
                            Die Rechtsgrundlage für die Verarbeitung zur Wahrung unserer berechtigten Interessen ist Art. 6 Abs. 1 lit. f DSGVO. <br>
                            Die Verarbeitung von Daten zu anderen Zwecken als denen, zu denen sie erhoben wurden, bestimmt sich nach den Vorgaben des Art 6 Abs. 4 DSGVO. <br>
                            Die Verarbeitung von besonderen Kategorien von Daten (entsprechend Art. 9 Abs. 1 DSGVO) bestimmt sich nach den Vorgaben des Art. 9 Abs. 2 DSGVO. <br>
                        </p>
                        <h3 id="dsg-general-securitymeasures">Sicherheitsmaßnahmen</h3>
                        <p>Wir treffen nach Maßgabe der gesetzlichen Vorgabenunter Berücksichtigung des Stands der Technik, der Implementierungskosten und der Art, des Umfangs, der Umstände und der Zwecke der Verarbeitung sowie der unterschiedlichen Eintrittswahrscheinlichkeit und Schwere des Risikos für die Rechte und Freiheiten natürlicher Personen, geeignete technische und organisatorische Maßnahmen, um ein dem Risiko angemessenes Schutzniveau zu gewährleisten.<br>
                            <br>
                            Zu den Maßnahmen gehören insbesondere die Sicherung der Vertraulichkeit, Integrität und Verfügbarkeit von Daten durch Kontrolle des physischen Zugangs zu den Daten, als auch des sie betreffenden Zugriffs, der Eingabe, Weitergabe, der Sicherung der Verfügbarkeit und ihrer Trennung. Des Weiteren haben wir Verfahren eingerichtet, die eine Wahrnehmung von Betroffenenrechten, Löschung von Daten und Reaktion auf Gefährdung der Daten gewährleisten. Ferner berücksichtigen wir den Schutz personenbezogener Daten bereits bei der Entwicklung, bzw. Auswahl von Hardware, Software sowie Verfahren, entsprechend dem Prinzip des Datenschutzes durch Technikgestaltung und durch datenschutzfreundliche Voreinstellungen.<br>
                        </p>
                        <h3 id="dsg-general-coprocessing">Zusammenarbeit mit Auftragsverarbeitern, gemeinsam Verantwortlichen und Dritten</h3>
                        <p>Sofern wir im Rahmen unserer Verarbeitung Daten gegenüber anderen Personen und Unternehmen (Auftragsverarbeitern, gemeinsam Verantwortlichen oder Dritten) offenbaren, sie an diese übermitteln oder ihnen sonst Zugriff auf die Daten gewähren, erfolgt dies nur auf Grundlage einer gesetzlichen Erlaubnis (z.B. wenn eine Übermittlung der Daten an Dritte, wie an Zahlungsdienstleister, zur Vertragserfüllung erforderlich ist), Nutzer eingewilligt haben, eine rechtliche Verpflichtung dies vorsieht oder auf Grundlage unserer berechtigten Interessen (z.B. beim Einsatz von Beauftragten, Webhostern, etc.). <br>
                            <br>
                            Sofern wir Daten anderen Unternehmen unserer Unternehmensgruppe offenbaren, übermitteln oder ihnen sonst den Zugriff gewähren, erfolgt dies insbesondere zu administrativen Zwecken als berechtigtes Interesse und darüberhinausgehend auf einer den gesetzlichen Vorgaben entsprechenden Grundlage. <br>
                        </p>
                        <h3 id="dsg-general-thirdparty">Übermittlungen in Drittländer</h3>
                        <p>Sofern wir Daten in einem Drittland (d.h. außerhalb der Europäischen Union (EU), des Europäischen Wirtschaftsraums (EWR) oder der Schweizer Eidgenossenschaft) verarbeiten oder dies im Rahmen der Inanspruchnahme von Diensten Dritter oder Offenlegung, bzw. Übermittlung von Daten an andere Personen oder Unternehmen geschieht, erfolgt dies nur, wenn es zur Erfüllung unserer (vor)vertraglichen Pflichten, auf Grundlage Ihrer Einwilligung, aufgrund einer rechtlichen Verpflichtung oder auf Grundlage unserer berechtigten Interessen geschieht. Vorbehaltlich ausdrücklicher Einwilligung oder vertraglich erforderlicher Übermittlung, verarbeiten oder lassen wir die Daten nur in Drittländern mit einem anerkannten Datenschutzniveau, zu denen die unter dem "Privacy-Shield" zertifizierten US-Verarbeiter gehören oder auf Grundlage besonderer Garantien, wie z.B. vertraglicher Verpflichtung durch sogenannte Standardschutzklauseln der EU-Kommission, dem Vorliegen von Zertifizierungen oder verbindlichen internen Datenschutzvorschriften verarbeiten (Art. 44 bis 49 DSGVO, <a href="https://ec.europa.eu/info/law/law-topic/data-protection/data-transfers-outside-eu_de" target="blank">Informationsseite der EU-Kommission</a>).</p><h3 id="dsg-general-rightssubject">Rechte der betroffenen Personen</h3><p>Sie haben das Recht, eine Bestätigung darüber zu verlangen, ob betreffende Daten verarbeitet werden und auf Auskunft über diese Daten sowie auf weitere Informationen und Kopie der Daten entsprechend den gesetzlichen Vorgaben.<br>
                            <br>
                            Sie haben entsprechend. den gesetzlichen Vorgaben das Recht, die Vervollständigung der Sie betreffenden Daten oder die Berichtigung der Sie betreffenden unrichtigen Daten zu verlangen.<br>
                            <br>
                            Sie haben nach Maßgabe der gesetzlichen Vorgaben das Recht zu verlangen, dass betreffende Daten unverzüglich gelöscht werden, bzw. alternativ nach Maßgabe der gesetzlichen Vorgaben eine Einschränkung der Verarbeitung der Daten zu verlangen.<br>
                            <br>
                            Sie haben das Recht zu verlangen, dass die Sie betreffenden Daten, die Sie uns bereitgestellt haben nach Maßgabe der gesetzlichen Vorgaben zu erhalten und deren Übermittlung an andere Verantwortliche zu fordern. <br>
                            <br>
                            Sie haben ferner nach Maßgabe der gesetzlichen Vorgaben das Recht, eine Beschwerde bei der zuständigen Aufsichtsbehörde einzureichen.<br>
                        </p>
                        <h3 id="dsg-general-revokeconsent">Widerrufsrecht</h3>
                        <p>Sie haben das Recht, erteilte Einwilligungen mit Wirkung für die Zukunft zu widerrufen.</p>
                        <h3 id="dsg-general-object">Widerspruchsrecht</h3>
                        <p><strong>Sie können der künftigen Verarbeitung der Sie betreffenden Daten nach Maßgabe der gesetzlichen Vorgaben jederzeit widersprechen. Der Widerspruch kann insbesondere gegen die Verarbeitung für Zwecke der Direktwerbung erfolgen.</strong></p>
                        <h3 id="dsg-general-cookies">Cookies und Widerspruchsrecht bei Direktwerbung</h3>
                        <p>Als „Cookies“ werden kleine Dateien bezeichnet, die auf Rechnern der Nutzer gespeichert werden. Innerhalb der Cookies können unterschiedliche Angaben gespeichert werden. Ein Cookie dient primär dazu, die Angaben zu einem Nutzer (bzw. dem Gerät auf dem das Cookie gespeichert ist) während oder auch nach seinem Besuch innerhalb eines Onlineangebotes zu speichern. Als temporäre Cookies, bzw. „Session-Cookies“ oder „transiente Cookies“, werden Cookies bezeichnet, die gelöscht werden, nachdem ein Nutzer ein Onlineangebot verlässt und seinen Browser schließt. In einem solchen Cookie kann z.B. der Inhalt eines Warenkorbs in einem Onlineshop oder ein Login-Status gespeichert werden. Als „permanent“ oder „persistent“ werden Cookies bezeichnet, die auch nach dem Schließen des Browsers gespeichert bleiben. So kann z.B. der Login-Status gespeichert werden, wenn die Nutzer diese nach mehreren Tagen aufsuchen. Ebenso können in einem solchen Cookie die Interessen der Nutzer gespeichert werden, die für Reichweitenmessung oder Marketingzwecke verwendet werden. Als „Third-Party-Cookie“ werden Cookies bezeichnet, die von anderen Anbietern als dem Verantwortlichen, der das Onlineangebot betreibt, angeboten werden (andernfalls, wenn es nur dessen Cookies sind spricht man von „First-Party Cookies“).<br>
                            <br>
                            Wir können temporäre und permanente Cookies einsetzen und klären hierüber im Rahmen unserer Datenschutzerklärung auf.<br>
                            <br>
                            Sofern wir die Nutzer um eine Einwilligung in den Einsatz von Cookies bitten (z.B. im Rahmen einer Cookie-Einwilligung), ist die Rechtsgrundlage dieser Verarbeitung Art. 6 Abs. 1 lit. a. DSGVO. Ansonsten werden die personenbezogenen Cookies der Nutzer entsprechend den nachfolgenden Erläuterungen im Rahmen dieser Datenschutzerklärung auf Grundlage unserer berechtigten Interessen (d.h. Interesse an der Analyse, Optimierung und wirtschaftlichem Betrieb unseres Onlineangebotes im Sinne des Art. 6 Abs. 1 lit. f. DSGVO) oder sofern der Einsatz von Cookies zur Erbringung unserer vertragsbezogenen Leistungen erforderlich ist, gem. Art. 6 Abs. 1 lit. b. DSGVO, bzw. sofern der Einsatz von Cookies für die Wahrnehmung einer Aufgabe, die im öffentlichen Interesse liegt erforderlich ist oder in Ausübung öffentlicher Gewalt erfolgt, gem. Art. 6 Abs. 1 lit. e. DSGVO, verarbeitet.<br>
                            <br>
                            Falls die Nutzer nicht möchten, dass Cookies auf ihrem Rechner gespeichert werden, werden sie gebeten die entsprechende Option in den Systemeinstellungen ihres Browsers zu deaktivieren. Gespeicherte Cookies können in den Systemeinstellungen des Browsers gelöscht werden. Der Ausschluss von Cookies kann zu Funktionseinschränkungen dieses Onlineangebotes führen.<br>
                            <br>
                            Ein genereller Widerspruch gegen den Einsatz der zu Zwecken des Onlinemarketing eingesetzten Cookies kann bei einer Vielzahl der Dienste, vor allem im Fall des Trackings, über die US-amerikanische Seite <a href="http://www.aboutads.info/choices/">http://www.aboutads.info/choices/</a> oder die EU-Seite <a href="http://www.youronlinechoices.com/">http://www.youronlinechoices.com/</a> erklärt werden. Des Weiteren kann die Speicherung von Cookies mittels deren Abschaltung in den Einstellungen des Browsers erreicht werden. Bitte beachten Sie, dass dann gegebenenfalls nicht alle Funktionen dieses Onlineangebotes genutzt werden können.</p>
                        <h3 id="dsg-general-erasure">Löschung von Daten</h3><p>Die von uns verarbeiteten Daten werden nach Maßgabe der gesetzlichen Vorgaben gelöscht oder in ihrer Verarbeitung eingeschränkt. Sofern nicht im Rahmen dieser Datenschutzerklärung ausdrücklich angegeben, werden die bei uns gespeicherten Daten gelöscht, sobald sie für ihre Zweckbestimmung nicht mehr erforderlich sind und der Löschung keine gesetzlichen Aufbewahrungspflichten entgegenstehen. <br>
                            <br>
                            Sofern die Daten nicht gelöscht werden, weil sie für andere und gesetzlich zulässige Zwecke erforderlich sind, wird deren Verarbeitung eingeschränkt. D.h. die Daten werden gesperrt und nicht für andere Zwecke verarbeitet. Das gilt z.B. für Daten, die aus handels- oder steuerrechtlichen Gründen aufbewahrt werden müssen.</p>
                        <h3 id="dsg-general-changes">Änderungen und Aktualisierungen der Datenschutzerklärung</h3><p>Wir bitten Sie sich regelmäßig über den Inhalt unserer Datenschutzerklärung zu informieren. Wir passen die Datenschutzerklärung an, sobald die Änderungen der von uns durchgeführten Datenverarbeitungen dies erforderlich machen. Wir informieren Sie, sobald durch die Änderungen eine Mitwirkungshandlung Ihrerseits (z.B. Einwilligung) oder eine sonstige individuelle Benachrichtigung erforderlich wird.</p><p></p>
                        <h3 id="dsg-services-agency">Agenturdienstleistungen</h3>
                        <p><span class="ts-muster-content">Wir verarbeiten die Daten unserer Kunden im Rahmen unserer vertraglichen Leistungen zu denen konzeptionelle und strategische Beratung, Kampagnenplanung, Software- und Designentwicklung/-beratung oder Pflege, Umsetzung von Kampagnen und Prozessen/ Handling, Serveradministration, Datenanalyse/ Beratungsleistungen und Schulungsleistungen gehören.<br>
                            <br>
                            Hierbei verarbeiten wir Bestandsdaten (z.B., Kundenstammdaten, wie Namen oder Adressen), Kontaktdaten (z.B., E-Mail, Telefonnummern), Inhaltsdaten (z.B., Texteingaben, Fotografien, Videos), Vertragsdaten (z.B., Vertragsgegenstand, Laufzeit), Zahlungsdaten (z.B., Bankverbindung, Zahlungshistorie), Nutzungs- und Metadaten (z.B. im Rahmen der Auswertung und Erfolgsmessung von Marketingmaßnahmen). Besondere Kategorien personenbezogener Daten verarbeiten wir grundsätzlich nicht, außer wenn diese Bestandteile einer beauftragten Verarbeitung sind. Zu den Betroffenen gehören unsere Kunden, Interessenten sowie deren Kunden, Nutzer, Websitebesucher oder Mitarbeiter sowie Dritte. Der Zweck der Verarbeitung besteht in der Erbringung von Vertragsleistungen, Abrechnung und unserem Kundenservice. Die Rechtsgrundlagen der Verarbeitung ergeben sich aus Art. 6 Abs. 1 lit. b DSGVO (vertragliche Leistungen), Art. 6 Abs. 1 lit. f DSGVO (Analyse, Statistik, Optimierung, Sicherheitsmaßnahmen). Wir verarbeiten Daten, die zur Begründung und Erfüllung der vertraglichen Leistungen erforderlich sind und weisen auf die Erforderlichkeit ihrer Angabe hin. Eine Offenlegung an Externe erfolgt nur, wenn sie im Rahmen eines Auftrags erforderlich ist. Bei der Verarbeitung der uns im Rahmen eines Auftrags überlassenen Daten handeln wir entsprechend den Weisungen der Auftraggeber sowie der gesetzlichen Vorgaben einer Auftragsverarbeitung gem. Art. 28 DSGVO und verarbeiten die Daten zu keinen anderen, als den auftragsgemäßen Zwecken.<br>
                            <br>
                             Wir löschen die Daten nach Ablauf gesetzlicher Gewährleistungs- und vergleichbarer Pflichten. die Erforderlichkeit der Aufbewahrung der Daten wird alle drei Jahre überprüft; im Fall der gesetzlichen Archivierungspflichten erfolgt die Löschung nach deren Ablauf (6 J, gem. § 257 Abs. 1 HGB, 10 J, gem. § 147 Abs. 1 AO). Im Fall von Daten, die uns gegenüber im Rahmen eines Auftrags durch den Auftraggeber offengelegt wurden, löschen wir die Daten entsprechend den Vorgaben des Auftrags, grundsätzlich nach Ende des Auftrags.</span></p>
                        <h3 id="dsg-administration">Administration, Finanzbuchhaltung, Büroorganisation, Kontaktverwaltung</h3>
                        <p><span class="ts-muster-content">Wir verarbeiten Daten im Rahmen von Verwaltungsaufgaben sowie Organisation unseres Betriebs, Finanzbuchhaltung und Befolgung der gesetzlichen Pflichten, wie z.B. der Archivierung. Hierbei verarbeiten wir dieselben Daten, die wir im Rahmen der Erbringung unserer vertraglichen Leistungen verarbeiten. Die Verarbeitungsgrundlagen sind Art. 6 Abs. 1 lit. c. DSGVO, Art. 6 Abs. 1 lit. f. DSGVO. Von der Verarbeitung sind Kunden, Interessenten, Geschäftspartner und Websitebesucher betroffen. Der Zweck und unser Interesse an der Verarbeitung liegt in der Administration, Finanzbuchhaltung, Büroorganisation, Archivierung von Daten, also Aufgaben die der Aufrechterhaltung unserer Geschäftstätigkeiten, Wahrnehmung unserer Aufgaben und Erbringung unserer Leistungen dienen. Die Löschung der Daten im Hinblick auf vertragliche Leistungen und die vertragliche Kommunikation entspricht den, bei diesen Verarbeitungstätigkeiten genannten Angaben.<br>
                            <br>
                            Wir offenbaren oder übermitteln hierbei Daten an die Finanzverwaltung, Berater, wie z.B., Steuerberater oder Wirtschaftsprüfer sowie weitere Gebührenstellen und Zahlungsdienstleister.<br>
                            <br>
                            Ferner speichern wir auf Grundlage unserer betriebswirtschaftlichen Interessen Angaben zu Lieferanten, Veranstaltern und sonstigen Geschäftspartnern, z.B. zwecks späterer Kontaktaufnahme. Diese mehrheitlich unternehmensbezogenen Daten, speichern wir grundsätzlich dauerhaft.<br>
                            </span></p>
                        <h3 id="dsg-registration">Registrierfunktion</h3>
                        <p><span class="ts-muster-content">Nutzer können ein Nutzerkonto anlegen. Im Rahmen der Registrierung werden die erforderlichen Pflichtangaben den Nutzern mitgeteilt und auf Grundlage des Art. 6 Abs. 1 lit. b DSGVO zu Zwecken der Bereitstellung des Nutzerkontos verarbeitet. Zu den verarbeiteten Daten gehören insbesondere die Login-Informationen (Name, Passwort sowie eine E-Mailadresse). Die im Rahmen der Registrierung eingegebenen Daten werden für die Zwecke der Nutzung des Nutzerkontos und dessen Zwecks verwendet. <br>
                            <br>
                            Die Nutzer können über Informationen, die für deren Nutzerkonto relevant sind, wie z.B. technische Änderungen, per E-Mail informiert werden. Wenn Nutzer ihr Nutzerkonto gekündigt haben, werden deren Daten im Hinblick auf das Nutzerkonto, vorbehaltlich einer gesetzlichen Aufbewahrungspflicht, gelöscht. Es obliegt den Nutzern, ihre Daten bei erfolgter Kündigung vor dem Vertragsende zu sichern. Wir sind berechtigt, sämtliche während der Vertragsdauer gespeicherten Daten des Nutzers unwiederbringlich zu löschen.<br>
                            <br>
                            Im Rahmen der Inanspruchnahme unserer Registrierungs- und Anmeldefunktionen sowie der Nutzung des Nutzerkontos, speichern wir die IP-Adresse und den Zeitpunkt der jeweiligen Nutzerhandlung. Die Speicherung erfolgt auf Grundlage unserer berechtigten Interessen, als auch der Nutzer an Schutz vor Missbrauch und sonstiger unbefugter Nutzung. Eine Weitergabe dieser Daten an Dritte erfolgt grundsätzlich nicht, außer sie ist zur Verfolgung unserer Ansprüche erforderlich oder es besteht hierzu besteht eine gesetzliche Verpflichtung gem. Art. 6 Abs. 1 lit. c. DSGVO. Die IP-Adressen werden spätestens nach 7 Tagen anonymisiert oder gelöscht.<br>
                            </span></p>
                        <h3 id="dsg-hostingprovider">Hosting und E-Mail-Versand</h3>
                        <p><span class="ts-muster-content">Die von uns in Anspruch genommenen Hosting-Leistungen dienen der Zurverfügungstellung der folgenden Leistungen: Infrastruktur- und Plattformdienstleistungen, Rechenkapazität, Speicherplatz und Datenbankdienste, E-Mail-Versand, Sicherheitsleistungen sowie technische Wartungsleistungen, die wir zum Zwecke des Betriebs dieses Onlineangebotes einsetzen. <br>
                            <br>
                            Hierbei verarbeiten wir, bzw. unser Hostinganbieter Bestandsdaten, Kontaktdaten, Inhaltsdaten, Vertragsdaten, Nutzungsdaten, Meta- und Kommunikationsdaten von Kunden, Interessenten und Besuchern dieses Onlineangebotes auf Grundlage unserer berechtigten Interessen an einer effizienten und sicheren Zurverfügungstellung dieses Onlineangebotes gem. Art. 6 Abs. 1 lit. f DSGVO i.V.m. Art. 28 DSGVO (Abschluss Auftragsverarbeitungsvertrag).</span></p>
                        <h3 id="dsg-logfiles">Erhebung von Zugriffsdaten und Logfiles</h3>
                        <p><span class="ts-muster-content">Wir, bzw. unser Hostinganbieter, erhebt auf Grundlage unserer berechtigten Interessen im Sinne des Art. 6 Abs. 1 lit. f. DSGVO Daten über jeden Zugriff auf den Server, auf dem sich dieser Dienst befindet (sogenannte Serverlogfiles). Zu den Zugriffsdaten gehören Name der abgerufenen Webseite, Datei, Datum und Uhrzeit des Abrufs, übertragene Datenmenge, Meldung über erfolgreichen Abruf, Browsertyp nebst Version, das Betriebssystem des Nutzers, Referrer URL (die zuvor besuchte Seite), IP-Adresse und der anfragende Provider.<br>
                            <br>
                            Logfile-Informationen werden aus Sicherheitsgründen (z.B. zur Aufklärung von Missbrauchs- oder Betrugshandlungen) für die Dauer von maximal 7 Tagen gespeichert und danach gelöscht. Daten, deren weitere Aufbewahrung zu Beweiszwecken erforderlich ist, sind bis zur endgültigen Klärung des jeweiligen Vorfalls von der Löschung ausgenommen.</span></p>
                        <h3 id="dsg-thirdparty-googlefonts">Google Fonts</h3>
                        <p><span class="ts-muster-content">Wir binden die Schriftarten ("Google Fonts") des Anbieters Google Ireland Limited, Gordon House, Barrow Street, Dublin 4, Irland, ein. Nach Angaben von Google werden die Daten der Nutzer allein zu Zwecken der Darstellung der Schriftarten im Browser der Nutzer verwendet. Die Einbindung erfolgt auf Grundlage unserer berechtigten Interessen an einer technisch sicheren, wartungsfreien und effizienten Nutzung von Schriftarten, deren einheitlicher Darstellung sowie Berücksichtigung möglicher lizenzrechtlicher Restriktionen für deren Einbindung. Datenschutzerklärung: <a target="_blank" href="https://www.google.com/policies/privacy/">https://www.google.com/policies/privacy/</a>.</span></p><a href="https://datenschutz-generator.de" class="dsg1-6" rel="nofollow" target="_blank">Erstellt mit Datenschutz-Generator.de von RA Dr. Thomas Schwenke</a>
                    </div>
                </section>
            </main>

            <footer>
                <img src="assets/img/logo_black.svg" alt="it-{dschungel} Logo" />

                <a href="legal.php">Impressum & Datenschutz</a>
            </footer>

            <script src="assets/js/enter-click.js"></script>
        </body>
    </html>
