# encoding: UTF-8
import mysql.connector

cnx = mysql.connector.connect(user="webUB", password="LeMotDePasseDeLaBete",
                              host="51.254.98.195", database="unbeatableBEAST")

query = ("SELECT pokemons.*, moves.* FROM pokemons inner join pokemons_moves on\
 pokemons.id=pokemons_moves.pokemonID inner join moves on\
  pokemons_moves.moveID=moves.id where pokemons.name='pikachu'")

cursor = cnx.cursor()
cursor.execute(query)
for move in cursor:
    print(move)
