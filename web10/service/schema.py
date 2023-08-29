# -*- coding: utf-8 -*-

from graphene import Field, ObjectType, Schema, String, List, Int

from service.controllers import controller
from service.models import Person

class Query(ObjectType):
    health = String()

    @staticmethod
    def resolve_health(root, info):
        return f"OK"

    person = Field(Person, id=Int())

    @staticmethod
    def resolve_person(root, info, id):
        return controller.get_by_id(id)

    #people = List(Person, limit=Int(), offset=Int())

    #@staticmethod
    #def resolve_people(root, info, limit: int = 10, offset: int = 0):
        #return controller.get_all(limit, offset)

schema = Schema(query=Query)
