from flask import Flask, render_template, url_for, request

app = Flask(__name__)

menu = [
    {"name": "Index", "url": "/"},
    {"name": "HSE Board", "url": "hse/1"},
    {"name": "KPP Board", "url": "hse/2"},
]


@app.route("/")
def index():
    print( url_for('index') )
    return render_template('index.html', title="Index", menu=menu)

@app.route("/about")
def about():
    print( url_for('about') )
    return render_template('index.html')

@app.route("/profile/<path:username>")
def profile(username):
    return f"User: {username}"

@app.route("/contact", methods=["POST", "GET"])
def contact():
    if request.method == 'POST':
        print(request.form)
    return render_template('contact.html', title="Contacts", menu=menu)

@app.route("/hse/<int:board>")
def hse_board(board):
    if board == 2:
        return render_template('kpp.html', title="KAZ MINERALS BOZSHAKOL LLC")
    else:
        return f"Return index: {board}"


""" with app.test_request_context():
    print( url_for('about') ) """

if __name__ == "__main__":
    app.run(debug=True)