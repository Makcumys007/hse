import sqlite3
import os

from flask import Flask, render_template, request


DATABASE = '/tmp/flsite.db'
DEBUG = True
SECRET_KEY  = 'P71,0:Td=v?Y>ft)M2v*!VhYYCQFR_EsAK4^tMDg@^-H#4b?>gCH+}.y@BogR?cz1+>!wxAMd!>vTu.eKhDY-7tN>R3h^4LT>mQa'

app = Flask(__name__)
app.config.from_object(__name__)

app.config.update(dict(DATABASE=os.path.join(app.root_path, 'flsite.db')))

def connected_db():
    conn = sqlite3.connect(app.config['DATABASE'])
    conn.row_factory = sqlite3.Row
    return conn


if __name__ == "__main__":
    app.run(debug=True)