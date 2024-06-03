from django.contrib import admin
from kppboard.models import BoardData, Video
# Register your models here.

@admin.register(BoardData)
class BoardDataAdmin(admin.ModelAdmin):
    list_display = 'date', 'last_lti_date', 'days_without_lti', 'this_year_lti',



@admin.register(Video)
class VideoAdmin(admin.ModelAdmin):
    list_display = 'title',