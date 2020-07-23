
mysql newscrawler -e "DROP TABLE IF EXISTS MEM_headlines;"
mysql newscrawler -e "CREATE TABLE MEM_headlines ENGINE=MEMORY SELECT * FROM headlines;"
mysql newscrawler -e "ALTER TABLE MEM_headlines ADD UNIQUE myuni (msgmd5(32));"
#mysql newscrawler -e "CREATE TABLE MEM_headlines ENGINE=MEMORY like headlines";
