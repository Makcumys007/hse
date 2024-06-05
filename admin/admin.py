from flask import Blueprint
import sqlite3
import os
import datetime
from werkzeug.security import generate_password_hash, check_password_hash
from flask import Flask, render_template, request, g, flash, abort, make_response, session, redirect, url_for
from FDataBase import FDataBase
from flask_login import LoginManager, login_user, login_required, logout_user, current_user
from UserLogin import UserLogin
from forms import LoginForm, RegisterForm



admin = Blueprint('admin', __name__, template_folder='templates', static_folder='static')

db = None

@admin.before_request
def before_request():
    print("___---===Connection with Database (admin app)===---___")
    global db
    db = g.get('link_db')


@admin.teardown_request
def teardown_request(request):
    print("___---===Disconnection with Database (admin app)===---___")
    global db
    db = None
    return request


@admin.route('/')
def index():
    return "admin"


@admin.route("/login", methods=["POST", "GET"])
def login():    
    if current_user.is_authenticated:
        return redirect(url_for('profile'))
    form = LoginForm()
    if form.validate_on_submit():
        user = FDataBase(db).getUserByEmail(form.email.data)
        if user and check_password_hash(user['psw'], form.psw.data):
            userlogin = UserLogin().create(user)
            rm = form.remember.data          
            login_user(userlogin, remember=rm)
            return redirect(request.args.get('next') or url_for('.index'))
        
        flash("Password is incorrect", "danger")
        
    return render_template('login.html', title='Login', form=form)