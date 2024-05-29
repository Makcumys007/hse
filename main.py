from flask import Flask, render_template

app = Flask(__name__)

menu = ["Index", "First App", "Contacts"]



@app.route("/index")
@app.route("/")
def index():

    return render_template('index.html', title="Index", menu=menu)

@app.route("/about")
def about():
    return render_template('index.html')

if __name__ == "__main__":
    app.run(debug=True)