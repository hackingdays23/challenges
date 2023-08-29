# -*- coding: utf-8 -*-

from random import randint
from typing import Dict
from uuid import uuid4

from service.models import Person

class DataController:
    people: Dict[str, Person] = {}

    def __init__(self):
        #for x in range(10):
        flag_ = "iFlag{1d0r_1s_c00l}"
        fakeflag_ = "iFlag{N0t_th3_Fl4g}";
        i = 0;
        for x in range(100):
                id_ = i;
                self.people[id_] = Person(
               		flag=fakeflag_,
                	full_name=f"Teste da Silva",
                	age=randint(25, 50)
			#id=i
        	)
                i = i+1;
        i = 100;
        id_ = i;
        self.people[id_] = Person(
                        flag=flag_,
                        full_name=f"Flagzinho da Silva",
                        age=101 
                        #id=i
        )

    def get_by_id(self, id_: int):
        return self.people.get(id_, None)

controller = DataController()
