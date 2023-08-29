# -*- coding: utf-8 -*-

from random import randint
from typing import Dict
from uuid import uuid4

from service.models import Person

class DataController:
    people: Dict[str, Person] = {}

    def __init__(self):
        #for x in range(10):
        flag_ = "iFlag{1ntr0sp3ct10n_1s_c00l}"
        self.people[flag_] = Person(
                flag=flag_,
                full_name=f"Joaozinho do GraphQL",
                age=randint(25, 50)
        )

    def get_by_id(self, flag_: str):
        return self.people.get(flag_, None)

    def get_all(self, limit: int = 10, offset: int = 0):
        data = list(self.people.values())
        end, size = limit + offset, len(data)
        return data[offset:end if end < size else size]

controller = DataController()
