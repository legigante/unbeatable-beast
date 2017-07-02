# encoding: UTF-8
import conf as c
import mysql.connector

cnx = mysql.connector.connect(**c.connector)

cursor = cnx.cursor()

query = ("select * from pokemons")
cursor.execute(query)

for pokemon in cursor:
    print(pokemon)
