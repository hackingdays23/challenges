# -*- coding: utf-8 -*-

from graphene import String, Int, ObjectType

class Person(ObjectType):
    flag = String()
    full_name = String()
    age = Int()
