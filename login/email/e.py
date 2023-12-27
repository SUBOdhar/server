#!/usr/bin/env python3
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
    email_password = 'kzop zcrx mlnl apzr'

# Generate a random 4-digit number
    otp = random.randint(1000, 9999)

# Set the subject and body of the email
    subject = 'Verify Your Email'
    body = f"""<html><head><style>
            body {{
                font-family: 'Arial', sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }}
            .container {{
                max-width: 600px;
                margin: 20px auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }}
            h1 {{
                color: #333;
            }}
            p {{
                font-size: 16px;
                color: #555;
            }}
            .otp {{
                font-weight: bold;
                color: #e74c3c;
                font-size: 18px;
            }}
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Your One-Time Password (OTP)</h1>
            <p>
                Your OTP is:
                <span class="otp">{otp}</span>
            </p>
            <p>
                This OTP is valid for a short period. Do not share it with anyone.
            </p>
        </div>
    </body>
    </html>
"""
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
