import smtplib
import ssl
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart


def poeemail(status):
    # Define email sender and receiver
    email_sender = 'aryalsubodh4@gmail.com'
    email_password = 'zndsnkhlngxfbxby'
    email_receiver = 'subodharyal001@gmail.com'

# Set the subject and body of the email
    subject = 'Power disconnected for server'
    body = status  # place your html code here
    em = MIMEText(body, 'html')
    em.add_header('Importance', 'high')
    em['From'] = email_sender
    em['To'] = email_receiver
    em['Subject'] = subject


# Add SSL (layer of security)
    context = ssl.create_default_context()

# Log in and send the email
    with smtplib.SMTP_SSL('smtp.gmail.com', 465, context=context) as smtp:
        smtp.login(email_sender, email_password)
        smtp.sendmail(email_sender, email_receiver, em.as_string())
