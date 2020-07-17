
mysql newscrawler -e "DROP TABLE IF EXISTS MEM_headlines;"
mysql newscrawler -e "CREATE TABLE MEM_headlines ENGINE=MEMORY SELECT * FROM headlines;"
