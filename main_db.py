import sqlite3
import os
import datetime
from werkzeug.security import generate_password_hash, check_password_hash
from flask import Flask, render_template, request, g, flash, abort, make_response, session
from FDataBase import FDataBase

DATABASE = '/tmp/flsite.db'
DEBUG = True
SECRET_KEY  = 'P71,0:Td=v?Y>ft)M2v*!VhYYCQFR_EsAK4^tMDg@^-H#4b?>gCH+}.y@BogR?cz1+>!wxAMd!>vTu.eKhDY-7tN>R3h^4LT>mQa'

app = Flask(__name__)
app.config.from_object(__name__)
app.config['SECRET_KEY'] = SECRET_KEY
# Хранить сессию 10 дней
app.permanent_session_lifetime = datetime.timedelta(days=10)
app.config.update(dict(DATABASE=os.path.join(app.root_path, 'flsite.db')))

dbase = None

def connect_db():
    conn = sqlite3.connect(app.config['DATABASE'])
    conn.row_factory = sqlite3.Row
    return conn

def create_db():
    db = connect_db()
    with app.open_resource('sq_db.sql', mode='r') as f:
        db.cursor().executescript(f.read())
    db.commit()
    db.close()

def get_db():
    if not hasattr(g, 'link_db'):
        g.link_db = connect_db()
    return g.link_db

@app.route("/login")
def login():    
    return render_template('login.html', menu=dbase.getMenu(), title='Login')

@app.route("/register", methods=["POST", "GET"])
def register():    
    if request.method == "POST":
        if len(request.form['name']) > 4 and len(request.form['email']) > 4 and len(request.form['psw']) > 4 and request.form['psw'] == request.form['psw2']:
            hash = generate_password_hash(request.form['psw'])
            res = dbase.addUser(request.form['name'], request.form['email'], hash)
            if res:
                flash("You have been registered successfuly", "success")
            else:
                flash("Error of adding USER to DB", "danger")
        else:
            flash("Bad input in fields", "danger")
    return render_template('register.html', menu=dbase.getMenu(), title='Registration')

@app.route("/logout")
def logout():
    res = make_response(f"<h1>You are not authorised anymore!</p>")
    res.set_cookie("logged", "", 0)
    return res

@app.route("/")
def index():
    #
    
    if 'visits' in session:
        session['visits'] = session.get('visits') + 1 # Обновление данных сессии
    else:
        session['visits'] = 1
    print(f"Число просмотров: {session['visits']}")

    content = render_template('index.html', menu = dbase.getMenu(), posts=dbase.getPostsAnonce())
    res = make_response(content)
    res.headers['Server'] = 'hse'
    return res


@app.route("/add_post", methods=["POST", "GET"])
def addPost():
    #


    if request.method == "POST":
        if len(request.form['name']) > 4 and len(request.form['post']) > 10:
            res = dbase.addPost(request.form['name'], request.form['post'], request.form['url'])
            if not res:
                flash('Error of adding post', category = 'dnager')
            else:
                flash('Post added successfully', category = 'success')
        else:
            flash('Error of adding post', category = 'danger')

    return render_template('add_post.html', menu= dbase.getMenu(), title='Add Post')

@app.route("/post/<alias>")
def showPost(alias):
    #
    title, post = dbase.getPost(alias)
    if not title:
        abort(404)
    return render_template('post.html', menu=dbase.getMenu(), title=title, post=post)

@app.teardown_appcontext
def close_db(error):
    if hasattr(g, 'link_db'):
        g.link_db.close()

@app.errorhandler(404)
def pageNot(error):
    return ("Page not found!", 404)

#####################################

data = [1,2,3,4]
@app.route("/session")
def session_data():
    session.permanent = True
    if 'data' not in session:
        session['data'] = data
    else:
        session['data'][1] += 1
        session.modified = True
    return f"<p>session['data']: {session['data']}</p>"

@app.before_request
def before_request():
    print("___---===Connection with Database===---___")
    global dbase
    db = get_db()
    dbase = FDataBase(db)

@app.after_request
def after_request(response):
    print("after_request() called")
    return response

@app.teardown_request
def teardown_request(response):
    print("teardown_request() called")
    return response


if __name__ == "__main__":
    app.run(debug=True)