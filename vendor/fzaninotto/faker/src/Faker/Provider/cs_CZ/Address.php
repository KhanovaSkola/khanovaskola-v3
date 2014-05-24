<?php

namespace Faker\Provider\cs_CZ;

class Address extends \Faker\Provider\Address
{
    protected static $streetNameFormats = array(
        'Široká', 'Pod Novou Školou', 'Vyderská', 'Alžírská', 'Na Jezerce', 'Neuvedená', 'Palackého nám.', 'U Drážky',
        'Doubravická', 'Jerevanská', 'Karlovarská', 'U Trojice', 'Na Rozcestí', 'Do Vršku', 'Na Dědince', 'Kukučínova',
        'Újezdská', 'Kralupská', 'Generála Šišky', 'Toruňská', 'Ježovická', 'Na Úbočí', 'Netřebská', 'Sportovní',
        'Školní', 'Diskařská', 'Zámecká', 'K Pyramidce', 'Hrad III. Nádvoří', 'Pod Útesy', 'Lanžhotská', 'Lojovická',
        'Antonínská', 'Římovská', 'Červenkova', 'Neuvedená', 'Havlínova', 'K Vinici', 'Nad Trnkovem', 'K Padesátníku',
        'U Soutoku', 'Kohoutových', 'Havraní', 'Truhlářova', 'Raichlova', 'N. A. Někrasova', 'Helmova', 'U Klubovny',
        'U Lesa', 'Chládkova', 'Okrasná', 'Karlínské nám.', 'Ruzyňská', 'U Prašné Brány', 'V Rohu', 'Nad Slávií',
        'Mšenská', 'Nad Libeňským Nádražím', 'Nad Nuslemi', 'Neuvedená', 'Kunešova', 'Statková', 'Nad Hřištěm',
        'U Silnice', 'Klatovská', 'U Fořta', 'Pod Bruskou', 'Valčíkova', 'Neuvedená', 'Kopanská', 'Neuvedená',
        'Kejnická', 'Pod Soutratím', 'K Návsi', 'U Slovanky', 'Oválová', 'Rozrazilová', 'Stavební', 'Hrdlořezská',
        'Tatranská', 'V Uličce', 'Kvestorská', 'U Vinice', 'Neuvedená', 'Milady Horákové', 'nám. Svatopluka Čecha',
        'Čelkovická', 'Na Petynce', 'Jenská', 'Výpadová', 'Gončarenkova', 'U Prádelny', 'Paškova', 'Omská',
        'Angelovova', 'Gutova', 'Chlumínská', 'Roentgenova', 'Otavova', 'Pavlišovská', 'Maltézské náměstí',
        'Československého Exilu', 'Křišťanova', 'U Chodovského Hřbitova', 'Točenská', 'Stadionová', 'U Vorlíků',
        'Holubinková', 'Ukrajinská', 'Houbařská', 'Ve Vrších', 'K Hrušovu', 'Hostivařské nám.', 'U Čekárny',
        'Horní Hrdlořezská', 'Lindavská', 'Petřínské Sady', 'Ve Lhotce', 'Příbramská', 'Nádražní', 'Na Jílech',
        'Pávovské náměstí', 'Hečkova', 'Neuvedená', 'K Dobré Vodě', 'Vřesovická', 'nám. Před Bateriemi', 'Do Vozovny',
        'Rozkošného', 'Velenická', 'Vlašská', 'Nivnická', 'Holínská', 'Na Vrchu', 'Tomsova', 'Na Habrové',
        'Drahotínská', 'Radnické Schody', 'Nad Šauerovými Sady', 'Doudova', 'Na Výšině', 'K Březince', 'Nad Klikovkou',
        'Vysokoškolská', 'K Samotě', 'U Beránky', 'Ke Stadionu', 'U Županských', 'Voděradská', 'Ke Kyjovu', 'Kaňkova',
        'Na Sedlišti', 'Leštínská', 'Prokopových', 'Na Štamberku', 'Lukešova', 'U Sladovny', 'Mečíková', 'K Hořavce',
        'Říční', 'Melodická', 'U Vinných Sklepů', 'Kukelská', 'Radbuzská', 'U Kamýku', 'Schoellerova', 'Horní Stromky',
        'Odlehlá', 'Arménská', 'Pod Svahem', 'Nad Hliníkem', 'Hořanská', 'Za Pekárnou', 'K Háji', 'Satalická',
        'Violková', 'Neuvedená', 'Sovova', 'Litevská', 'náměstí Organizace Spojených Národů', 'Týmlova',
        'nám. Pod Lípou', 'Smrková', 'Pětipeského', 'V Jámě', 'U Chmelnice', 'Pilovská', 'Trnkovo náměstí', 'Dělnická',
        'V Předním Hloubětíně', 'Pohledná', 'U Zeleného Ptáka', 'U Pekáren', 'Tvrdonická', 'Hrachovská', 'K Vystrkovu',
        'Pošepného nám.', 'Do Kopečka', 'U Vodárny', 'Souvratní'
    );
    protected static $streetAddressFormats = array(
        '{{streetName}}',
        '{{streetName}} {{buildingNumber}}',
        '{{streetName}} {{buildingNumber}}',
        '{{streetName}} {{buildingNumber}}',
        '{{streetName}} {{buildingNumber}}',
    );
    protected static $addressFormats = array(
        "{{streetAddress}}\n{{region}}\n{{postcode}} {{city}}",
        "{{streetAddress}}\n{{postcode}} {{city}}",
        "{{streetAddress}}\n{{postcode}} {{city}}",
        "{{streetAddress}}\n{{postcode}} {{city}}",
        "{{streetAddress}}\n{{postcode}} {{city}}",
        "{{streetAddress}}\n{{postcode}} {{city}}",
        "{{streetAddress}}\n{{postcode}} {{city}}\nČeská republika",
    );

    protected static $buildingNumber = array('%', '%%', '%/%%', '%%/%%', '%/%%%', '%%/%%%');
    protected static $postcode = array('#####', '### ##');

    protected static $cityFormats = array(
        'Praha', 'Brno', 'Ostrava', 'Plzeň', 'Liberec', 'Olomouc', 'Ústí nad Labem', 'České Budějovice',
        'Hradec Králové', 'Pardubice', 'Havířov', 'Zlín', 'Kladno', 'Most', 'Karviná', 'Opava', 'Frýdek-Místek',
        'Karlovy Vary', 'Teplice', 'Děčín', 'Jihlava', 'Chomutov', 'Jablonec nad Nisou', 'Přerov', 'Prostějov',
        'Mladá Boleslav', 'Česká Lípa', 'Třebíč', 'Třinec', 'Tábor', 'Znojmo', 'Příbram', 'Cheb', 'Orlová',
        'Trutnov', 'Kolín', 'Písek', 'Kroměříž', 'Šumperk', 'Vsetín', 'Valašské Meziříčí', 'Litvínov', 'Hodonín',
        'Uherské Hradiště', 'Český Těšín', 'Břeclav', 'Krnov', 'Sokolov', 'Litoměřice', 'Nový Jičín',
        'Havlíčkův Brod', 'Chrudim', 'Černošice'
    );

    protected static $country = array(
        'Afghánistán', 'Albánie', 'Alžírsko', 'Andorra', 'Angola', 'Antigua a Barbuda', 'Argentina',
        'Arménie', 'Austrálie', 'Ázerbájdžán', 'Bahamy', 'Bahrajn', 'Bangladéš', 'Barbados', 'Belgie',
        'Belize', 'Benin', 'Bělorusko', 'Bhútán', 'Bolívie', 'Bosna a Hercegovina', 'Botswana', 'Brazílie',
        'Brunej', 'Bulharsko', 'Burkina Faso', 'Burundi', 'Cookovy ostrovy', 'Čad', 'Černá Hora', 'Česká republika',
        'Čína', 'Dánsko', 'Demokratická republika Kongo', 'Dominika', 'Dominikánská republika', 'Džibutsko',
        'Egypt', 'Ekvádor', 'Eritrea', 'Estonsko', 'Etiopie', 'Fidži', 'Filipíny', 'Finsko', 'Francie', 'Gabon',
        'Gambie', 'Ghana', 'Grenada', 'Gruzie', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Honduras',
        'Chile', 'Chorvatsko', 'Indie', 'Indonésie', 'Irák', 'Írán', 'Irsko', 'Island', 'Itálie', 'Izrael', 'Jamajka',
        'Japonsko', 'Jemen', 'Jihoafrická republika', 'Jižní Korea', 'Jižní Súdán', 'Jordánsko', 'Kambodža', 'Kamerun',
        'Kanada', 'Kapverdy', 'Katar', 'Kazachstán', 'Keňa', 'Kiribati', 'Kolumbie', 'Komory', 'Republika Kongo',
        'Kostarika', 'Kuba', 'Kuvajt', 'Kypr', 'Kyrgyzstán', 'Laos', 'Lesotho', 'Libanon', 'Libérie', 'Libye',
        'Lichtenštejnsko', 'Litva', 'Lotyšsko', 'Lucembursko', 'Madagaskar', 'Maďarsko', 'Makedonie', 'Malajsie',
        'Malawi', 'Maledivy', 'Mali', 'Malta', 'Maroko', 'Marshallovy ostrovy', 'Mauritánie', 'Mauricius', 'Mexiko',
        'Federativní státy Mikronésie', 'Moldavsko', 'Monako', 'Mongolsko', 'Mosambik', 'Myanmar', 'Namibie', 'Nauru',
        'Nepál', 'Německo', 'Niger', 'Nigérie', 'Nikaragua', 'Niue', 'Nizozemsko', 'Norsko', 'Nový Zéland', 'Omán',
        'Pákistán', 'Palau', 'Panama', 'Papua-Nová Guinea', 'Paraguay', 'Peru', 'Pobřeží slonoviny', 'Polsko',
        'Portugalsko', 'Rakousko', 'Rovníková Guinea', 'Rumunsko', 'Rusko', 'Rwanda', 'Řecko', 'Salvador', 'Samoa',
        'San Marino', 'Saúdská Arábie', 'Senegal', 'Severní Korea', 'Seychely', 'Sierra Leone', 'Singapur',
        'Slovensko', 'Slovinsko', 'Somálsko', 'Spojené arabské emiráty', 'Spojené království', 'Spojené státy americké',
        'Srbsko', 'Středoafrická republika', 'Surinam', 'Súdán', 'Svatá Lucie', 'Svatý Kryštof a Nevis',
        'Svatý Tomáš a Princův ostrov', 'Svatý Vincenc a Grenadiny', 'Svazijsko', 'Sýrie', 'Šalamounovy ostrovy',
        'Španělsko', 'Šrí Lanka', 'Švédsko', 'Švýcarsko', 'Tádžikistán', 'Tanzanie', 'Thajsko', 'Togo', 'Tonga',
        'Trinidad a Tobago', 'Tunisko', 'Turecko', 'Turkmenistán', 'Tuvalu', 'Uganda', 'Ukrajina', 'Uruguay',
        'Uzbekistán', 'Vanuatu', 'Vatikán', 'Venezuela', 'Vietnam', 'Východní Timor', 'Zambie', 'Zimbabwe', 'Abcházie',
        'Jižní Osetie', 'Kosovo', 'Náhorní Karabach', 'Podněstří', 'Severní Kypr', 'Somaliland', 'Tchaj-wan',
        'Americké Panenské ostrovy', 'Americká Samoa', 'Anguilla', 'Aruba', 'Bermudy', 'Britské Panenské ostrovy',
        'Cookovy ostrovy', 'Curaçao', 'Faerské ostrovy', 'Falklandy', 'Francouzská Polynésie', 'Gibraltar', 'Grónsko',
        'Guam', 'Guernsey', 'Hong Kong', 'Jersey', 'Kajmanské ostrovy', 'Kokosové ostrovy', 'Macau', 'Niue',
        'Nová Kaledonie', 'Pitcairnovy ostrovy', 'Portoriko', 'Severní Mariany', 'Tokelau', 'Turks a Caicos',
        'Vánoční ostrov', 'Wallis a Futuna', 'Evropská unie'
    );

    private static $regions = array(
        'Hlavní město Praha', 'Středočeský kraj', 'Jihočeský kraj', 'Plzeňský kraj', 'Karlovarský kraj',
        'Ústecký kraj', 'Liberecký kraj', 'Královéhradecký kraj', 'Pardubický kraj', 'Vysočina', 'Jihomoravský kraj',
        'Olomoucký kraj', 'Zlínský kraj', 'Moravskoslezský kraj',
    );

    /**
     * Randomly returns a czech region.
     *
     * @example 'Liberecký kraj'
     *
     * @return string
     */
    public static function region()
    {
        return static::randomElement(static::$regions);
    }
}
