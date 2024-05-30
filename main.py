from flask import Flask, render_template, url_for, request, flash, session, redirect, abort

app = Flask(__name__)

app.config['SECRET_KEY'] = 'Wwhym5602UvC@Zw.YU1A2gtkoD2rQgGNu_51WT-%Q.=]v>6@66A!E+wVV)ehyKgYs6nii^_qf?Q7:)JEoVv~0PJDToA2j9UJsFsV'


menu = [
    {"name": "Index", "url": "/"},
    {"name": "HSE Board", "url": "hse/1"},
    {"name": "KPP Board", "url": "hse/2"},
    {"name": "Contacts", "url": "contact"},
]


@app.route("/")
def index():
    print( url_for('index') )
    return render_template('index.html', title="Index", menu=menu)

@app.route("/about")
def about():
    print( url_for('about') )
    return render_template('index.html')



@app.route("/contact", methods=["POST", "GET"])
def contact():
    
    if request.method == 'POST':
        print( request.form )
        if len(request.form['username']) > 2:
            flash('Сообщение отправлено', category='text-success')
        else: 
            flash('Error', category='text-danger')
    return render_template('contact.html', title="Contacts", menu=menu)

@app.route("/hse/<int:board>")
def hse_board(board):
    if board == 2:
        return render_template('kpp.html', title="KAZ MINERALS BOZSHAKOL LLC")
    else:
        return f"Return index: {board}"
    
@app.route("/login", methods=["POST", "GET"])
def login():
    
    if 'userLogged' in session:
        return redirect(url_for('profile', username=session['userLogged']))
    elif request.method == 'POST' and request.form['username'] == "Maxim" and request.form['psw'] == "123":
        session['userLogged'] = request.form['username']
        return redirect(url_for('profile', username=session['userLogged']))
    return render_template('login.html', title="Login", menu=menu)

@app.route("/profile/<username>")
def profile(username):
    if 'userLogged' not in session or session['userLogged'] != username:
        abort(401)
    return f"User: {username}"

    
@app.errorhandler(404)
def pageNotFound(error):
    return render_template('page404.html', title='Page not found', menu=menu), 404




""" with app.test_request_context():
    print( url_for('about') ) """

if __name__ == "__main__":
    app.run(debug=True)