# -*- coding: utf-8 -*-

from flask import Flask
from flask_graphql import GraphQLView
from service.schema import schema

app = Flask(__name__)

@app.route("/")
def health():
    return "GraphQL OK"

app.add_url_rule(
    "/graphql",
    view_func=GraphQLView.as_view(
        "graphql",
        schema=schema,
        graphiql=True)
)

if __name__ == "__main__":
    app.run(port=8090,host="0.0.0.0")
