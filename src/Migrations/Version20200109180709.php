<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200109180709 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs

        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (1,"TATRY WYSOKIE","T.01")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (2,"TATRY ZACHODNIE","T.02")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (3,"PODTATRZE", "T.03")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (4,"BESKID ŚLĄSKI", "BZ.01")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (5,"BESKID ŻYWIECKI", "BZ.02")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (6,"BESKID MAŁY", "BZ.03")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (7,"BESKID ŚREDNI", "BZ.04")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (8,"GORCE", "BZ.05")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (9,"BESKID WYSPOWY", "BZ.06")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (10,"ORAWA", "BZ.07")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (11,"SZPISZ I PIENINY", "BZ.08")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (12,"BESKID SĄDECKI", "BZ.09")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (13,"POGÓRZE WIELICKIE", "BZ.10")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (14,"POGÓRZE WIŚNICKIE", "BZ.11")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (15,"POGÓRZE ROŻNOWSKIE", "BZ.12")');

        $this->addSql('INSERT INTO point (idP, name) VALUES (1,"Wodogrzmoty Mickiewicza")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (2,"Schronisko PTTK nad Morskim Okiem (1410 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (3,"Czarny Staw nad Morskim Okiem (1583 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (4,"Palenica Białczańska")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (5,"Polana pod Wołoszynem")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (6,"Schronisko PTTK w Roztoce")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (7,"Rysy (2499 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (8,"Mięguszowiecka Przełęcz pod Chłopkiem (2307 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (9, "Dzięgielów - Zamek")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (10, "Jasieniowa (521 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (11, "Schronisko PTTK Tuł (621 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (12, "Ostry (712 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (13, "Mała Czantoria (864 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (14, "Czantoria Wielka (995 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (15, "Rusinowa Polana (1170-1300 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (16, "Łysa Polana")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (17, "Gęsia Szyja (1489m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (18, "Rówień Waksmundzka")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (19, "Psia Trawka")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (20, "Dolina za Mnichem (1785-2100 m")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (21, "Szpiglasowa Przełęcz (2110 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (22, "Schronisko PTTK w Dolinie Pięciu Stawów Polskich (1671m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (23, "Siklawa")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (24, "Kozi Wierch (2291 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (25, "Kozia Przełęcz (2137 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (26, "Przełęcz Zawrat (2159 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (27, "Świnica (2301 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (28, "Świnicka Przełęcz (2050 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (29, "Kozia Dolinka")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (30, "Żleb Kulczyńskiego")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (31, "Skrajny Granat (2225 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (32, "Przełęcz Krzyżne (2114 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (33, "Przełęcz Krab (1853 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (34, "Dwoiśniak")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (35, "Schronisko PTTK na Hali Gąsienicowej (1500 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (36, "Dolina Filipka")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (37, "Wierch Poroniec (1036m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (38, "Czerwony Staw w Dolinie Pańszczyzny (1654 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (39, "Brzeziny")'); //T.03
        $this->addSql('INSERT INTO point (idP, name) VALUES (40, "Wrota Chałubińskiego (2022 m)")');
        //$this->addSql('INSERT INTO point (idP, name) VALUES (41, "Dwoiśniak")');//do usunięcia
        $this->addSql('INSERT INTO point (idP, name) VALUES (42, "Szpiglasowy Wierch (2172 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (43, "Tablica S. Bronikowskiego (1740m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (44, "Czarny Staw Gąsienicowy (1624 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (45, "Przełęcz Liliowe (1952 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (46, "Zielony Staw Gąsienicowy (1672 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (47, "Kościelec (2156m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (48, "Schronisko PTTK na Hali Ornak (1100 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (49, "Polana Pisana")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (50, "Smreczyński Staw")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (51, "Schronisko PTTK na Hali Kondratowej")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (52, "Hotel PTTK Kalatówki")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (53, "Przełęcz pod Kopą Kondracką")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (54, "Palenica Kościeliska (1183 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (55, "Kir")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (56, "Gronik")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (57, "Butorowy Wierch (1160 m)")');

        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (7,55,54,3)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (8,56,54,3)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (5,54,55,3)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (5,54,56,3)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (7,55,57,3)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (2,54,57,3)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,57,55,3)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (2,57,54,3)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,49,48,2)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,50,48,2)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (2,48,49,2)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (2,48,50,2)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,52,51,2)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,53,51,2)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (2,51,52,2)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (9,51,53,2)');
        

        $this->addSql('SET FOREIGN_KEY_CHECKS=0');

        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,4,1,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,1,4,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (2,5,1,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,1,5,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (2,6,1,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (8,1,2,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (5,2,1,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,2,3,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (2,3,2,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,7,3,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (13,3,7,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,8,3,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (10,3,8,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (1,1,6,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (5,9,10,4)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,10,9,4)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (6,10,11,4)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (5,11,10,4)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (5,11,12,4)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,12,11,4)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (6,11,13,4)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,13,11,4)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (9,9,13,4)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (6,13,9,4)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,13,14,4)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,14,13,4)');

        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (6,36,15,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,15,36,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (6,37,15,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,15,37,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,4,15,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (2,15,4,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,5,15,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,15,5,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,37,16,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,16,37,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (2,18,16,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (1,16,18,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (5,19,18,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,18,19,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,5,18,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (2,18,5,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,38,18,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (6,18,38,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (7,35,18,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (8,18,35,1)');

        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,35,19,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (7,19,35,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (5,39,19,1)');//ktora grupa?
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,19,39,1)');

        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (6,2,20,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (2,20,2,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (1,40,20,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,20,40,1)');

        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (1,42,21,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (1,21,42,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (8,43,21,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,21,43,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,20,21,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (1,21,20,1)');

        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (1,23,22,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (1,22,23,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (9,2,22,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (5,22,2,1)');

        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (1,43,23,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (1,23,43,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (11,1,23,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (5,23,1,1)');

        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (8,23,24,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (2,24,23,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,25,24,1)');

        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (6,43,25,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (2,25,43,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,29,25,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (1,25,29,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,26,25,1)');

        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (8,44,26,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,26,44,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (7,43,26,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,26,43,1)');

        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,26,27,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,27,26,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,28,27,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (1,27,28,1)');

        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,45,28,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (2,28,45,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (5,46,28,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (1,28,46,1)');
        
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,44,29,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (2,29,44,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (2,30,29,1)');

        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (1,24,30,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,29,30,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (1,30,29,1)');

        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (6,29,31,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (2,30,31,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (8,44,31,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (2,31,44,1)');

        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (9,22,32,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,32,22,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (8,38,32,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,32,38,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (6,31,32,1)');

        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (1,47,33,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,33,47,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,46,33,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (1,33,46,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,44,33,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (1,33,44,1)');
        
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (2,45,34,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (5,34,45,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (2,35,34,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (1,34,35,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (1,46,34,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,34,46,1)');

        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (2,44,35,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,35,44,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,38,35,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (6,35,38,1)');


        //$this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (5,11,12,4)');

        $this->addSql('INSERT INTO degree (name,  requiredPointsAmount) VALUES ("W góry brązowa", 15)');
        $this->addSql('INSERT INTO book_degree (idB, idD) VALUES (1,1)');
        $this->addSql('INSERT INTO book (numberOfPoints) VALUES (36)');
        $this->addSql('INSERT INTO tourist (firstName, lastName, login, password, idB) 
                        VALUES ("Kamil", "NOWAK", "user@user.pl", "1234", 1)');

        $this->addSql('INSERT INTO book_degree (idB, idD) VALUES (2,1)');
        $this->addSql('INSERT INTO book (idB, numberOfPoints) VALUES (2,20)');
        $this->addSql('INSERT INTO tourist (firstName, lastName, login, password, idB) 
                        VALUES ("Jan", "Kowalski", "jan@kowalski.com", "jan", 2)');

        $this->addSql('INSERT INTO book_degree (idB, idD) VALUES (3,1)');
        $this->addSql('INSERT INTO book (idB, numberOfPoints) VALUES (3,0)');
        $this->addSql('INSERT INTO tourist (firstName, lastName, login, password, idB) 
                        VALUES ("Anna", "Żyżyńska", "anna@gmail.com", "Anna1234", 3)');
        
            
        $this->addSql('INSERT INTO book_degree (idB, idD) VALUES (4,1)');
                $this->addSql('INSERT INTO book (idB, numberOfPoints) VALUES (4,200)');
                $this->addSql('INSERT INTO tourist (firstName, lastName, login, password, idB) 
                                VALUES ("Krystyna", "Kabacik-Kluz", "kk@k.com.pl", "qwerty", 4)');
        
            
        $this->addSql('INSERT INTO book_degree (idB, idD) VALUES (5,1)');
                $this->addSql('INSERT INTO book (idB, numberOfPoints) VALUES (5,8)');
                $this->addSql('INSERT INTO tourist (firstName, lastName, login, password, idB) 
                                VALUES ("Andrzej", "Dabień", "asdf123@o2.pl", "haslo", 5)');

        $this->addSql('INSERT INTO trail(idT, sumOfPointsGOT, hasSectionsOutOfBase, isVerified, trailDate, idBook) VALUES (1,10,false,false,"2020-01-01",1)');
        $this->addSql('INSERT INTO trail(idT, sumOfPointsGOT, hasSectionsOutOfBase, isVerified, trailDate, idBook) VALUES (2,5,false,false,"2020-01-04",1)');
        $this->addSql('INSERT INTO trail(idT, sumOfPointsGOT, hasSectionsOutOfBase, isVerified, idBook) VALUES(3,7,false,false,2)');

        $this->addSql('INSERT INTO section_trail (idT, idS, section_no) VALUES (1,14,0)');
        $this->addSql('INSERT INTO section_trail (idT, idS, section_no) VALUES (1,15,1)');

        $this->addSql('INSERT INTO section_trail (idT, idS, section_no) VALUES (2,9,0)');

        $this->addSql('INSERT INTO section_trail (idT, idS, section_no) VALUES (3,19,0)');
        $this->addSql('INSERT INTO section_trail (idT, idS, section_no) VALUES (3,20,1)');
        $this->addSql('SET FOREIGN_KEY_CHECKS=1'); 
    }
    public function down(Schema $schema) : void
    {
    
    }

}
