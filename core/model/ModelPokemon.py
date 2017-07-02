# encoding: UTF-8
import collections


class ModelPokemon(object):

    def __init__(self):
        # National Pokedex Number
        self.pokedex = None
        # Name of Pokemon
        self.name = "MissingNo"
        # Species of this Pokemon
        self.species = "M"
        # Classification, description
        self.classification = "MissingNo Pokemon"
        # The height of this Pokemon
        self.height = 0.0

        # The weight of this Pokemon
        self.weight = 0.0
        # Base stats (HP, ATK, DEF, SPA, SPD)
        stats = collections.namedtuple("stats", "HP ATK DEF SPC SPE")
        self.base = stats(HP=0, ATK=0, DEF=0, SPC=0, SPE=0)
        # The Type(s) of this Pokemon. Type A is mandatory.
        # Type B is optional
        self.type_a = None
        self.type_b = None
        # Moves of this Pokemon, Object Moves
        moves = collections.namedtuple("moves",
                                       "name type category pp base_power\
                                       accuracy effect description")
        self.moves = [moves]

    def __str__(self):

        return "Pokemon: %s\nPokedex: %s\nClassification: %s" %\
            (self.name, self.pokedex, self.classification)


M = ModelPokemon()
print(M)
# print(M.name)
# print(M.pokedex)
# print(M.classification)
# print(M.height)
# print(M.weight)
# print(M.base.HP)
# print(M.base.ATK)
# print(M.base.DEF)
# print(M.base.SPC)
