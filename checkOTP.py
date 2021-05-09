import sys
import math
from otpauth import OtpAuth
import smtplib
import requests
import random
import time
import json

def valid_TOTP(ref_OTP,ANS_OTP):
    token = True
    check = True
    auth = OtpAuth(ref_OTP)
    print("Ref chack main is : "+ref_OTP)

    if(auth.valid_totp(ANS_OTP) == True):
        print("OTP pass")
        return True
    else:
        return False
x = sys.argv[1]
y = sys.argv[2]
z = valid_TOTP(x,y);
print(z)