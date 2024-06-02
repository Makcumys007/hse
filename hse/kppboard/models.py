from django.db import models

# Create your models here.


class BoardData(models.Model):
    date = models.DateField(auto_now_add=True)
    last_lti_date = models.DateField()
    days_without_lti = models.IntegerField()
    this_year_lti = models.IntegerField()
