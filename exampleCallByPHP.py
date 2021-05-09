import sys
import math
from otpauth import OtpAuth


count=5
val="kaow"

auth = OtpAuth(val)
res= auth.hotp(count)
print(auth)
print (("Hashed OTP is: "+str(res)))
print ("Authenication is: ",str(auth.valid_hotp(res)))

res=auth.totp()
print ("Time based OTP: ",str(res))
print ("Valid TOTP: ",str(auth.valid_totp(res)))

print ("Begin of Python Script\n")
print ("The passed arguments are ", sys.argv)
print ("Show all argument")
for i in range(len(sys.argv)):
    print ("sys.argv["+str(i)+"] => "+str(sys.argv[i]))
