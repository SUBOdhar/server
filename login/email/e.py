import smtplib
import ssl
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart
import random
import nltk
import sys

input = sys.argv[1]


def email(email_receiver):
    # Define email sender and receiver
    email_sender = 'aryalsubodh4@gmail.com'
    email_password = 'zndsnkhlngxfbxby'

# Generate a random 4-digit number
    otp = random.randint(1000, 9999)

# Set the subject and body of the email
    subject = 'Verify Your Email'
    body = f"<p>Your OTP is: </p>{otp}"  # place your html code here
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
    print(otp)





email(input)
