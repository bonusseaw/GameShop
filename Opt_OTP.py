import sys
import math
from otpauth import OtpAuth
import smtplib
import requests
import random
import time

count=5 # what is mean.
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
    print("TOTP : ",str_totp)
    return 0
def valid_TOTP(ref_OTP):
    token = True
    check = True
    auth = OtpAuth(ref_OTP)
    print("Ref chack main is : "+ref_OTP)
    while(check):
        ANS_OTP = input("ENTER YOUR OTP : ")
        ANS_OTP = int(ANS_OTP)



        if((auth.valid_totp(ANS_OTP) == True) and (token == True)):
            print("OTP pass")
            break
        elif((auth.valid_totp(ANS_OTP) == True) and (token == False)):
            print("No")
            break
        elif((auth.valid_totp(ANS_OTP) == False) and (token == True)):
            token=False
            print("No ")
        elif((auth.valid_totp(ANS_OTP) == False) and (token == False)):
            print("Exit valid OTP ... ")
            break


    return 0





    # if(auth.valid_totp(ANS_OTP) and token):
    #     print("PASS ! ",token)
    # elif((auth.valid_totp(ANS_OTP) != bool(1) )and(token)):
    #     print("invalid OTP use pls req another OTP again",token)
    #     token = bool(0)
    # elif((auth.valid_totp(ANS_OTP)) and (token != bool(1))):
    #     print("time out OTP",token)
    # else:
    #     print("req another OTP ",token)


val = rand_ref()
gen_TOTP(val)

valid_TOTP(val)
#
# val=rand_ref()
# auth = OtpAuth("FISH")
# res = auth.totp()
# #val_totp = totp()
# print("ref is : "+val)
# i=1
# token = bool(1) # bool for chack OTP
# valid = auth.totp()
# while(i<100):
#     val_totp = auth.totp()
#     print("ref fix : FISH , "+"OTP is : "+str(val_totp))
#     print("round is : ",i)
#     print ("Valid TOTP : ",auth.valid_totp(valid))
#     time.sleep(1)
#     i=i+1
