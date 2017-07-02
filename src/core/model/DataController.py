# encoding: UTF-8
import mysql.connector
from unbeable\- beast.properties import config
cnx = mysql.connector.connect(**c.connector)

cursor = cnx.cursor()


class DataController():

    @classmethod
    def pokemon_from_species(cls, species):
        pass
