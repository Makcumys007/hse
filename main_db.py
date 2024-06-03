import sqlite3
import os
import datetime
from werkzeug.security import generate_password_hash, check_password_hash
from flask import Flask, render_template, request, g, flash, abort, make_response, session, redirect, url_for
from FDataBase import FDataBase
from flask_login import LoginManager, login_user, login_required, logout_user, current_user
from UserLogin import UserLogin

DATABASE = '/tmp/flsite.db'
DEBUG = True
SECRET_KEY  = 'P71,0:Td=v?Y>ft)M2v*!VhYYCQFR_EsAK4^tMDg@^-H#4b?>gCH+}.y@BogR?cz1+>!wxAMd!>vTu.eKhDY-7tN>R3h^4LT>mQa'
dbase = None

app = Flask(__name__)
app.config.from_object(__name__)
app.config['SECRET_KEY'] = SECRET_KEY
# Хранить сессию 10 дней
app.permanent_session_lifetime = datetime.timedelta(days=10)

app.config.update(dict(DATABASE=os.path.join(app.root_path, 'flsite.db')))

login_manager = LoginManager(app)
login_manager.login_view = 'login'
login_manager.login_message = 'Enter in your account. please!'
login_manager.login_message_category = 'success'

@login_manager.user_loader
def load_user(user_id):
    print("load_user")
    return UserLogin().fromDB(user_id, dbase)


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

@app.route("/login", methods=["POST", "GET"])
def login():    
    if current_user.is_authenticated:
        return redirect(url_for('profile'))
    if request.method == "POST":
        user = dbase.getUserByEmail(request.form['email'])
        if user and check_password_hash(user['psw'], request.form['psw']):
            userlogin = UserLogin().create(user)
            rm = True if request.form.get('remainme') else False            
            login_user(userlogin, remember=rm)
            return redirect(url_for('index'))
        
        flash("Password is incorrect", "danger")

    return render_template('login.html', menu=dbase.getMenu(), title='Login')

@app.route("/register", methods=["POST", "GET"])
def register():    
    if request.method == "POST":
        if len(request.form['name']) > 4 and len(request.form['email']) > 4 and len(request.form['psw']) > 4 and request.form['psw'] == request.form['psw2']:
            hash = generate_password_hash(request.form['psw'])
            res = dbase.addUser(request.form['name'], request.form['email'], hash)
            if res:
                flash("You have been registered successfuly", "success")
                return redirect(url_for('login'))
            else:
                flash("Error of adding USER to DB", "danger")
        else:
            flash("Bad input in fields", "danger")
    return render_template('register.html', menu=dbase.getMenu(), title='Registration')

@app.route("/logout")
def logout():
    logout_user()
    return redirect(url_for('index'))

@app.route("/")
def index():
    
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
@login_required
def showPost(alias):
  
    title, post = dbase.getPost(alias)
    if not title:
        abort(404)
    return render_template('post.html', menu=dbase.getMenu(), title=title, post=post)

@app.route('/profile')
@login_required
def profile():
    return f"""
        <p><a href="{url_for('logout')}">Logout</a></p>
<p>User info: {current_user.get_id()}</p>
    """

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


@app.teardown_request
def teardown_request(response):
    print("___---===Disconnection with Database===---___")
    if g.link_db is not None:
        g.link_db.close()

@app.after_request
def after_request(response):
    print("after_request() called")
    return response

# @app.teardown_request
# def teardown_request(response):
#     print("teardown_request() called")
#     return response


if __name__ == "__main__":
    app.run(debug=True)