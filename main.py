from flask import Flask, render_template, url_for

app = Flask(__name__)

menu = ["Index", "First App", "Contacts"]


@app.route("/")
def index():
    print( url_for('index') )
    return render_template('index.html', title="Index", menu=menu)

@app.route("/about")
def about():
    print( url_for('about') )
    return render_template('index.html')

@app.route("/profile/<username>")
def profile(username):
    return f"User: {username}"

""" with app.test_request_context():
    print( url_for('about') ) """

if __name__ == "__main__":
    app.run(debug=True)