"""
WSGI config for CMS project.

It exposes the WSGI callable as a module-level variable named ``application``.

For more information on this file, see
https://docs.djangoproject.com/en/4.2/howto/deployment/wsgi/
"""

import os

from django.core.wsgi import get_wsgi_application

os.environ.setdefault('DJANGO_SETTINGS_MODULE', 'CMS.settings')

application = get_wsgi_application()
# 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
