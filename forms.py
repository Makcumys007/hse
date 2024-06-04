from flask_wtf import FlaskForm
from wtforms import StringField, SubmitField, BooleanField, PasswordField
from wtforms.validators import DataRequired, Email, Length, EqualTo

class LoginForm(FlaskForm):
    email = StringField("Email: ", validators=[Email("Wrong email"),])
    psw = PasswordField("Password: ", validators=[DataRequired(), Length(min=5, max=100, message="Password must be from 5 to 100 symbols")])
    remember = BooleanField("remain me", default=False)
    submit = SubmitField("Login")
    

class RegisterForm(FlaskForm):
    name = StringField("Name", validators=[Length(min=4, max=100, message="Name has length from 4 to 100")])
    email = StringField("Email: ", validators=[Email("Wrong email"),])
    psw = PasswordField("Password: ", validators=[DataRequired(), Length(min=5, max=100, message="Password must be from 5 to 100 symbols")])    
    psw2 = PasswordField("Repeat password: ", validators=[DataRequired(), EqualTo('psw', message="Password are not similar")])    
    submit = SubmitField("Registration")