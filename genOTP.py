import sys
import math
from otpauth import OtpAuth
import smtplib
import requests
import random
import time
import json

count=5

def rand_ref():
    i = 0
    eng_char = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
    ref_text = ""
    while(i<4):
        ref_text=ref_text+eng_char[random.randint(0,25)]
        i=i+1
    return ref_text

def gen_TOTP(rand_text):
    token = bool(1)
    auth = OtpAuth(rand_text)
    print("Ref creating main is : "+rand_text)
    ref_totp = auth.totp()
    str_totp = ""
    if(ref_totp > 99999):
        str_totp = str(ref_totp)
    if(99999 >= ref_totp > 9999):
        str_totp = "0"+ str(ref_totp)
    if(9999 >= ref_totp > 999):
        str_totp= "00"+str(ref_totp)
    if(999 >= ref_totp > 99):
        str_totp = "000"+str(ref_totp)
    if(99 >= ref_totp > 9 ):
        str_totp = "0000"+str(ref_totp)
    if(9 >= ref_totp):
        str_totp = "00000"+str(ref_totp)
    return str_totp


# #def valid_TOTP(ref_OTP,ANS_OTP):
#     token = True
#     check = True
#     auth = OtpAuth(ref_OTP)
#     print("Ref chack main is : "+ref_OTP)
#
#
#         if(auth.valid_totp(ANS_OTP) == True):
#             print("OTP pass")
#             return True
#         else:
#             return False


def send_email(mailto,subject,msg):
    try:
        server = smtplib.SMTP('smtp.gmail.com:587')
        server.ehlo()
        server.starttls()
        sender_email = 'Jimjum.Gameshop@gmail.com'
        sender_password = 'jimjimjum'
        server.login(sender_email,sender_password)
        message = 'Subject: {}\n\n{}'.format(subject,msg)
        server.sendmail(sender_email,mailto,message)
        server.quit()
        print('Success : Email sent !')
    except:
        print('Fail : Email not sent')

val = rand_ref()
a = gen_TOTP(val)
topic =  ' Your OTP for Jimjum GameShop ! '
bonus = sys.argv[1]
#bonus2 = "bonus_seaw@hotmail.com"
test = """  Hi, I'm an adminstrator from Jimjum GameShop! nice to meet you.  
        your OTP is : """ + str(a) + """ : Hope you enjoy it ! Have fun ^_^ """
print(test)
send_email(bonus,topic,test)
D = {'val':val, 'otp': a}
#print(a)
print(json.dumps(D))

