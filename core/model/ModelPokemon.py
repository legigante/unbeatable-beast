# encoding: UTF-8
import collections

class ModelPokemon(object):

    def __init__(self):
        # Name of Pokémon
        self.name = "MissingNo."
        # Pokédex Number
        self.pokedex = -1
        # Classification, description
        self.classification = "MissingNo. Pokémon"
        # The height of this Pokémon
        self.height = -1.1
        # The weight of this Pokémon
        self.weight = -1.1
        # Base stats (HP, ATK, DEF, SPA, SPD)
        stats = collections.namedtuple("stats", "HP ATK DEF SPC SPE")
        self.base = stats(HP=-1, ATK=-1, DEF=-1, SPC=-1, SPE=-1)
        # The Type(s) of this Pokémon. Type A is mandatory.
        # Type B is optional
        self.type_a = None
        self.type_b = None
        # Moves of this Pokémon, Object Moves
        # self.moves = Moves(self.pokedex)


M = ModelPokemon()
print(M.name)
print(M.pokedex)
print(M.classification)
print(M.height)
print(M.weight)
print(M.base.HP)
print(M.base.ATK)
print(M.base.DEF)
print(M.base.SPC)
