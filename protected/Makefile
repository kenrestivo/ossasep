

schema::
	mysql -u root -ptesting asep < data/schema.mysql.sql
	mysql -u root -ptesting asep < data/startupdata.sql 


spy::
	java -jar /usr/local/share/schemaspy/SchemaSpy.jar -dp /usr/local/share/schemaspy/mysql-connector-java-5.1.6-bin.jar -t mysql -o ../../schemas -host 127.0.0.1 -db asep -u root -p testing
